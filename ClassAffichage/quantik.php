<?php
/**
 * @author NADIA HARIRI MASSINISSA AIT HAMMI 
 * @date 2021-02-05
 * */
ini_set('display_errors', 'on');
require_once("../ClassPrincipale/PieceQuantik.php");
require_once("../ClassPrincipale/PlateauQuantik.php");
require_once("../ClassPrincipale/ActionQuantik.php");
require_once("../ClassAffichage/QuantikException.php");
require_once("../ClassAffichage/QuantikUIGenerator.php");

use quantik\ClassPrincipale\PieceQuantik;
use quantik\ClassPrincipale\PlateauQuantik;
use quantik\ClassPrincipale\ActionQuantik;
use quantik\ClassPrincipale\ArrayPieceQuantik;
use quantik\QuantikException;

session_start();



if (isset($_GET['reset'])) { 
    unset($_SESSION['etat']);
    unset($_SESSION['lesBlancs']);
    unset($_SESSION['lesNoirs']);
    unset($_SESSION['couleurActive']);
    unset($_SESSION['plateau']);
    unset($_SESSION['message']);
}

if (empty($_SESSION)) { 
    $_SESSION['lesBlancs'] = ArrayPieceQuantik::initPiecesBlanches();
    $_SESSION['lesNoirs'] = ArrayPieceQuantik::initPiecesNoires();
    $_SESSION['plateau'] = new PlateauQuantik();
    $_SESSION['etat'] = 'choixPiece';
    $_SESSION['couleurActive'] = PieceQuantik::WHITE;
    $_SESSION['message'] = "";
}


$pageHTML = "";

$aq = new ActionQuantik($_SESSION['plateau']);
    try {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'choisirPiece':
                    $_SESSION['etat'] = 'posePiece';
                    break;
                case 'poserPiece':
                    $positionPiece = $_GET['positionPiece'];
                    $arrayPieceQuantik = ($_SESSION['couleurActive'] == PieceQuantik::WHITE)?$_SESSION['lesBlancs']:$_SESSION['lesNoirs'];
                    list($row, $col) = explode("-", $_GET["active"]);
                    if ( !(ctype_digit($row)) ||  !(ctype_digit($col)) ) throw new QuantikException("Coordonnées invalides");
                    try {
                        $piece = $arrayPieceQuantik->getPieceQuantik($positionPiece);
                        if ( $aq->isValidePose($row, $col, $piece) ) { 
                            $aq->posePiece($row, $col, $piece);
                            $arrayPieceQuantik->removePieceQuantik($positionPiece);
                             if ( checkWin($aq) ) {
                                $_SESSION['etat'] = 'victoire';
                            } else {
                                $_SESSION['couleurActive'] = ($_SESSION['couleurActive'] == PieceQuantik::WHITE)?PieceQuantik::BLACK:PieceQuantik::WHITE;
                                $_SESSION['etat'] = 'choixPiece';
                            }
                            
                        }
                    }catch(\Exception $e) {
                        throw new QuantikException($e->getMessage());
                    }
                    break;
                case 'annulerChoix':
                    $_SESSION['etat'] = 'choixPiece';
                    break;
                default:
                    throw new QuantikException("Action non valide");
            }
        }
    } catch (QuantikException $exception) {
            $_SESSION['etat'] = 'bug';
            $_SESSION['message'] = $exception->__toString();
        }

$lesPieces = array($_SESSION['lesBlancs'], $_SESSION['lesNoirs']);
switch($_SESSION['etat']) {
    case 'choixPiece':
        $pageHTML = QuantikUIGenerator::getPageSelectionPiece($lesPieces, $_SESSION['couleurActive'], $_SESSION['plateau']);
        break;
    case 'posePiece':
        $pageHTML = QuantikUIGenerator::getPagePosePiece($lesPieces, $_SESSION['couleurActive'], $_GET['active'], $_SESSION['plateau']);
        break;
    case 'victoire':
        $pageHTML = QuantikUIGenerator::getPageVictoire($lesPieces, $_SESSION['couleurActive'], $_SESSION['plateau']);
        break;
    default: 
        echo QuantikUIGenerator::getPageErreur($_SESSION['message']);
        exit(1);
}

echo $pageHTML;


function checkWin($action) {
    for ( $i = 0; $i < PlateauQuantik::NB_ROWS; $i++ ) {
        if ( $action->isRowWin($i) || $action->isColWin($i) ) {
            return true;
        }
    }
    return ( $action->isCornerWin(PlateauQuantik::NW) ||
             $action->isCornerWin(PlateauQuantik::NE) ||
             $action->isCornerWin(PlateauQuantik::SW) ||
             $action->isCornerWin(PlateauQuantik::SE) 
           );
}
?>
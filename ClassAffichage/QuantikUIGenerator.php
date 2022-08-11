<?php

require_once "../ClassPrincipale/PlateauQuantik.php";
require_once "../ClassPrincipale/ArrayPieceQuantik.php";

use quantik\ClassPrincipale\PieceQuantik;
use quantik\ClassPrincipale\PlateauQuantik;
use quantik\ClassPrincipale\ActionQuantik;
use quantik\ClassPrincipale\ArrayPieceQuantik;

/**
 * Class QuantikUIGenerator
 */
class QuantikUIGenerator
{

    /**
     * @param string $title
     * @return string
     */
    public static function getDebutHTML(string $title = "Quantik"): string
    {
        return "<!doctype html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <title>$title</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"quantik.css\" />
    </head>
    <body>
        <h1 class=\"quantik-title-acceuil\">$title</h1>
        <div class='quantik'>\n";
    }

    /**
     * @return string
     */
    public static function getFinHTML(): string
    {
        return "</div></body>\n</html>";
    }

    /**
     * @param string $message
     * @return string
     */
    public static function getPageErreur(string $message): string
    {
        header("HTTP/1.1 400 Bad Request");
        $resultat = self::getDebutHTML("400 Bad Request");
        $resultat .= "<h2>$message</h2>";
        $resultat .= "<p><br /><br /><br /><a href='quantik.php?reset'>Retour à l'accueil...</a></p>";
        $resultat .= self::getFinHTML();
        return $resultat;
    }

    /**
     * @param PieceQuantik $pq
     * @return string
     */
    public static function getButtonClass(PieceQuantik $pq) {
        if ($pq->getForme()==PieceQuantik::VOID)
            return "vide";
        $ch = $pq->__toString();
        return substr($ch,1,2).substr($ch,4,1);
    }

    /**
     * production d'un bloc HTML pour présenter l'état du plateau de jeu,
     * l'attribution de classes en vue d'une utilisation avec les est un bon investissement...
     * @param PlateauQuantik $p
     * @return string
     */
    public static function getDivPlateauQuantik(PlateauQuantik $p): string
    {
        $resultat ="";
        $resultat = "<table>\n";
        for ( $i = 0; $i < PlateauQuantik::NB_ROWS; $i++ ) {
            $resultat .= "<tr>\n";
            for ($y = 0; $y < PlateauQuantik::NB_COLS; $y++ ) {
                $resultat .= "<td ><button class=\"quantik-btn\" type=\"submit\" name=\"active\" disabled>".$p->getPiece($i, $y)."</button></td>\n";
            }
            $resultat .= "</tr>\n";
        }
        $resultat .= "</table>\n";
        return $resultat;
    }

    /**
     * @param ArrayPieceQuantik $apq
     * @param int $pos permet d'identifier la pièce qui a été sélectionnée par l'utilisateur avant de la poser (si != -1)
     * @return string
     */
    public static function getDivPiecesDisponibles(ArrayPieceQuantik $apq, int $pos = -1): string {
        $resultat = "";
        $resultat = "<div class=\"quantikDispo\">\n";
        for($i = 0; $i < $apq->getTaille(); $i++) {
            $class = "quantik-btn";
            $piece=$apq->getPieceQuantik($i);
            if($piece->getCouleur()===PieceQuantik::WHITE){
                if($piece->getForme()===PieceQuantik::SPHERE){
                 $class = "quantik-btn1";
                 }
                 if($piece->getForme()===PieceQuantik::CUBE){
                  $class = "quantik-btn2";
                 }
                 if($piece->getForme()===PieceQuantik::CONE){
                 $class = "quantik-btn3";
                 }
                if($piece->getForme()===PieceQuantik::CYLINDRE){
                $class = "quantik-btn4";
                 }
        }elseif($piece->getCouleur()===PieceQuantik::BLACK){
            if($piece->getForme()===PieceQuantik::SPHERE){
                $class = "quantik-btn1-N";
                }
                if($piece->getForme()===PieceQuantik::CUBE){
                 $class = "quantik-btn2-N";
                }
                if($piece->getForme()===PieceQuantik::CONE){
                $class = "quantik-btn3-N";
                }
               if($piece->getForme()===PieceQuantik::CYLINDRE){
               $class = "quantik-btn4-N";
                }
            }
            if ( $pos != -1 && $pos == $i ) $class .= " quantik-btn-selected";
            $resultat .= "<button class=\"$class\" type=\"submit\" name=\"active\" disabled>". $apq->getPieceQuantik($i) ."</button>\n";
        }
        $resultat .= "</div>\n";
        return $resultat;
    }

    /**
     * @param ArrayPieceQuantik $apq
     * @return string
     */
    public static function getFormSelectionPiece(ArrayPieceQuantik $apq): string {
       
        $resultat = "<form><div>";
        for($i = 0; $i < $apq->getTaille(); $i++){
            $class = "quantik-btn";
            $piece=$apq->getPieceQuantik($i);
            if($piece->getCouleur()===PieceQuantik::WHITE){
                if($piece->getForme()===PieceQuantik::SPHERE){
                 $class = "quantik-btn1";
                 }
                 if($piece->getForme()===PieceQuantik::CUBE){
                  $class = "quantik-btn2";
                 }
                 if($piece->getForme()===PieceQuantik::CONE){
                 $class = "quantik-btn3";
                 }
                if($piece->getForme()===PieceQuantik::CYLINDRE){
                $class = "quantik-btn4";
                 }
          $resultat .= "<button class=\"$class\" type=\"submit\" value=\"$i\" name=\"active\">". $apq->getPieceQuantik($i) ."</button>";
        }elseif($piece->getCouleur()===PieceQuantik::BLACK){
            if($piece->getForme()===PieceQuantik::SPHERE){
                $class = "quantik-btn1-N";
                }
                if($piece->getForme()===PieceQuantik::CUBE){
                 $class = "quantik-btn2-N";
                }
                if($piece->getForme()===PieceQuantik::CONE){
                $class = "quantik-btn3-N";
                }
               if($piece->getForme()===PieceQuantik::CYLINDRE){
               $class = "quantik-btn4-N";
                }
         $resultat .= "<button class=\"$class\" type=\"submit\" value=\"$i\" name=\"active\">". $apq->getPieceQuantik($i) ."</button>";
        }
        }
        $resultat .= "<input type=\"hidden\" name=\"action\" value=\"choisirPiece\" />";
        $resultat .= "</div></form>";
        return $resultat;
    }

    /**
     * @param PlateauQuantik $plateau
     * @param PieceQuantik $piece
     * @param int $position position de la pièce qui sera posée en vue de la transmettre via un champ caché du formulaire
     * @return string
     */
    public static function getFormPlateauQuantik(PlateauQuantik $plateau, PieceQuantik $piece, int $position): string {
        $resultat ="";
        $action = new ActionQuantik($plateau);
        $resultat = "<form>";
        $resultat .= "<table>";
        for ( $i = 0; $i < PlateauQuantik::NB_ROWS; $i++ ) {
            $resultat .= "<tr>";
            for ($y = 0; $y < PlateauQuantik::NB_COLS; $y++ ) {
                if ( $action->isValidePose($i, $y, $piece) )
                    $resultat .= "<td><button class=\"quantik-btn\" type=\"submit\" name=\"active\" value=\"$i-$y\">".$plateau->getPiece($i, $y)."</button></td>";
                else
                    $resultat .= "<td><button class=\"quantik-btn\" type=\"submit\" name=\"active\" disabled>".$plateau->getPiece($i, $y)."</button></td>";
            }
            $resultat .= "</tr>";
        }
        unset($action);
        $resultat .= "</table>";
        $resultat .= "<input type=\"hidden\" name=\"action\" value=\"poserPiece\" />";
        $resultat .= "<input type=\"hidden\" name=\"positionPiece\" value=\"$position\" />";
        $resultat .="</form>";
        $resultat .= self::getFormBoutonAnnuler();
        return $resultat;
    }

    /**
     * @return string
     */
    public static function getFormBoutonAnnuler() : string {
        return "<form style=\"text-align: center;\"><button class=\"quantik-btn-an quantik-btn-undo\" type=\"submit\" name=\"action\" value=\"annulerChoix\">Annuler choix</button></form>";
    }

    /**
     * @param int $couleur
     * @return string
     */
    public static function getDivMessageVictoire(int $couleur): string {   
        $couleurGagnant = ($couleur == PieceQuantik::WHITE)?'BLANC':'NOIR';
        $resultat = "<h1 class=\"quantik-title-acceuil\">FIN DE LA PARTIE LES " . $couleurGagnant ." ONT GAGNER </h1>".
                     "<h1 class=\"quantik-title-acceuil\">VOUS VOULEZ FAIRE QUOI ???</h1>";
        return $resultat;
    }

    /**
     * @return string
     */
    public static function getLienRecommencer(): string {
        return "<div id=\"divacceuil\"><a href='?reset'><button class=\"quantik-btn-acceuil\"> Recommencer ?</button></a></div>";
    }
    public static function getLienRtPageAceuill(): string {
        return "<div id=\"divacceuil\"><a href='PageAcceuil.php'> <button class=\"quantik-btn-acceuil\">Retourner à la page d'acceuil</button></a></div>";
    }

    /**
     * @param array $lesPiecesDispos tableau contenant 2 ArrayPieceQuantik un pour les pièves blanches, un pour les pièces noires
     * @param int $couleurActive
     * @param PlateauQuantik $plateau
     * @return string
     */
    public static function getPageSelectionPiece(array $lesPiecesDispos, int $couleurActive, PlateauQuantik $plateau): string {
        $pageHTML = self::getDebutHTML();
        
        $piecesActives = $lesPiecesDispos[$couleurActive];
        unset($lesPiecesDispos[$couleurActive]);
        $pieceNonActive = array_shift($lesPiecesDispos);
        $quelpiece="";
        if($couleurActive===0){
            $quelpiece="Noir";
        }else{
            $quelpiece="Blanc";
        }
        $pageHTML .= "<div><h4>Ces piece sont désactiver car ce n'est pas encore au tour des ".$quelpiece." de jouer</h4></div>" .self::getDivPiecesDisponibles($pieceNonActive);
        if($quelpiece==="Blanc"){
            $quelpiece="Noir";
        }else{
            $quelpiece="Blanc";
        }
        $pageHTML .= "<div><h4>C'est au tour des ".$quelpiece." de jouer choisissez parmis ces pieces </h4></div>".self::getFormSelectionPiece($piecesActives);
        $pageHTML .= self::getDivPlateauQuantik($plateau);

        return $pageHTML. self::getFinHTML();
    }

    /**
     * @param array $lesPiecesDispos tableau contenant 2 ArrayPieceQuantik un pour les pièces blanches, un pour les pièces noires
     * @param int $couleurActive
     * @param int $posSelection position de la pièce sélectionnée dans la couleur active
     * @param PlateauQuantik $plateau
     * @return string
     */
    public static function getPagePosePiece(array $lesPiecesDispos, int $couleurActive, int $posSelection, PlateauQuantik $plateau): string {
        $pageHTML = self::getDebutHTML();

        $piecesActives = $lesPiecesDispos[$couleurActive];
        array_splice($lesPiecesDispos, $couleurActive, 1);
        $pieceNonActive = array_shift($lesPiecesDispos);
        //var_dump($pieceNonActive);
        
        $pieceAPoser = $piecesActives->getPieceQuantik($posSelection);
        $quelpiece="";
        if($couleurActive===0){
            $quelpiece="Noir";
        }else{
            $quelpiece="Blanche";
        }
        $pageHTML .= "<div><h4>Ces pieces ".$quelpiece." sont désactiver </h4></div>".self::getDivPiecesDisponibles($pieceNonActive);
        if($quelpiece==="Blanc"){
            $quelpiece="Noir";
        }else{
            $quelpiece="Blanche";
        }
        $pageHTML .= "<div><h4>Placer votre forme ".$quelpiece." dans l'une des cases vide de couleur verte </h4></div>".self::getDivPiecesDisponibles($piecesActives, $posSelection);
        $pageHTML .= self::getFormPlateauQuantik($plateau, $pieceAPoser, $posSelection);
        
        return $pageHTML . self::getFinHTML();
    }

    /**
     * @param array $lesPiecesDispos tableau contenant 2 ArrayPieceQuantik un pour les pièves blanches, un pour les pièces noires
     * @param int $couleurActive
     * @param int $posSelection
     * @param PlateauQuantik $plateau
     * @return string
     */
    public static function getPageVictoire(array $lesPiecesDispos, int $couleurActive, PlateauQuantik $plateau): string {
        $pageHTML = self::getDebutHTML();

        $pageHTML .= self::getDivMessageVictoire($couleurActive);
        $pageHTML .= self::getLienRecommencer();
        $pageHTML .= self::getLienRtPageAceuill();
        $pageHTML .="<div class=\"bravo\"></div>";
        return $pageHTML . self::getFinHTML();

    }

}

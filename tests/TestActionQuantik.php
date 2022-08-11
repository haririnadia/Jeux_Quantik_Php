<?php

namespace tests\quantik\ClassPrincipale;
    

  require_once("../ClassPrincipale/PlateauQuantik.php");
  require_once("../ClassPrincipale/PieceQuantik.php");
  require_once("../ClassPrincipale/ActionQuantik.php");
    use quantik\ClassPrincipale\PlateauQuantik;
    use quantik\ClassPrincipale\PieceQuantik;
    use quantik\ClassPrincipale\ActionQuantik;



use function PHPUnit\Framework\assertEquals;

class ActionQuantikTest extends \PHPUnit\Framework\TestCase {

        public function testIsRowWin(){
            $plateau=new PlateauQuantik();
            $plateau->setPiece(1,0,PieceQuantik::initWhiteCylindre());
            $plateau->setPiece(1,1,PieceQuantik::initWhiteCube());
            $plateau->setPiece(1,2,PieceQuantik::initBlackSphere());
            $plateau->setPiece(1,3,PieceQuantik::initBlackCone());
        
            $action =new ActionQuantik($plateau);
            self::assertTrue($action->isRowWin(1));
            self::assertFalse($action->isRowWin(1));
        
            $plateau->setPiece(0,2,PieceQuantik::initBlackSphere());
            $plateau->setPiece(0,3,PieceQuantik::initBlackCone());
            self::assertFalse($action->isRowWin(0));
        }
        public function testisValidePose():void{
            $plateau=new PlateauQuantik();
            $action =new ActionQuantik($plateau);
            $plateau->setPiece(1,0,PieceQuantik::initWhiteCylindre());
            $plateau->setPiece(1,1,PieceQuantik::initWhiteCube());
            $plateau->setPiece(1,2,PieceQuantik::initWhiteCone());
            self::assertTrue($action->isValidePose(1,3,PieceQuantik::initBlackSphere()));
            self::assertFalse($action->isValidePose(1,3,PieceQuantik::initWhiteCube()));
        
            $plateau->setPiece(2,2,PieceQuantik::initBlackCube());
            self::assertFalse($action->isValidePose(2,3,PieceQuantik::initWhiteCube()));
        }
        public function testposePiece() 
        {
            $plateau=new PlateauQuantik();
            $action= new ActionQuantik($plateau);
            $action->posePiece(1,0,PieceQuantik::initWhiteCylindre());
            assertEquals(PieceQuantik::initWhiteCylindre(),$plateau->getPiece(1,0));
               }
        public function testispieceValide(){

        }
      
    }
?>

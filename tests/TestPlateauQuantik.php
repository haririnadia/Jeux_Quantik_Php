<?php
    namespace tests\quantik\ClassPrincipale;
    
    require_once("../ClassPrincipale/PlateauQuantik.php");
    
    use quantik\ClassPrincipale\PlateauQuantik;
    use quantik\ClassPrincipale\PieceQuantik;
    
  

class PlateauQuantiktest  extends \PHPUnit\Framework\TestCase{
    public function test__construct()
    {
        $p = new PlateauQuantik();
        $this->assertInstanceof(PlateauQuantik::class, $p);
        $p . self::assertEquals(PieceQuantik::initVoid(), $p->getPiece(0, 0));
    }

    public function testSetPiece()
    {
        $plateau = new PlateauQuantik();
        $plateau->setPiece(0, 0, PieceQuantik::initWhiteSphere());
        $plateau . self::assertEquals(PieceQuantik::initWhiteSphere(), $plateau->getPiece(0, 0));
    }

    public function testGetRow()
    {
        $plateau = new PlateauQuantik();
        $plateau->setPiece(0, 0, PieceQuantik::initWhiteCone());
        $plateau->setPiece(0, 1, PieceQuantik::initWhiteCylindre());
        $ligne = $plateau->getRow(0);
        $plateau . self::assertEquals(PieceQuantik::initWhiteCone(), $ligne[0]);
        $plateau . self::assertEquals(PieceQuantik::initWhiteCylindre(), $ligne[1]);
       

    }

    public function testGetCorner()
    {
        $plateau = new PlateauQuantik();
        $plateau->setPiece(0, 0, PieceQuantik::initWhiteCone());
        $plateau->setPiece(0, 1, PieceQuantik::initWhiteCylindre());
        $plateau->setPiece(1, 0, PieceQuantik::initWhiteSphere());
        $plateau->setPiece(1, 1, PieceQuantik::initWhiteCube());

        $corner = $plateau->getCorner(PlateauQuantik::NW);
        $plateau . self::assertEquals(PieceQuantik::initWhiteCone(), $corner[0]);
        $plateau . self::assertEquals(PieceQuantik::initWhiteCylindre(), $corner[1]);
        $plateau . self::assertEquals(PieceQuantik::initWhiteSphere(), $corner[2]);
        $plateau . self::assertEquals(PieceQuantik::initWhiteCube(), $corner[3]);


    }

    public function testGetCornerFromCoord()
    {
        $plateau = new PlateauQuantik();
        $plateau . self::assertEquals(PlateauQuantik::SE ,PlateauQuantik::getCornerFromCoord(3, 3));
        $plateau . self::assertEquals(PlateauQuantik::NW, PlateauQuantik::getCornerFromCoord(1, 0));
      
    }
    public function testGetPiece()
    {
        $plateau = new PlateauQuantik();
        $plateau->setPiece(0, 0, PieceQuantik::initWhiteCone());
        $plateau . self::assertEquals(PieceQuantik::initWhiteCone(), $plateau->getPiece(0, 0));
    }
}
    
?>
?>

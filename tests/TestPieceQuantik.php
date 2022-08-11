<?php
    namespace tests\quantik\ClassPrincipale;
    
    require_once("../ClassPrincipale/PieceQuantik.php");
    
    use quantik\ClassPrincipale\PieceQuantik;
    class PieceQuantiktest extends \PHPUnit\Framework\TestCase {
        /* Vérifier que toute les forme qu'on crée avec les init 
                sont bien de la meme forme et de la meme couleur que ce que nous 
                                voulions   
                les test des init de meme forme et de différente couleur se font ensemble 
        */
        public function testinitVoid(){
           $v= PieceQuantik::initVoid();
            $this->assertEquals(0,$v->getCouleur());
            $this->assertEquals(0,$v->getForme());
        }
    
             /* Cube */
             public function testinitCube(){
            $cb= PieceQuantik::initWhiteCube();
            $this->assertEquals(0,$cb->getCouleur());
            $this->assertEquals(1,$cb->getForme());
    
            $cn= PieceQuantik::initBlackCube();
            $this->assertEquals(1,$cn->getCouleur());
            $this->assertEquals(1,$cn->getForme());
            }
            /* cone */
            public function testinitCone(){
            $conb= PieceQuantik::initWhiteCone();
            $this->assertEquals(0,$conb->getCouleur());
            $this->assertEquals(2,$conb->getForme());
           
            $conn= PieceQuantik::initBlackCone();
            $this->assertEquals(1,$conn->getCouleur());
            $this->assertEquals(2,$conn->getForme());
            }
            /* cylindre */
    
            public function testinitCylindre(){
            $cyb= PieceQuantik::initWhiteCylindre();
            $this->assertEquals(0,$cyb->getCouleur());
            $this->assertEquals(3,$cyb->getForme());
    
           
            $cyn= PieceQuantik::initBlackCylindre();
            $this->assertEquals(1,$cyn->getCouleur());
            $this->assertEquals(3,$cyn->getForme());
            }
            /* sphere */
            public function testinitSphere(){
            
    
            $sb= PieceQuantik::initWhiteSphere();
            $this->assertEquals(4,$sb->getForme());
            $this->assertEquals(0,$sb->getCouleur());
    
            $sn= PieceQuantik::initBlackSphere();
            $this->assertEquals(1,$sn->getCouleur());
            $this->assertEquals(4,$sn->getForme());
            }
            public function testgetForme(){
                $conn= PieceQuantik::initBlackCone();
                $pieace=PieceQuantik::initBlackCylindre();
                $this->assertEquals(3,$pieace->getForme());
                $this->assertEquals(2,$conn->getForme());
            }
            public function testgetCouleur(){
                $pieace=PieceQuantik::initBlackCylindre();
                $sb= PieceQuantik::initWhiteSphere();
                $this->assertEquals(1,$pieace->getCouleur());
                $this->assertEquals(1,$sb->getCouleur());
            }
    } 
?>

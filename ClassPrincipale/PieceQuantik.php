<?php 

    namespace quantik\ClassPrincipale;
    
    /**
     * Classe PieceQuantik
     *
     * @author NADIA HARIRI MASSINISSA AIT HAMMI 
      * @date 2021-02-05
     */
    class PieceQuantik {
    
        /** 
         * @access public
         * @const int
         */
        public const WHITE = 0;
       
        public const BLACK = 1;
        
        /**
         * valeur numérique des différente piece
         * @access public
         * @const int
         */
        public const VOID = 0;
        
       
        public const CUBE = 1;
      
        public const CONE = 2;
        
        public const CYLINDRE = 3;
        
        public const SPHERE = 4;
        
        /**
         * self::TAB_AFFICHE_PIECE : tableau mutlidimensionnel stockant les affichages textuels de pièces.
         * @access public
         * @const array(array())
         */
        private const tableau_affichage_depiece = 
        [
            self::VOID     => "vide",
            self::CUBE     => [self::WHITE => "Cube:Bl", self::BLACK => "Cube:Nr"],
            self::CONE     => [self::WHITE => "Cone:Bl", self::BLACK => "Cone:Nr"],
            self::CYLINDRE => [self::WHITE => "Cylindre:Bl", self::BLACK => "Cylindre:NR"],
            self::SPHERE   => [self::WHITE => "Sphere:Bl", self::BLACK => "Sphere:Nr"],
        ];
        
        /**
         * $forme : entier ∈ [0;4] indiquant la forme de la pièce.
         * @access protected
         * @var int
         */ 
        protected int $forme;
        
        /**
         * $couleur : entier ∈ [0;1] indiquant la couleur de la pièce.
         * @access protected
         * @var int
         */ 
        protected int $couleur;
        
        
        /**
         * Constructeur
         * @access private
         * @param $forme la forme à donner à la pièce
         * @param $couleur la couleur, noire ou blanche, de la pièce.
         */
        private function __construct(int $forme, int $couleur) 
        {
            $this->forme   = $forme;
            $this->couleur = $couleur;
        }
        
        /**
         * méthode getForme
         * @access public
         * @return $this->forme
         */
        public function getForme(): int { return $this->forme;   }
        
        /**
         * méthode getCouleur
         * @access public
         * @return $this->couleur
         */
        public function getCouleur(): int { return $this->couleur; }
        
        /**
         * méthode __toString
         * @access public
         * @return un affichage textuel de la forme et la couleur de la pièce.
         */
        public function __toString(): string 
        { 
            $forme = $this->forme;
            if ( $forme == self::VOID ) return self::tableau_affichage_depiece [$forme];         
            return self::tableau_affichage_depiece [$forme][$this->couleur];
        }
        
        /**
         * @static
         * @access public
         * @return une case vide
         */
        public static function initVoid(): self { 
            return new PieceQuantik(self::VOID, self::WHITE);
         }
        
        /**
         * @static
         * @access public
         * @return une pièce de forme cube et de couleur blanche
         */
        public static function initWhiteCube(): self { return new PieceQuantik(self::CUBE, self::WHITE); }
        
        /**
         * @static
         * @access public
         * @return une pièce de forme cube et de couleur noire
         */
        public static function initBlackCube(): self { return new PieceQuantik(self::CUBE, self::BLACK); }
        
        /**
         * @static
         * @access public
         * @return une pièce de forme cone et de couleur blanche
         */
        public static function initWhiteCone(): self { return new PieceQuantik(self::CONE, self::WHITE); }
        
        /**
         * @static
         * @access public
         * @return une pièce de forme cone et de couleur noire
         */
        public static function initBlackCone(): self { return new PieceQuantik(self::CONE, self::BLACK); }
        
        /**
         * @static
         * @access public
         * @return une pièce de forme cylindre et de couleur blanche
         */
        public static function initWhiteCylindre(): self { return new PieceQuantik(self::CYLINDRE, self::WHITE); }
        
        /**
         * @static
         * @access public
         * @return une pièce de forme cylindre et de couleur noire
         */
        public static function initBlackCylindre(): self { return new PieceQuantik(self::CYLINDRE, self::BLACK); }
        
        /**
         * @static
         * @access public
         * @return une pièce de forme sphere et de couleur blanche
         */
        public static function initWhiteSphere(): self { return new PieceQuantik(self::SPHERE, self::WHITE); }
        
        /**
         * @static
         * @access public
         * @return une pièce de forme sphere et de couleur noire
         */
        public static function initBlackSphere(): self { return new PieceQuantik(self::SPHERE, self::BLACK); }
    }
?>

<?php 

    namespace quantik\ClassPrincipale;
    
    require_once("../ClassPrincipale/PieceQuantik.php");
    
    use quantik\ClassPrincipale\PieceQuantik;
    use Exception;
    
    /**
      * Classe PlateauQuantik
      *
      * @author NADIA HARIRI MASSINISSA AIT HAMMI 
      * @date 2021-02-05
     */
    class PlateauQuantik {
       
       
       
       
        /**
         * @access public
         * @const int
         */
    
        public const NB_ROWS = 4;
     
        public const NB_COLS = 4;
       
        public const NW = 0;
       
        public const NE = 1;
       
        public const SW = 2;
       
        public const SE = 3;
        
        /**
          * $cases : tableau multidimensionnel de PieceQuantik  représentant le plateau 
          * @access protected
          * @var PieceQuantik[][]
          */ 
        protected $cases;
        
        /**
         * Constructeur, initialise avec des case VOID (forme vide).
         * @access public
         */
        public function __construct() 
        {
            $this->cases = array(array());
            for ( $i = 0; $i < self::NB_ROWS; $i++ ) 
                for ( $y = 0; $y < self::NB_COLS; $y++ )
                    $this->cases[$i][$y] = PieceQuantik::initVoid();
        }
        private static function checkBounds(int $rowNum, int $colNum): void {
            if ( $rowNum < 0 || $rowNum >= self::NB_ROWS ||
                 $colNum < 0 || $colNum >= self::NB_COLS   ) throw new \Exception("Coordonnées hors du plateau\n");
        }
        
        /**
         * @static
         * Vérifie que la direction donné fait bien partie de nos 4 valeurs possibles (NW, NE, SW, SE).
         * @access public
         */
        private static function checkDir(int $dir) {
            if ( $dir < 0 && $dir > self::SE ) throw new \Exception("Direction non valide\n");
        }
        /**
         * méthode getPiece
         * @access public
         * @param $rowNum ligne du plateau
         * @param $colNum colonne du plateau
         * @return PieceQuantik contenu dans $this->cases[$rowNum][$colNum].
         */




         /*************************************************getteur******************************************** */
        public function getPiece(int $rowNum, int $colNum): PieceQuantik 
        {
            self::checkBounds($rowNum, $colNum);
            return $this->cases[$rowNum][$colNum];
        }
        
        /**
         * méthode getRow
         * @access public
         * @param $rowNum ligne du plateau
         * @return les PieceQuantik de la ligne $rowNum.
         */
        public function getRow(int $rowNum): array
        {
            self::checkBounds($rowNum, 0);
            return $this->cases[$rowNum];
        }
        
       
        public function getCol(int $colNum): array
        {
             self::checkBounds(0, $colNum);
             $col = array();
             for($i = 0; $i < self::NB_COLS; $i++)
                $col[$i] = $this->cases[$i][$colNum];
             return $col;
        }
        
       
        public function getCorner(int $dir): array 
        {
            self::checkDir($dir);
            switch($dir) 
            {
                case self::NW:
                    return [ $this->cases[0][0], $this->cases[0][1], $this->cases[1][0], $this->cases[1][1] ]; 
                    
                case self::NE: 
                    return [ $this->cases[0][2], $this->cases[0][3], $this->cases[1][2], $this->cases[1][3] ];
                    
                case self::SW:
                    return [ $this->cases[2][0], $this->cases[2][1], $this->cases[3][0], $this->cases[3][1] ];
                    
                case self::SE: 
                    return [ $this->cases[2][2], $this->cases[2][3], $this->cases[3][2], $this->cases[3][3] ];
            }

        }
        public static function getCornerFromCoord(int $rowNum, int $colNum): int {
            self::checkBounds($rowNum, $colNum);
            
            if ( $rowNum <  self::NB_ROWS/2 && $colNum <  self::NB_COLS/2 ) return self::NW;
            if ( $rowNum <  self::NB_ROWS/2 && $colNum >= self::NB_COLS/2 ) return self::NE;
            if ( $rowNum >= self::NB_ROWS/2 && $colNum <  self::NB_COLS/2 ) return self::SW;
            if ( $rowNum >= self::NB_ROWS/2 && $colNum >= self::NB_COLS/2 ) return self::SE;
        }
        
     
        
        
        /********************************************SETEUR*******************************************************/
        public function setPiece(int $rowNum, int $colNum, PieceQuantik $p) 
        {
            self::checkBounds($rowNum, $colNum);
            $this->cases[$rowNum][$colNum] = $p;
        }
        /*****************************************tostring**************************************************** */

        /**
         * méthode __toString()
         * @access public
         * @return une représentation textuel du plateau dans l'état.
         */
        public function __toString(): string 
        {  $msg = "";
            for ($i = 0; $i < self::NB_ROWS; $i++) {
                for ($j = 0; $j < self::NB_COLS; $j++) {
                    $msg .= "\t" . $this->cases[$i][$j];
                }
                $msg .= "<br><br>";
            }
            return $msg;
        }
    }
?>

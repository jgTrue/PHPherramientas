<?php

include_once('Dulces.php');

Class Tarta extends Dulce{

    public function __construct(
        $nombre,
        $numero,
        $precio,
        private $rellenos = [],
        private $numPisos,
        private $minNumComensales = 2,
        private $maxNumComensales
        ){
            parent::__construct($nombre,$numero,$precio);
        }
        
 
        // Get the value of numPisos

        public function getNumPisos()
        {
                return $this->numPisos;
        }

        // Get the value of minNumComensales

        public function getMinNumComensales()
        {
            return $this->minNumComensales;
        }
        
        // Get the value of maxNumComensales

        public function getMaxNumComensales()
        {
            return $this->maxNumComensales;
        }

        public function muestraComensalesPosibles(){
            if($this->getMinNumComensales() == $this->getMaxNumComensales()){
                
                if($this->getMinNumComensales() > 2){
                    return 'Para '.$this->getMinNumComensales().' comensales';
                }else{
                    return 'Para dos comensales';
                }
            }else{
                return 'De '.$this->getMinNumComensales().' a '.$this->getMaxNumComensales().' comensales';
            }
        }

        public function getRellenos(){
            $str = '';
            foreach ($this->rellenos as $key => $value) {
                $str .= $value.'. '; 
            }
            return $str;
        }

        public function muestraResumen()
        {
        return parent::muestraResumen()
        .'Número de pisos: '.$this->getNumPisos()
        .'<br>Rellenos: '.$this->getRellenos()
        .'<br>Comensales: '.$this->muestraComensalesPosibles();
        }

       
}
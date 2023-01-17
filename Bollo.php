<?php
include_once('Dulces.php');
Class Bollo extends Dulce{


    public function __construct(
        $nombre,
        $numero,
        $precio,
        private $relleno
    )
    {
        parent::__construct($nombre,$numero,$precio);
    }

    // Get the value of relleno

    public function getRelleno()
    {
            return $this->relleno;
    }
    
    // Get the value of resumen
    public function muestraResumen(){
        return parent::muestraResumen()."Relleno: ".$this->getRelleno().'<br>';   
    }

}

?>
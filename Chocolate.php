<?php

include_once('Dulces.php');

Class Chocolate extends Dulce{

    public function __construct(
        $nombre,
        $numero,
        $precio,
        private $porcentajeCacao,
        private $peso
        ){
            parent::__construct($nombre,$numero,$precio);
        }


        // Get the value of porcentajeCacao

        public function getPorcentajeCacao()
        {
            return $this->porcentajeCacao;
        }

        
        // Get the value of peso

        public function getPeso()
        {
            return $this->peso;
        }

        public function muestraResumen()
        {
        return parent::muestraResumen() . 'Porcentaje de cacao: ' . $this->getPorcentajeCacao()
            . '%<br>Peso: ' . $this->getPeso() . 'g<br>';
        }
}
<?php 

class Dulce{

    private const IVA = 0.21;

    public function __construct(
        public $nombre,
        protected $numero,
        private $precio
    )
    {
        
    }
    
    // Get the value of nombre
     
    public function getNombre()
    {
            return $this->nombre;
    }

    // Get the value of numero

    public function getNumero()
    {
            return $this->numero;
    }


    // Get the value of precio

    public function getPrecio()
    {
            return $this->precio;
    }

    // Get the value of precio IVA

    public function getPrecioConIVA(){
        return $this->precio + ($this->precio * self::IVA);
    }

    public function muestraResumen()
    {
        return 'Nombre: ' . $this->getNombre()
            . '<br>Numero: ' . $this->getNumero()
            . '<br>Precio: ' . $this->getPrecio()
            . '€<br>Precio con IVA: ' . $this->getPrecioConIVA() . '€<br>';
    }   
     
}

?>
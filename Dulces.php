<?php 
include_once ('interface.php'); 
abstract class Dulce implements Resumible{

    // La clase abstracta seguirá funcionando, la diferencia es que no podrá ser instanciada.
    // ¿Hace falta que también lo implementen los hijos? No es necesario, ya que, ellos la implementan por herencia.
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
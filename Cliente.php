<?php
include_once('Dulces.php');
class Cliente{
    private $dulcesComprado = [];
    public function __construct(
        public $nombre,
        private $numero,
        private $numDulcesComprados,
        private $numPedidosEfectuados = 0
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
    
    // Get the value of numPedidosEfectudos
     
    public function getNumPedidosEfectuados()
    {
            return $this->numPedidosEfectuados;
    }

    // Set the value of numPedidosEfectuados

    public function setNumPedidosEfectuados($numPedidosEfectuados)
    {
            $this->numPedidosEfectuados = $numPedidosEfectuados;

            return $this;
    }

    public function listaDeDulces(Dulce $d): bool
    {
        return (in_array($d, $this->dulcesComprado));
    }

    public function comprar(Dulce $d):bool
    {
        echo $this->listaDeDulces($d) ? 'Se añadió una unidad más de '.$d->getNombre() : 'Se añadió una unidad de '.$d->getNombre();
        $this->numPedidosEfectuados = $this->getNumPedidosEfectuados() + 1;
        
        array_push($this->dulcesComprado, $d);

        return true;
    }

    public function valorar(Dulce $d, String $c){
        $this->listaDeDulces($d) ? 'Se ha realizado la valoración' : 'No se puede valorar un producto no adquirido';
    }

    public function listarPedidos(): void
    {
        $str = 'Ha realizado: '.$this->getNumPedidosEfectuados().' pedidos - ';
        
        foreach ($this->dulcesComprado as $key => $value) {
            $str .= $value;
        }

        echo $str;
    }



        

        
}
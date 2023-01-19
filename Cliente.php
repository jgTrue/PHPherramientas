<?php
include_once('Dulces.php');
include_once('util/DulceNoCompradoException.php');
include_once('util/ClienteNoEncontradoException.php');
include_once('util/DulceNoEncontradoException.php');

class Cliente{
    
    private $dulcesComprado = [];
    public function __construct(
        public $nombre,
        private $numero,
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
        echo $this->listaDeDulces($d) ? 'Se añadirá una unidad más de '.$d->getNombre().' <br>' : 'Se añadirá una unidad de '.$d->getNombre().' <br>';
        
        array_push($this->dulcesComprado, $d);
        if($this->listaDeDulces($d)){
            echo 'Se ha realizado la compra del artículo: '.$d->getNombre().' <br>';
            $this->numPedidosEfectuados = $this->getNumPedidosEfectuados() + 1;
            return true;

        }else{
            throw new DulceNoCompradoException('La compra no se ha podido realizar correctamente.');
        }

    }

    public function valorar(Dulce $d, String $c){
       echo $this->listaDeDulces($d) ? 'Se ha realizado la valoración<br>'.$c.'<br>' : 'No se puede valorar un producto no adquirido<br>';
       return $this;
    }

    public function listarPedidos() //He quitado :void a razón de reutilizar la función en muestraResumen()
    {
        $str = $this->getNumPedidosEfectuados().' pedidos: ';
        
        foreach ($this->dulcesComprado as $value) {
            $str .= '<br>- '.$value->getNombre();
        }

        return $str;
    }

    public function muestraResumen()
    {
        $str = '<br>Nombre: ' . $this->getNombre()
            . '<br>Numero: ' . $this->getNumero()
            . '<br>Pedidos efectuados, ';
        $str .= $this->listarPedidos().'<br>';

        return $str;


    }  

        

        
}
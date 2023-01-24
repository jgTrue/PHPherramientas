<?php

use Monolog\Logger;
use util\LogFactory;

include_once('Bollo.php');
include_once('Tarta.php');
include_once('Chocolate.php');
include_once('Cliente.php');
include_once('util/LogFactory.php');

Class Pasteleria{

    private $productos = [];
    private $numProductos = 0;
    private $clientes = [];
    private $numClientes = 0;

    private Logger $log;

    public function __construct(
        private $nombre,
    )
    {
        $this->log = LogFactory::getLogger();
    }
        
    // Get the value of nombre

    public function getNombre()
    {
        return $this->nombre;
    }

    // Get the value of numProductos
        
    public function getNumProductos()
    {
            return $this->numProductos;
    }

    // Get the value of numClientes

    public function getNumClientes()
    {
        return $this->numClientes;
    }
    

    private function incluirProducto(Dulce $producto){
        array_push($this->productos, $producto);
        $this->log->notice('Se agregó un producto');
    }

    public function incluirTarta($nombre,$precio,$rellenos,$numPisos, $maxNumComensales, $minNumComensales = 2)
    {
        $tarta = new Tarta($nombre, $this->getNumProductos(), $precio, $rellenos, $numPisos, $maxNumComensales, $minNumComensales);
        $this->numProductos++;
        $this->incluirProducto($tarta);
        
    }
   
    public function incluirBollo($nombre,$precio,$relleno)
    {
        $bollo = new Bollo($nombre, $this->getNumProductos(), $precio, $relleno);
        $this->numProductos++;
        $this->incluirProducto($bollo);
    }
    
    public function incluirChocolate($nombre,$precio,$porcentajeCacao,$peso)
    {
        $chocolate = new Chocolate($nombre, $this->getNumProductos(), $precio, $porcentajeCacao,$peso);
        $this->numProductos++;
        $this->incluirProducto($chocolate);
    }

    public function incluirCliente($nombre,$numPedidosEfectuados = 0){
        $cliente = new Cliente($nombre, $this->getNumClientes(), $numPedidosEfectuados);
        $this->numClientes++;
        array_push($this->clientes, $cliente);
        $this->log->notice('Se agregó un cliente');
    }

    public function listarProductos(){
        $str = "<br>Listado de productos:<br>";
        foreach ($this->productos as $value) {
            $str .= $value->muestraResumen().'<br>';
        }
        return $str;
    }

    public function listarClientes()
    {
        $str = "<br>Listado de socios:<br>";
        foreach ($this->clientes as $value) {
            $str .= $value->muestraResumen().'<br>';
        }
        return $str;
    }

    public function comprarClienteProducto($numeroCliente,$numeroDulce){
        $usuario = null;
        $pastel = null;
        try{
        foreach ($this->clientes as $cliente) {
            if($cliente->getNumero() == $numeroCliente){
                $usuario = $cliente;
                try{
                    foreach ($this->productos as $producto) {
                        if($producto->getNumero() == $numeroDulce){
                            $pastel = $producto; 
                            $cliente->comprar($producto);
                            $this->log->info('Se realizo una compra');
                        }
                    }
                    if ($pastel == null) {
                            $this->log->warning('No se encontró el dulce',[$numeroDulce]);
                            throw new DulceNoEncontradoException('<br>El producto que solicita no se encuentra disponible.');
                    }
                }catch(DulceNoCompradoException $cantBuy){
                    $cantBuy->messageException();
                }catch(DulceNoEncontradoException $doesntExist){
                    $doesntExist->messageException();
                }
            }
        }
        if($usuario == null){
            $this->log->warning('No se encontró un cliente',[$numeroCliente]);    
            throw new ClienteNoEncontradoException("<br>El cliente no se ha encontrado.<br>");
        }
        
        }catch(ClienteNoEncontradoException $notFound){
            echo $notFound->messageException();
        }
        return $this;
    }

}
<?php

include_once('Cliente.php');
include_once('Bollo.php');
include_once('Tarta.php');

$productoBollo = new Bollo('Bollicao',2,1.1,'chocolate');
$productoTarta = new Tarta('tarta de chocolate',3,7.20,['Nata','chocolate'],2,5);

$usuario = new Cliente('Juancho', 1);

$usuario->comprar($productoBollo);
$usuario->comprar($productoTarta);
$usuario->comprar($productoTarta);
$usuario->comprar($productoTarta);
$usuario->valorar($productoTarta, '10');
$usuario->listarPedidos();
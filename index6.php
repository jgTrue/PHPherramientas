<?php

include_once('Pasteleria.php');

$pasteleria = new Pasteleria('Pasteles S.L.');

$pasteleria->incluirCliente('Jon');
$pasteleria->incluirCliente('Bron');
$pasteleria->incluirCliente('Bran');

$pasteleria->incluirBollo('bollicao', 1.10, 'chocolate');
$pasteleria->incluirChocolate('Nestle jungly', 2.15, 65, 100);
$pasteleria->incluirTarta('Kacao', 12, ['chocolate', 'avellanas', 'crema de cacahuetes'], 3, 2);

$pasteleria->comprarClienteProducto(1, 1);
$pasteleria->comprarClienteProducto(1, 0);
$pasteleria->comprarClienteProducto(5, 2);

echo $pasteleria->listarClientes();
echo $pasteleria->listarProductos();



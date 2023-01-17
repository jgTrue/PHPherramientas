<?php
include_once('Bollo.php');

$bollo = new Bollo('Fosquito', 20, 1.10, 'Chocolate');

echo $bollo->muestraResumen();
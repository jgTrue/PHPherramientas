<?php

include_once('Tarta.php');

$tarta = new Tarta('Tarta oreo', 5, 8.50, ['Nata','Chocolate negro','Chocolate blanco'], 3, 2,2);

echo $tarta->muestraResumen();
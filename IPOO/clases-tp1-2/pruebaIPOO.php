<?php
include 'Punto.php';
//Prueba
echo "ingresar coordenada x\n";
$coordX = trim(fgets(STDIN));
echo "ingresar coordenada y\n";
$coordY = trim(fgets(STDIN));
$puntoPrueba = new Punto($coordX, $coordY);
echo $puntoPrueba -> getCoordenada_x();
?>
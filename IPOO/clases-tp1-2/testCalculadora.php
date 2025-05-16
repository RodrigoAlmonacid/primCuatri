<?php
include 'calculadora.php';
$prueba = new calculadora(6,0);
echo $prueba->__toString();
echo "La suma de los números es: ".$prueba -> sumar()."\n";
echo "La resta de los números es: ".$prueba -> restar()."\n";
echo "La multiplicación de los números es: ".$prueba -> multiplicar()."\n";
echo "La división de los números es: ".$prueba -> dividir()."\n";
?>
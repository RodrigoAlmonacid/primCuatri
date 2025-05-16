<?php
include 'Calculadora.php';

$operacion_1 = new Calculadora(20, 1);
echo "La suma entre ambos números es: " . $operacion_1->sumar()  . "\n";
echo "La resta entre ambos números es: " . $operacion_1->restar() . "\n";
echo "La multiplicación entre ambos números es: " . $operacion_1->multiplicar() . "\n";
echo "La división entre ambos números es: " . $operacion_1->dividir() . "\n";

echo $operacion_1;
    


?>
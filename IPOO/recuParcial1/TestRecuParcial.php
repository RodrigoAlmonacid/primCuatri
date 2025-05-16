<?php
//Test recu primer parcial
include_once 'Cliente.php';
include_once 'Cuota.php';
include_once 'Prestamo.php';
include_once 'Financiera.php';
$objCliente = new Cliente('Rodrigo', 'Almonacid', 33773024, 'Fava 703', 'rodrigo@gmail.com', 2945410101, 150000);
$objPrestamo = new Prestamo(50000, 5, 1, $objCliente, []);
$prueba = $objPrestamo->otorgarPrestamo();
//mostrar cuotas anteriores
function mostrarCuotas($arreglo){
    $i=0;
    foreach ($arreglo as $cuota){
        echo "Cuota N° ".($i+1).": ".$cuota."\n";
        $i++;
    }   
}

echo mostrarCuotas($prueba);
//print_r($prueba);
?>
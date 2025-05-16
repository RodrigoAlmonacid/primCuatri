<?php
include_once "ClienteSimulacro.php";
include_once "MotoSimulacro.php";
include_once "VentaSimulacro.php";
$objCliente = new Cliente("Rodrigo", "Almonacid", true, "DNI", "33.773.024");
$objMoto1 = new Moto(123456, 1200000, 2021, "Motomel skua", 25, false);
$objMoto2 = new Moto(123456, 1200000, 2021, "Motomel Motard", 25, false);
$coleccionMotos = [$objMoto1, $objMoto2];
$objVenta = new Venta(["dd" => 12, "mm" => 02, "aaaa" => 2025], $objCliente, $coleccionMotos);
$nuevaVenta = $objVenta -> incorporarMoto($objMoto2);
//echo $objCliente;
//echo $objMoto1;
echo $objVenta;
?>
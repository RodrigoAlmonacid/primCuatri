<?php
include_once "ClienteSimulacro.php";
include_once "MotoSimulacro.php";
include_once "VentaSimulacro";
$objCliente = new Cliente("Rodrigo", "Almonacid", false, "DNI", "33.773.024");
$objMoto = new Moto("123456", "1200000", "2021", "Motomel Motard", "25", true);
$objVenta = new Venta("123", [12, 02, 2025], $objCliente, $objMoto);
echo $objCliente;
echo $objMoto;
$precio = $objMoto -> DarPrecioVenta(2022);
echo $precio;
?>
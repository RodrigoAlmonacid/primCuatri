<?php
include_once 'CabinaPeaje.php';
include_once 'Recibo.php';
include_once 'RegistroCamion.php';
include_once 'RegistroEscolar.php';
include_once 'RegistroVehiculo.php';
$objCabinaPeaje= new CabinaPeaje();
$objCamion=new RegistroCamion('AA111AA', 16000, 3);
$objEscolar=new RegistroEscolar('BB222BB', 19);
$objParticular=new RegistroVehiculo('CC333CC');
$peajeCamion=$objCamion->valorPeaje();
$peajeEscolar=$objEscolar->valorPeaje();
$peajeParticular=$objParticular->valorPeaje();
echo "Auto: ".$peajeParticular."\nCamion: ".$peajeCamion."\nTrafic: ".$peajeEscolar."\n";
$escolar['patente']=['DD333DD'];
$escolar['cantAsientos']=[50];
$cobro=$objCabinaPeaje->cobrarPeaje("Escolar", $escolar);
echo $cobro;
?>
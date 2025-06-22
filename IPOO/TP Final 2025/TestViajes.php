<?php
include_once 'Persona.php';
include_once 'Pasajero.php';
include_once 'BaseDatos.php';
//voy a buscar una persona
$objPersona=new Persona();
$objPasajero=new Pasajero();
$cargar=$objPasajero->cargarPasajero(35384661, 'Florencia', 'Strumia de Almonacid', 29935384661);
$insertarPasajero=$objPasajero->insertar();
if($insertarPasajero){
    $respuesta="Persona cargada con éxito\n";
}
else $respuesta="Algo salió mal\n".$objPersona->getMensaje();
$insertar=$objPasajero->__toString();
echo "-----------\n".$respuesta."-----------\n";
//echo $objPersona;
?>
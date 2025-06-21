<?php
include_once 'Persona.php';
//voy a buscar una persona
$objPersona=new Persona();
$insertar=$objPersona->insertar(35384661, 'Florencia', 'Strumia de Almonacid');
/*if($insertar){
    $respuesta="Persona cargada con éxito\n";
}
else $respuesta="Algo salió mal\n";
*/echo "-----------\n".$insertar."-----------\n";
//echo $objPersona;
?>
<?php
include_once 'Persona.php';
//voy a buscar una persona
$objPersona=new Persona();
$buscar=$objPersona->buscar(35384661);
echo "-----------\n".$buscar."-----------\n";
echo $objPersona;
?>
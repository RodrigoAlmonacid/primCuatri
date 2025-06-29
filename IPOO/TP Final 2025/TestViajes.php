<?php
include_once 'Persona.php';
include_once 'Pasajero.php';
include_once 'BaseDatos.php';
include_once 'Responsable.php';
include_once 'Viaje.php';
menu();
function menu(){
    echo "Ingrese el número de la opcion que desea:\n";
    echo "**** MENU PRINCIPAL ****\n";
    echo "1) Empresa\n2) Viajes\n3) Pasajeros\n4) Responsables\n";
    echo "Su eleccion: ";
}
$option=trim(fgets(STDIN));
function opciones($option){
    switch
}
?>
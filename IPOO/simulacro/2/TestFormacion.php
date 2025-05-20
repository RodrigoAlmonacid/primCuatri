<?php
include_once 'Vagon.php';
include_once 'VagonCarga.php';
include_once 'VagonPasajeros.php';
include_once 'Locomotora.php';
include_once 'Formacion.php';
echo "Item 1:\n";    
    //Creo un objeto locomotora.
    $objLocomotora = new Locomotora(188000, 140);
echo "\nItem 2:\n";
    //creo el primer vagon (pasajeros). 
    $objVagon1 = new VagonPasajeros(2025, 25, 5, 15000, 30);
    //agrego los 25 pasajeros en $objVagon1
    $incorpora = $objVagon1->incorporarPasajero(25);
    if($incorpora){
        echo "Se incorporaron 25 pasajeros al vagón 1.\n";
    }
    else {
        echo "No pudieron incorporarse los 25 pasajeros al vagón 1.\n";
    }
    //creo el segundo vagón (carga)
    $objVagon2 = new VagonCarga(2025, 29, 5, 15000, 60000);
    //agrego la carga al $objVagon2
    $incorpora = $objVagon2->incorporaCarga(55000);
    if($incorpora){
        echo "Se incorporaron 55tn al Vagón 2.\n";
    }
    else {
        echo "No pudieron agregarse 55tn a la carga del vagón 2.\n";
    }
    //Creo el tercer vagon (pasajeros)
    $objVagon3 = new VagonPasajeros(2025, 25, 5, 15000, 50);
    //Agrego los 50 pasajeros al $objVagon3
    $incorpora = $objVagon3->incorporarPasajero(50);
    if($incorpora){
        echo "Se incorporaron 50 pasajeros al vagón 3.\n";
    }
    else {
        echo "No pudieron incorporarse los 50 pasajeros al vagón 3.\n";
    }
echo "\nItem 3:\n";
    //Creo el objeto formacion
    $objFormacion = new Formacion(20, $objLocomotora);
    //incorporo los vagones 1 y 2
    $incorporaVagon = $objFormacion->incorporaVagonFormacion($objVagon1);
    if($incorporaVagon){
        echo "Se agregó correcatamente el Vagón 1 a la fomación.\n";
    }
    else {
        echo "Nu pudo incorporarse el vagón 1 a la formación.\n";
    }
    $incorporaVagon = $objFormacion->incorporaVagonFormacion($objVagon2);
    if($incorporaVagon){
        echo "Se agregó correcatamente el Vagón 2 a la fomación.\n";
    }
    else {
        echo "Nu pudo incorporarse el vagón 2 a la formación.\n";
    }
echo "\nItem 4:\n";
    $incorporarPasajeroFormacion = $objFormacion->incorporarPasajeroFormacion(6);
    if($incorporarPasajeroFormacion){
        echo "Se incorporaron 6 pasajeros a la formación.\n";
    }
    else {
        echo "No pudieron incorporarse los 6 pasajeros a la formación.\n";
    }
echo "\nItem 5:\n";
    echo "\nVagon 1:\n".$objVagon1."\nVagon 2:\n".$objVagon2."\nVagon 3:\n".$objVagon3;
echo "\nItem 6:\n";
    $incorporarPasajeroFormacion = $objFormacion->incorporarPasajeroFormacion(14);
    if($incorporarPasajeroFormacion){
        echo "Se incorporaron 14 pasajeros a la formación.\n";
    }
    else {
        echo "No pudieron incorporarse los 14 pasajeros a la formación.\n";
    }
echo "\nItem 7:\n";
    echo $objLocomotora."\n";
echo "\nItem 8:\n";
    $promedioPasajeros = $objFormacion->promedioPasajeroFormacion();
    echo "El promedio de pasajeros es: ".$promedioPasajeros."\n";
echo "\nItem 9:\n";
    $pesoFormacion = $objFormacion->pesoFormacion();
    echo "El peso de la formacion es: ".$pesoFormacion."\n";
?>
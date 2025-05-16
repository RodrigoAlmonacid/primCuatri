<?php
//test de ejercicio de disquera
include_once "Persona.php";
include_once "Disquera.php";
$objPersona = new Persona("Rodrigo Ulises", "Almonacid Medina", "DNI", "33.773.024");
$objDisquera = new Disquera([15, 30], [21, 45], "Abierta", "Fava 703", $objPersona);
$testHora = $objDisquera -> dentroHoraAtencion(15, 29);
$testApertura = $objDisquera -> abrirDisquera(15, 29);

if ($testHora){
    echo "La Disquera se encuentra Abierta\n";
}
else {
    echo "La Disquera se encuentra Cerrada\n";
}

echo $objDisquera;
?>
<?php
//incluyo las clases persona (datos del autor) y libro
include_once "Persona.php";
include_once "Libro.php";

//creo los objetos de las clases
$objPersona = new Persona("Rodrigo Ulises", "Almonacid Medina", "DNI", "33.773.024");
$objLibro = new Libro("978-84-376-0494-7", "El mate", 2011, "Limay", 150, "El libro cuenta historias de mate con amigos", $objPersona);
echo $objLibro;
$antiguedad = $objLibro -> aniosDesdeEdicion(2025);
echo "Han pasado ".$antiguedad." años desde la publicación del Libro.\n";
$editorial = $objLibro -> perteneceEditorial("Lima");
if ($editorial){
    echo "El libro pertenece a dicha editorial.\n";
}
else{
    echo "El libro NO pertenece a dicha editorial.\n";
} 
?>
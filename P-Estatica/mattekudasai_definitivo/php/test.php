<?php
include_once 'Imagenes.php';
$nuevaImagen=new Imagenes();
$nuevaImagen->cargar('una', 'nueva', 'imagen', null, 2);
$nuevaImagen->insertar();
?>
<?php
include_once 'Visita.php';
$objVisita=new Visita();
//$objVisita->cargar('Rodrigo', 'Almonacid', 2994704246, '2025-08-12', null, '11:08:00');
$prueba=$objVisita->eliminar(1);
if($prueba){
    echo "éxito";
}
else{
    echo "algo salió mal";
}
?>
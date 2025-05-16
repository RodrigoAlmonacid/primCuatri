<?php
include_once "Reloj.php";
$test_reloj = new Reloj(23, 10, 10);
$test_reloj -> incremento();
echo $test_reloj;

?>
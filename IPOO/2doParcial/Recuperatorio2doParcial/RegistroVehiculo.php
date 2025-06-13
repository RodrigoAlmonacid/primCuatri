<?php
Class RegistroVehiculo{
    //Atributos
    private $patente;

//Metodo constructor
public function __construct($patente)
{
    $this->patente=$patente;
}

//metodos de acceso
public function getPatente(){
    return $this->patente;
}
public function setPatente($patente){
    $this->patente = $patente;
}

//Método Valor peaje
public function valorPeaje(){
    $valorBase=20;
    return $valorBase;
}

//metodo toString
public function __toString()
{
    $vehiculo="Registro de vehiculo dominio: ".$this->getPatente()."\n";
    return $vehiculo;
}
}
?>
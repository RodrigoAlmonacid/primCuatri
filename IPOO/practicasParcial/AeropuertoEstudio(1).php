<?php
class Aeropuerto{
    //Atributos
    private $denominacion;
    private $direccion;
    private $coleccionAerolineas;

    //Metodo constructor
    public function __construct($denominacion, $direccion, $coleccionAerolineas)
    {
        $this -> denominacion = $denominacion;
        $this -> direccion = $direccion;
        $this -> coleccionAerolineas = $coleccionAerolineas;
    }

    //Métodos de acceso
    public function getDenominacion(){
        return $this -> denominacion;
    }
    public function setDenominacion($denominacion){
        $this -> denominacion = $denominacion;
    }

    public function getDireccion(){
        return $this -> direccion;
    }
    public function setDireccion($direccion){
        $this -> direccion = $direccion;
    }

    public function getColAerolineas(){
        return $this -> coleccionAerolineas;
    }
    public function setColAerolineas($coleccionAerolineas){
        $this -> coleccionAerolineas = $coleccionAerolineas;
    }

    //Método toString
}
?>
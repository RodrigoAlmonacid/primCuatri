<?php
class Aeropuerto{
    private $denominacion;
    private $direccion;
    private $colAerolineas;

    public function __construct($denominacion, $direccion, $colAerolineas){
        $this -> denominacion = $denominacion;
        $this -> direccion = $direccion;
        $this -> colAerolineas = $colAerolineas;
    }

        //metodos de acceso
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

    public function getColeccionAerolineas(){
        return $this -> colAerolineas;
    }
    public function setColeccionAerolineas($aerolineas){
        $this -> colAerolineas = $aerolineas;
    }
}
?>
<?php
//Clase financiera, recuperatorio del 1er parcial
class Financiera{
    //Atributos
    private $denominacion;
    private $direccion;
    private $colPrestamos;

    //Método constructor
    public function __construct($denominacion, $direccion)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colPrestamos = [];
    }

    //Métodos de acceso
    public function getDenominacion(){
        return $this->denominacion;
    }
    public function setNumero($denominacion){
        $this->denominacion = $denominacion;
    }

    public function getDireccion(){
        return $this->direccion;
    }
    public function setMontoCuota($direccion){
        $this->direccion = $direccion;
    }

    public function getColPrestamos(){
        return $this->colPrestamos;
    }
    public function setMontoInteres($colPrestamos){
        $this->colPrestamos = $colPrestamos;
    }

    //Método toString
    public function __toString()
    {
        $financiera = "Denominación: ".$this->getDenominacion()."\n";
        $financiera .= "Direccion: ".$this->getDireccion()."\n";
        $coleccion = $this->getColPrestamos();
        foreach($coleccion as $prestamo){
            $financiera .= $prestamo;
        }
        return $financiera;
    }
}    
?>
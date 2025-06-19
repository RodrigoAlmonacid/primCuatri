<?php
class Responsable extends Persona{
    //Atributos propios
    private $numLicencia;
    private $numEmpleado;

    //Método constructor
    public function __construct($nombre, $apellido, $dni, $numLicencia)
    {
        //llamo al constructor de la clase padre
        parent::__construct($nombre, $apellido, $dni);
        //Inicio las variables instancia propias de la clase
        $this->numLicencia=$numLicencia;
        $this->numEmpleado=null;
    }

    //Método de acceso
    public function getNumLicencia(){
        return $this->numLicencia;
    }
    public function setNumLicencia($lic){
        $this->numLicencia=$lic;
    }

    public function getNumEmpleado(){
        return $this->numEmpleado;
    }
    public function setNumEmpleado($numEmpleado){
        $this->numEmpleado=$numEmpleado;
    }

    //Método toString
    public function __toString()
    {
        //Llamo al toString de la clase padre
        $responsable=parent::__toString();
        //agrego atributos propios
        $responsable.="Licencia N°: ".$this->getnumLicencia()."\n";
        $responsable.="Legajo N°: ".$this->getNumEmpleado()."\n";
        return $responsable;
    }
}
?>
<?php
//clase partido de basquet
class PartidoBasquet extends Partido{
    //Atributos propios de la clase
    private $infraccionesE1;
    private $infraccionesE2;
    private $coefBasquet;

    //Método constructor
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $infraccionesE1, $infraccionesE2)
    {
        //Inicio los atributos de la clase padre
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        //Inicio el atributo propio de la clase
        $this->infraccionesE1=$infraccionesE1;
        $this->infraccionesE2=$infraccionesE2;
        $this->coefBasquet=0.75;
    }

    //Métodos de acceso
    public function getInfraccionesE1(){
        return $this->infraccionesE1;
    }
    public function setInfraccionesE1($infraccionesE1){
        $this->infraccionesE1=$infraccionesE1;
    }

    public function getInfraccionesE2(){
        return $this->infraccionesE2;
    }
    public function setInfraccionesE2($infraccionesE2){
        $this->infraccionesE2=$infraccionesE2;
    }

    public function getCoefBasquet(){
        return $this->coefBasquet;
    }
    public function setCoefBasquet($coeficiente){
        $this->coefBasquet=$coeficiente;
    }

    //Método toString
    public function __toString()
    {
        $partBasquet = parent::__toString();
        $partBasquet.= "Faltas cometidas por el equipo 1: ".$this->getInfraccionesE1()."\n";
        $partBasquet.= "Faltas cometidas por el equipo 2: ".$this->getInfraccionesE2()."\n";
        return $partBasquet;
    }
}
?>
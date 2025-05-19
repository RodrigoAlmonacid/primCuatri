<?php
//Clase vagon, simulacro 2do parcial
class Vagon{
    //Atributos
    private $anioInstalacion;
    private $largo;
    private $ancho;
    private $pesoVacio;

    //Método constructor
    public function __construct($anioInstalacion, $largo, $ancho, $pesoVacio)
    {
        $this->anioInstalacion = $anioInstalacion;
        $this->largo = $largo;
        $this->ancho = $ancho;
        $this->pesoVacio = $pesoVacio;
    }

    //Métodos de acceso
    public function getAnioInstalacion(){
        return $this->anioInstalacion;
    }
    public function setAnioInstalacion($anioInstalacion){
        $this->anioInstalacion = $anioInstalacion;
    }

    public function getLargo(){
        return $this->largo;
    }
    public function setLargo($largo){
        $this->largo = $largo;
    }

    public function getAncho(){
        return $this->ancho;
    }
    public function setAncho($ancho){
        $this->ancho = $ancho;
    }

    public function getPesoVacio(){
        return $this->pesoVacio;
    }
    public function setPesoVacio($pesoVacio){
        $this->pesoVacio = $pesoVacio;
    }

    //Método toString
    public function __toString()
    {
        $vagon = "Año de instalación: ".$this->getAnioInstalacion()."\n";
        $vagon .= "Largo: ".$this->getLargo()."\n";
        $vagon .= "Ancho: ".$this->getAncho()."\n";
        $vagon .= "Peso vacío: ".$this->getPesoVacio()."\n";
        return $vagon;
    }
}
?>
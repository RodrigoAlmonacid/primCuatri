<?php
//Clase vagon de pasajeros, 2do simulacro
include_once 'Vagon.php';
class VagonCarga extends Vagon{
    //Hereda atributos de la clase vagon
    //Atributos propios de la clase
    private $pesoMaxCarga;
    private $pesoActualCarga;
    private $pesoVagonCarga;
    private $variableAumento;

    //Método constructor
    public function __construct($anioInstalacion, $largo, $ancho, $pesoVacio, $pesoMaxCarga)
    {
        //Llamo al método constructor de la clase padre
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVacio);
        //inicio los atributos propios
        $this->pesoVagonCarga = $pesoVacio;
        $this->pesoMaxCarga = $pesoMaxCarga;
        $this->pesoActualCarga = 0;
        $this->variableAumento = 20; //20%
    }

    //Métodos de acceso
    public function getPesoMaxCarga(){
        return $this->pesoMaxCarga;
    }
    public function setPesoMaxCarga($maximo){
        $this->pesoMaxCarga = $maximo;
    }

    public function getPesoActualCarga(){
        return $this->pesoActualCarga;
    }
    public function setPesoActualCarga($carga){
        $this->pesoActualCarga = $carga;
    }

    public function getPesoVagonCarga(){
        return $this->pesoVagonCarga;
    }
    public function setPesoVagonCarga($carga){
        $this->pesoVagonCarga = $carga;
    }

    public function getVariableAumento(){
        return $this->variableAumento;
    }
    public function setVariableAumento($variable){
            $this->variableAumento = $variable;
    }

    //Método toString
    public function __toString()
    {
        $vagonCarga = parent::__toString();
        $vagonCarga .= "Peso máximo soportado: ".$this->getPesoMaxCarga()."\n";
        $vagonCarga .= "Peso de carga actual: ".$this->getPesoActualCarga()."\n";
        return $vagonCarga;
    }

    //Método que calcula el peso total del vagon
    public function calcularPesoVagon(){
        $pesoVagon = $this->getPesoVagonCarga();
        //Al peso de la carga debo agregarle un índice del 20%
        $pesoCarga = $this->getPesoActualCarga() * (1 + $this->getVariableAumento()/100);
        $pesoVagon = $pesoVagon + $pesoCarga;
        $this->setPesoVagonCarga($pesoVagon);
        parent::setPesoTotal($pesoVagon);
    }

    /** funcion que incorpora, en caso de ser posible, carga al vagon
     * @param FLOAT $carga
     * @return BOOL
     */
    public function incorporaCarga($carga){
        $incorpora = false;
        $cargaActual = $this->getPesoActualCarga();
        $cargaMaxima = $this->getPesoMaxCarga();
        $nuevaCarga = $cargaActual + $carga;
        if ($nuevaCarga <= $cargaMaxima){
            $incorpora = true;
            $this->setPesoActualCarga($nuevaCarga);
            $this->calcularPesoVagon();
        }
        return $incorpora;
    }
}
?>
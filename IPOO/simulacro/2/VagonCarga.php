<?php
//Clase vagon de pasajeros, 2do simulacro
include_once 'Vagon.php';
class VagonCarga extends Vagon{
    //Hereda atributos de la clase vagon
    //Atributos propios de la clase
    private $pesoMaxCarga;
    private $pesoActualCarga;
    //private $pesoTotal;

    //Método constructor
    public function __construct($anioInstalacion, $largo, $ancho, $pesoVacio, $pesoActualCarga, $pesoMaxCarga)
    {
        //Llamo al método constructor de la clase padre
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVacio);
        //inicio los atributos propios
        $this->pesoActualCarga = $pesoActualCarga;
        $this->pesoMaxCarga = $pesoMaxCarga;
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

    //Método toString
    public function __toString()
    {
        $vagonCarga = parent::__toString();
        $vagonCarga .= "Peso máximo soportado: ".$this->getPesoMaxCarga()."\n";
        $vagonCarga .= "Peso de carga actual: ".$this->getPesoActualCarga()."\n";
        $vagonCarga .= "Peso total del vagon: ".$this->calcularPesoVagon()."\n";
        return $vagonCarga;
    }

    //Método que calcula el peso total del vagon
    public function calcularPesoVagon(){
        $pesoVagon = $this->getPesoVacio();
        //Al peso de la carga debo agregarle un índice del 20%
        $pesoCarga = $this->getPesoActualCarga() * 1.2;
        $pesoVagon = $pesoVagon + $pesoCarga;
        return $pesoVagon;
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
        }
        return $incorpora;
    }
}
?>
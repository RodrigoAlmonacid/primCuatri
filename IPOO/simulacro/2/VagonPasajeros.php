<?php
//Clase vagon de pasajeros, 2do simulacro
include_once 'Vagon.php';
class VagonPasajeros extends Vagon{
    //Hereda atributos de la clase vagon
    //Atributos propios de la clase
    private $cantMaxPasajeros;
    private $cantActualPasajeros;
    private $pesoPromedioPasajeros;
    private $pesoVagonPasajeros;

    //Método constructor
    public function __construct($anioInstalacion, $largo, $ancho, $pesoVacio, $cantMaxPasajeros)
    {
        //Llamo al método constructor de la clase padre
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVacio);
        //inicio los atributos propios
        $this->cantActualPasajeros = 0;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->pesoPromedioPasajeros = 50;
        $this->pesoVagonPasajeros = $pesoVacio;
    }

    //Métodos de acceso
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function setCantMaxPasajeros($maximo){
        $this->cantMaxPasajeros = $maximo;
    }

    public function getCantActualPasajeros(){
        return $this->cantActualPasajeros;
    }
    public function setCantActualPasajeros($pasajeros){
        $this->cantActualPasajeros = $pasajeros;
    }

    public function getPesoPromedioPasajeros(){
        return $this->pesoPromedioPasajeros;
    }
    public function setPesoPromedioPasajeros($promedio){
        $this->pesoPromedioPasajeros = $promedio;
    }

    public function getPesoVagonPasajeros(){
        return $this->pesoVagonPasajeros;
    }
    public function setPesoVagonPasajeros($peso){
        $this->pesoVagonPasajeros = $peso;
    }    

    //Método toString
    public function __toString()
    {
        $vagonPasajeros = parent::__toString();
        $vagonPasajeros .= "Cantidad de pasajeros transportada: ".$this->getCantActualPasajeros()."\n";
        $vagonPasajeros .= "Cantidad máxima posible de pasajeros: ".$this->getCantMaxPasajeros()."\n";
        return $vagonPasajeros;
    }

    //Método que calcula el peso total del vagon
    private function calcularPesoVagon(){
        $pesoVagon = $this->getPesoVagonPasajeros();
        $pesoPasajeros = $this->getCantActualPasajeros() * $this->getPesoPromedioPasajeros();
        $pesoVagon = $pesoVagon + $pesoPasajeros;
        $this->setPesoVagonPasajeros($pesoVagon);
        parent::setPesoTotal($pesoVagon);
    }

    /** funcion que me permite, en caso de ser posible, incorporar pasajeros
     * @param INT $pasajeros
     * @return BOOL
     */
    public function incorporarPasajero($pasajeros){
        $incorpora = false;
        $cantMaxima = $this->getCantMaxPasajeros();
        $cantActual = $this->getCantActualPasajeros();
        $nuevaIncorporacion = $cantActual + $pasajeros;
        if ($nuevaIncorporacion <= $cantMaxima){
            $incorpora = true;
            $this->setCantActualPasajeros($nuevaIncorporacion);
            $this->calcularPesoVagon();
        }
        return $incorpora;
    }
}
?>
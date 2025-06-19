<?php
class Viaje{
    //Atributos
    private $idViaje;
    private $destino;
    private $importe;
    private $cantMaxPasajeros;
    private $cantidadActualPasaj;
    private $objEmpresa;
    private $colPasajeros;

    //metodo constructor
    public function __construct($destino, $importe, $cantMaxPasajeros, $objEmpresa)
    {
        $this->destino=$destino;
        $this->importe=$importe;
        $this->cantMaxPasajeros=$cantMaxPasajeros;
        $this->cantidadActualPasaj=0;
        $this->objEmpresa=$objEmpresa;
        $this->colPasajeros=[];
        $this->idViaje=null;
    }

    //Métodos de acceso
    public function getIdViaje(){
        return $this->idViaje;
    }
    public function setIdViaje($idViaje){
        $this->idViaje=$idViaje;
    }

    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($destino){
        $this->destino=$destino;
    }

    public function getImporte(){
        return $this->importe;
    }
    public function setImporte($importe){
        $this->importe=$importe;
    }

    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros=$cantMaxPasajeros;
    }

    public function getCantidadActualPasaj(){
        return $this->cantidadActualPasaj;
    }
    public function setCantidadActualPasaj($cantidadActualPasaj){
        $this->cantidadActualPasaj=$cantidadActualPasaj;
    }

    public function getObjEmpresa(){
        return $this->objEmpresa;
    }
    public function setObjEmpresa($objEmpresa){
        $this->objEmpresa=$objEmpresa;
    }


    public function getColPasajeros(){
        return $this->colPasajeros;
    }
    public function setColPasajeros($colPasajeros){
        $this->colPasajeros=$colPasajeros;
    }

    //Método toString
    public function __toString()
    {
        $viaje="Identificador de viaje: ID".$this->getIdViaje()."\n";
        $viaje.="Destino: ".$this->getDestino()."\n";
        $viaje.="Importe: $".$this->getImporte()."\n";
        $viaje.="Empresa: ".$this->getObjEmpresa();
        $viaje.="Cantidad de plazas: ".$this->getCantMaxPasajeros()."\n";
        $viaje.="Pasajeros en el viaje: ".$this->getCantidadActualPasaj()."\n";
        $pasajeros=$this->getColPasajeros();
        foreach($pasajeros as $unPasajero){
            $viaje.=$unPasajero;
            $viaje.="----------------------------\n";
        }
        return $viaje;
    }
}
?>
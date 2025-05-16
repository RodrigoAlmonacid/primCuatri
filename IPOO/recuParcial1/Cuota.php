<?php
//Clase cuota, recuperatorio del 1er parcial
class Cuota{
    //Atributos
    private $numero;
    private $montoCuota;
    private $montoInteres;
    private $cancelada;

    //Método constructor
    public function __construct($numero, $montoCuota, $montoInteres)
    {
        $this->numero = $numero;
        $this->montoCuota = $montoCuota;
        $this->montoInteres = $montoInteres;
        $this->cancelada = false;
    }

    //Métodos de acceso
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getMontoCuota(){
        return $this->montoCuota;
    }
    public function setMontoCuota($montoCuota){
        $this->montoCuota = $montoCuota;
    }

    public function getMontoInteres(){
        return $this->montoInteres;
    }
    public function setMontoInteres($montoInteres){
        $this->montoInteres = $montoInteres;
    }

    public function getCancelada(){
        return $this->cancelada;
    }
    public function setCancelada($cancelada){
        $this->cancelada = $cancelada;
    }

    /** método darMontoFinalCuota()  
     * que retorna el importe de la cuota mas los intereses que deben ser aplicados
     * @param FLOAT
    */
    public function darMontoFinalCuota(){
        $capital = $this->getMontoCuota();
        $interes = $this->getMontoInteres(); //Supongo un interes en porcentaje (P. ej: 15, para el 15%)
        $montoFinal = $capital * (1 + $interes/100);
        return $montoFinal;
    }
}
?>
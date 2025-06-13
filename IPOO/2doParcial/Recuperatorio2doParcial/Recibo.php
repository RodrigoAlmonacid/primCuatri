<?php
Class Recibo{
    //variable estatica
    static $numero=0;
    //Atributos
    private $nroRecibo;
    private $valor;
    private $fecha;
    private $hora;
    private $objVehiculo;

    //Metodo constructor
    public function __construct($valor, $fecha, $hora, $objVehiculo)
    {
        self::$numero++;
        $this->nroRecibo=self::$numero;
        $this->valor=$valor;
        $this->fecha=$fecha;
        $this->hora=$hora;
        $this->objVehiculo=$objVehiculo;
    }

    //metodos de acceso
    public function getNroRecibo(){
        return $this->nroRecibo;
    }
    public function setNroRecibo($nroRecibo){
        $this->nroRecibo = $nroRecibo;
    }

    public function getValor(){
        return $this->valor;
    }
    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getHora(){
        return $this->hora;
    }
    public function setHora($hora){
        $this->hora = $hora;
    }

    public function getObjVehiculo(){
        return $this->objVehiculo;
    }
    public function setObjVehiculo($objVehiculo){
        $this->objVehiculo = $objVehiculo;
    }

    //metodo toString
    public function __toString()
    {
        
    }
}
?>
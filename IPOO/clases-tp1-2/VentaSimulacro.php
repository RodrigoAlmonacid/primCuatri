<?php
//Clase venta, simulacro del primer parcial
//include_once "ClienteSimulacro.php";
//include_once "MotoSimulacro.php";
class Venta{
    //Atributos
    private $numero;
    private $fecha;
    private $cliente; //referencia a la clase Cliente
    private $coleccionMotos; //referencia a una coleccion de motos
    private $precioFinal;
    
    //Método constructor
    public function __construct($numero, $fecha = [], Cliente $cliente, Moto $coleccionMotos, $precioFinal)
    {
        $this -> numero = $numero;
        $this -> fecha = $fecha;
        $this -> cliente = $cliente;
        $this -> coleccionMotos = $coleccionMotos;
        $this -> precioFinal = $precioFinal;
    }

    //Métodos de acceso
    public function getNumero(){
        return $this -> numero;
    }
    public function setNumero($numero){
        $this -> numero = $numero;
    }

    public function getFecha(){
        return $this -> fecha;
    }
    public function setFecha($fecha){
        $this -> fecha = $fecha;
    }

    public function getCliente(){
        return $this -> cliente;
    }
    public function setCliente($cliente){
        $this -> cliente = $cliente;
    }

    public function getMoto(){
        return $this -> coleccionMotos;
    }
    public function setMoto($moto){
        $this -> coleccionMotos = $moto;
    }

    public function getPrecioFinal(){
        return $this -> precioFinal;
    }
    public function setPrecioFinal($precioFinal){
        $this -> precioFinal = $precioFinal;
    }
}
?>
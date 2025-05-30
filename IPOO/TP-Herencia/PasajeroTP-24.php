<?php
//clase pasajero del tp entregable del 2024
class Pasajero{
    //Atributos
    private $nombre;
    private $num_asiento;
    private $num_ticket;

    //Método constructor
    public function __construct($nombre, $num_asiento, $num_ticket)
    {
        $this->nombre = $nombre;
        $this->num_asiento = $num_asiento;
        $this->num_ticket = $num_ticket;
    }

    //Métodos de acceso
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNum_asiento(){
        return $this->num_asiento;
    }
    public function setNum_asiento($numero){
        $this->num_asiento = $numero;
    }

    public function getNum_ticket(){
        return $this->num_ticket;
    }
    public function setNum_ticket($ticket){
        $this->num_ticket = $ticket;
    }

    //Método toString
    public function __toString()
    {
        $pasajero = "Nombre: ".$this->getNombre()."\n";
        $pasajero.= "Número de asiento: ".$this->getNum_asiento()."\n";
        $pasajero.= "Número de ticket: ".$this->getNum_ticket()."\n";
        return $pasajero;
    }
}
?>
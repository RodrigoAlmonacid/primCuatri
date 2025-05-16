<?php
class Persona{
    //Atributos
    private $nombre;
    private $apellido;
    private $dni;

    //Método constructor
    public function __construct($nombre, $apellido, $dni)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
    }

    //Métodos de acceso
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }

    //Método toString
    public function __toString()
    {
        $persona = "Nombre: ".$this->getNombre()."\n";
        $persona .= "Apellido: ".$this->getApellido()."\n";
        $persona .= "DNI: ".$this->getDni()."\n";
        return $persona;
    }
}
?>
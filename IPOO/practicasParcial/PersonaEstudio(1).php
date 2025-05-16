<?php
//Clase persona
class Persona{
    //Atributos
    private $nombre;
    private $apellido;
    private $direccion;
    private $mail;
    private $telefono;

    //Método constructor
    public function __construct($nombre, $apellido, $direccion, $mail, $telefono)
    {
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> direccion = $direccion;
        $this -> mail = $mail;
        $this ->telefono = $telefono;
    }

    //Métodos de acceso
    public function getNombre(){
        return $this -> nombre;
    }
    public function setNombre($nombre){
        $this -> nombre = $nombre;
    }

    public function getApellido(){
        return $this -> apellido;
    }
    public function setApellido($apellido){
        $this -> apellido = $apellido;
    }

    public function getDireccion(){
        return $this -> direccion;
    }
    public function setDireccion($direccion){
        $this -> direccion = $direccion;
    }

    public function getMail(){
        return $this -> mail;
    }
    public function setMail($mail){
        $this -> mail = $mail;
    }

    public function getTelefono(){
        return $this -> telefono;
    }
    public function setTelefon($telefono){
        $this -> telefono = $telefono;
    }

    public function __toString()
    {
        $persona = "Nombre: ".$this -> getNombre()."\n";
        $persona .= "Apellido: ".$this -> getApellido()."\n";
        $persona .= "Dirección: ".$this -> getDireccion()."\n";
        $persona .= "Mail: ".$this -> getMail()."\n";
        $persona .= "Teléfono: ".$this -> getTelefono()."\n";
        return $persona;
    }
}
?>
<?php
class Persona{
    //atributos
    private $nombre;
    private $apellido;
    private $direccion;
    private $mail;
    private $telefono;

    public function __construct($nombre, $apellido, $direccion, $mail, $telefono)
    {
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> direccion = $direccion;
        $this -> mail = $mail;
        $this -> telefono = $telefono;
    }

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
    public function setTipoDoc($direccion){
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
    public function setTelefono($telefono){
        $this -> telefono = $telefono;
    }

    public function __toString()
    {
    $persona = "Nombre: ".$this -> getNombre()."\nApellido: ".$this -> getApellido()."\nDirección: ".$this -> getDireccion()."\nMail: ".$this -> getMail()."\nTeléfono: ".$this -> getTelefono()."\n";
    return $persona;
    }
}
?>
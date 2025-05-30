<?php
//Clase cliente, recuperatorio del 1er parcial
class Cliente{
    //Atributos
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $mail;
    private $telefono;
    private $haberes;

    //Método constructor
    public function __construct($nombre, $apellido, $dni, $direccion, $mail, $telefono, $haberes)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
        $this->haberes = $haberes;
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

    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getMail(){
        return $this->mail;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }

    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefon($telefono){
        $this->telefono = $telefono;
    }

    public function getHaberes(){
        return $this->haberes;
    }
    public function setHaberes($haberes){
        $this->haberes = $haberes;
    }

    public function __toString()
    {
        $persona = "Nombre: ".$this->getNombre()."\n";
        $persona .= "Apellido: ".$this->getApellido()."\n";
        $persona .= "DNI N°: ".$this->getDni()."\n";
        $persona .= "Dirección: ".$this->getDireccion()."\n";
        $persona .= "Mail: ".$this->getMail()."\n";
        $persona .= "Teléfono: ".$this->getTelefono()."\n";
        $persona .= "Importe neto recibido en haberes: $ ".$this->getHaberes()."\n";
        return $persona;
    }
}
?>
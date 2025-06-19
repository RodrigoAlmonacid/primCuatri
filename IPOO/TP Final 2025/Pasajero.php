<?php
class Pasajero extends Persona{
    //Atributos propios
    private $telefono;

    //Método constructor
    public function __construct($nombre, $apellido, $dni, $telefono)
    {
        //llamo al constructor de la clase padre
        parent::__construct($nombre, $apellido, $dni);
        //Inicio la variable instancia propia de la clase
        $this->telefono=$telefono;
    }

    //Método de acceso
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($tel){
        $this->telefono=$tel;
    }

    //Método toString
    public function __toString()
    {
        //Llamo al toString de la clase padre
        $pasajero=parent::__toString();
        //agrego el atributo propio
        $pasajero.="Teléfono de contacto: ".$this->getTelefono()."\n";
        return $pasajero;
    }
}
?>
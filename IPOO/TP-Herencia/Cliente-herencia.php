<?php
include_once 'Persona-herencia.php';
class Cliente extends Persona{
    //Atributos
    private $numCliente;
    //Hereda Nombre, Apellido y DNI de Persona
    //Método constructor
    public function __construct($nombre, $apellido, $dni, $numCliente)
    {
        //Método constructor de Persona
        parent::__construct($nombre, $apellido, $dni);
        //Atributo de Cliente
        $this->numCliente = $numCliente;
    }

    //Métodos de acceso
    public function getNumCliente(){
        return $this->numCliente;
    }
    public function setNumCliente($numCliente){
        $this->numCliente = $numCliente;
    }

    //Método toString
    public function __toString()
    {
        //Llamo al método toString de la clase padre
        $cliente = parent::__toString();
        //Concateno con el nuevo atributo
        $cliente .= "Número de Cliente: ".$this->getNumCliente()."\n";
        return $cliente;
    }
}
?>
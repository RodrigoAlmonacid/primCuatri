<?php
include_once 'BaseDatos.php';
class Persona{
    //Atributos
    private $nombre;
    private $apellido;
    private $dni;

    //Método constructor
    public function __construct($nombre, $apellido, $dni)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->dni=$dni;
    }

    //Métodos de acceso
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }

    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni=$dni;
    }

    //Método toString
    public function __toString()
    {
        $persona="Apellido y nombre: ".$this->getApellido().", ".$this->getNombre()."\n";
        $persona.="DNI N°: ".$this->getDni()."\n";
        return $persona;
    }

    /** funcion para buscar una persona en la base de datos (tabla persona)
     * 'dni' es la clave primaria en la tabla
     * @param int $dni
     * @return array
     */
    public function buscar($dni){
        $base=new BaseDatos();
        $consulta='SELECT * FROM persona WHERE dni='.$dni;
        if($base->iniciar()){
            
        }
    }
}
?>
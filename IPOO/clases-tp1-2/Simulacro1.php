<?php 
//Simulacro de primer parcial a entregar viernes 11 antes de clase

class Cliente{
    //Defino atributos como privados
    private $nombre;
    private $apellido;
    private $activo; //si está o no el cliente dado de baja (V o F)
    private $tipoDoc;
    private $documento;

    //Método constructor
    public function __construct($nombre, $apellido, $activo, $tipoDoc, $documento)
    {
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> activo = $activo;
        $this -> tipoDoc = $tipoDoc;
        $this -> documento = $documento;
    }

    //Métodos de acceso (get y set) de cada variable instancia
    public function getNombre(){
        return $this -> nombre;
    }
    public function setNombre($nombre){
        $this -> nombre = $nombre;
    }

    public function 
}
?>
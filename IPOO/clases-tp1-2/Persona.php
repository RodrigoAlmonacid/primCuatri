<?php
//Ejericio 1, tp2: Clase persona

class Persona{
    //atributos
    private $nombre;
    private $apellido;
    private $tipoDoc;
    private $documento;

    public function __construct($nombre, $apellido, $tipoDoc, $documento)
    {
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> tipoDoc = $tipoDoc;
        $this -> documento = $documento;
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

    public function getTipoDoc(){
        return $this -> tipoDoc;
    }
    public function setTipoDoc($tipoDoc){
        $this -> tipoDoc = $tipoDoc;
    }

    public function getDocumento(){
        return $this -> documento;
    }
    public function setDocumento($documento){
        $this -> documento = $documento;
    }

    public function __toString()
    {
        $persona = "Nombre: ".$this -> getNombre()."\nApellido: ".$this -> getApellido()."\n".$this -> getTipoDoc()." N°: ".$this -> getDocumento()."\n";
        return $persona;
    }
}
?>
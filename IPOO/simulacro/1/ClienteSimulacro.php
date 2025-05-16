<?php 
//Clase cliente, simulacro de primer parcial

class Cliente{
    //Defino atributos como privados
    private $nombre;
    private $apellido;
    private $activo; //si el cliente está activo o dado de baja 
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

    public function getApellido(){
        return $this -> apellido;
    }
    public function setApellido($apellido){
        $this -> apellido = $apellido;
    }

    public function getActivo(){
        return $this -> activo;
    }
    public function setActivo($activo){
        $this -> activo = $activo;
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
        $cliente = "Cliente: ".$this -> getNombre().", ".$this -> getApellido()."\n".$this -> getTipoDoc()." Nº ".$this -> getDocumento();
        if ($this -> getActivo()){
            $cliente = $cliente."\nEl cliente se encuentra activo en nuestros registros.\n";
        }
        else{
            $cliente = $cliente."\nEl cliente se encuentra dado de baja en nuestros registros.\n";
        }
        return $cliente;
    }
}
?>
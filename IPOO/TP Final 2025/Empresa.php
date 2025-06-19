<?php
class Empresa{
    //Atributos
    private $idEmpresa;
    private $nombre;
    private $direccion;

    //Método constructor
    public function __construct($nombre, $direccion)
    {
        $this->idEmpresa=null;
        $this->nombre=$nombre;
        $this->direccion=$direccion;
    }

    //Métodos de acceso
    public function getIdEmpresa(){
        return $this->idEmpresa;
    }
    public function setIdEmpresa($idEmpresa){
        $this->idEmpresa=$idEmpresa;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }

    //Método toString
    public function __toString()
    {
        $empresa="Código de empresa: ".$this->getIdEmpresa()."\n";
        $empresa.="Nombre: ".$this->getNombre()."\n";
        $empresa.="Direccion: ".$this->getDireccion()."\n";
        return $empresa;
    }
}
?>
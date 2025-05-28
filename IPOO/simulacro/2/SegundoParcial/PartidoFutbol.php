<?php
//Clase prtido de fútbol
include_once 'Partido.php';
class PartidoFutbol extends Partido{
    //atributos propios de la clase
    private $objCategoria;

    //Método constructor
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $objCategoria)
    {
        //Llamo al constructor de la clase padre
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->objCategoria=$objCategoria;
    }

    //Métodos de acceso
    public function getObjCategoria(){
        return $this->objCategoria;
    }
    public function setObjCategoria($categoria){
        $this->objCategoria=$categoria;
    }

    //Método toString
    public function __toString()
    {
        $partFutbol = parent::__toString();
        $partFutbol .= "Categoría: ".$this->getObjCategoria();
        return $partFutbol;
    }
}
?>
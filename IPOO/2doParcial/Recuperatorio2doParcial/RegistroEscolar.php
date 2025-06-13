<?php
Class RegistroEscolar extends RegistroVehiculo{
    //Atributos propios
    private $cantAsientos;

    //Metodo constructor
    public function __construct($patente, $cantAsientos)
    {
        //Inicio el constructor de la clase padre
        parent::__construct($patente);
        $this->cantAsientos=$cantAsientos;
    }

    //metodos de acceso
    public function getCantAsientos(){
        return $this->cantAsientos;
    }
    public function setCantAsientos($cantAsientos){
        $this->cantAsientos = $cantAsientos;
    }


    //metodo toString
    public function __toString()
    {
        $escolar= parent::__toString();
        $escolar.="Cantidad de Asientos: ".$this->getCantAsientos()."\n";
        return $escolar;
    }
}
?>
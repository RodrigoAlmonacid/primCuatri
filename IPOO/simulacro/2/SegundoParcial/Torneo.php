<?php
class Torneo{
    //Atributos
    private $importe;
    private $colPartidos;

    //método constructor
    public function __construct($importe)
    {
        $this->importe = $importe;
        $this->colPartidos = [];
    }

    //Metodos de acceso
    public function getImporte(){
        return $this->importe;
    }
    public function setImporte($importe){
        $this->importe=$importe;
    }

    public function getColPartidos(){
        return $this->colPartidos;
    }
    public function setColPartidos($partidos){
        $this->colPartidos=$partidos;
    }

    //Método toString
    public function __toString()
    {
        $torneo = "Premio por torneo: $".$this->getImporte()."\n";
        $partidosIngresados = $this->getColPartidos();
        if(count($partidosIngresados)>0){
            foreach($partidosIngresados as $partido){
                $torneo .= $partido;
            }
        }
        else{
            $torneo .= "No se hay ingresado partidos.\n";
        }
        return $torneo;
    }
}
?>
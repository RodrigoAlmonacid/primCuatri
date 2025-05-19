<?php
//Clase locomotora, 2do simulacro
class Locomotora{
    //Atributos
    private $peso;
    private $velMax;

    //Método costructor
    public function __construct($peso, $velMax)
    {
        $this->peso = $peso;
        $this->velMax = $velMax;
    }

    //Métodos de acceso
    public function getPeso(){
        return $this->peso;
    }
    public function setPeso($peso){
        $this->peso = $peso;
    }

    public function getVelMaxima(){
        return $this->velMax;
    }
    public function setVelMaxima($velMax){
        $this->velMax = $velMax;
    }

    //Método toString
    public function __toString()
    {
        $locomotora = "Peso: ".$this->getPeso()."\n";
        $locomotora .= "Velocidad máxima: ".$this->getVelMaxima();"\n";
        return $locomotora;
    }
}
?>
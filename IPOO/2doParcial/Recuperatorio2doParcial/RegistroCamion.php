<?php
include_once 'RegistroVehiculo.php';
Class RegistroCamion extends RegistroVehiculo{
    //Atributos propios
    private $peso;
    private $cantEjes;

    //Metodo constructor
    public function __construct($patente, $peso, $cantEjes)
    {
        //Inicio el constructor de la clase padre
        parent::__construct($patente);
        $this->cantEjes=$cantEjes;
        $this->peso=$peso;
    }

    //metodos de acceso
    public function getPeso(){
        return $this->peso;
    }
    public function setPeso($peso){
        $this->peso = $peso;
    }

    public function getCantEjes(){
        return $this->cantEjes;
    }
    public function setCantEjes($cantEjes){
        $this->cantEjes = $cantEjes;
    }

    //Método Valor peaje
    public function valorPeaje(){
        $valorBase=parent::valorPeaje();
        $peso = $this->getPeso()/1000; //Asumo que el peso está en kg, lo divido para pasarlo a TN
        $valorCamion = $valorBase + 100*$peso;
        //Asumo que el peso es un valor positivo
        if($peso<5){
            $valorCamion = $valorCamion*1.02; //Aumento un 2%
        }
        else{
            $valorCamion = $valorCamion*1.05; //Aumento un 5%
        }
        return $valorCamion;
    }

    //metodo toString
    public function __toString()
    {
        $camion= parent::__toString();
        $camion.="Peso: ".$this->getPeso()."\n";
        $camion.="Cantidad de ejes: ".$this->getCantEjes()."\n";
        return $camion;
    }
}
?>
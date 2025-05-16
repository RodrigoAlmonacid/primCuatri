<?php
/*Diseñar e implementar la clase Reloj que simule el comportamiento de un cronómetro digital
(con los comportamientos: puesta_a_cero, incremento, etc.). Cuando el contador llegue a 23:59:59 y
reciba el mensaje de incremento deberá pasar a 00:00:00.*/

class Reloj {
    //Variables instancia
    //Int $horas, $minutos, $segundos
    private $horas;
    private $minutos;
    private $segundos;

    //Métodos
    public function __construct($hora, $minuto, $segundo)
    {
        if (is_numeric($hora) && is_numeric($minuto) && is_numeric($segundo) && ($hora >= 0 && $hora < 24) && ($minuto >= 0 && $minuto < 60) && ($segundo >= 0 && $segundo < 60)){
        $this -> horas = $hora;
        $this -> minutos = $minuto;
        $this -> segundos = $segundo;
        }
        else
            throw new ErrorException("Verifique que los valores ingresados sean numéricos, que las horas estén entre 0 y 24, y los minutos y segundos entre 0 y 60.");
    }

    public function getHoras () {
        return $this -> horas;
    }
    public function getMinutos () {
        return $this -> minutos;
    }
    public function getSegundos () {
        return $this -> segundos;
    }

    public function setHoras ($hora) {
        $this -> horas = $hora;
    }
    public function setMinutos ($minuto){
        $this -> minutos = $minuto;
    }
    public function setSegundos ($segundo){
        $this -> segundos = $segundo;
    }

    public function puesta_a_cero (){
        $this -> setHoras(0);
        $this -> setMinutos(0);
        $this -> setHoras(0);
    }

    public function incremento (){
        do {           
            if ($this->getSegundos() < 59){
                $this -> setSegundos($this -> getSegundos() + 1);
            }
            else {            
                $this -> setSegundos(0);
                if ($this -> getMinutos() < 59){
                    $this -> setMinutos($this -> getMinutos() + 1);
                }
                else {
                    $this -> setMinutos(0);
                    if ($this -> getHoras() < 23){
                        $this -> setHoras($this -> getHoras() + 1);                    
                    }
                    else {
                        $this -> puesta_a_cero();
                    }
                }
            }
            //echo $this -> __toString();
        } while (!($this->getHoras() === 0 && $this->getMinutos() === 0 && $this->getSegundos() === 0));  
    }

    public function __toString(){
		return "(".$this->getHoras()." hs:".$this->getMinutos()." min:".$this->getSegundos()." seg)\n";
	}
}
?>


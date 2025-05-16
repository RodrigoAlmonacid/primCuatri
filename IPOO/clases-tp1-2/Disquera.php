<?php
//Ejercicio 2 del tp2

class Disquera{
    //Atributos
    private $hora_desde; //Horario de apertura
    private $hora_hasta; //Horario de cierre
    private $estado; //Abierta o cerrada
    private $direccion; 
    private $dueno;

    public function __construct($horaApert = [], $horaCierre = [], $estado, $direccion, $dueno)
    {
        $this -> hora_desde = $horaApert;
        $this -> hora_hasta = $horaCierre;
        $this -> estado = $estado;
        $this -> direccion = $direccion;
        $this -> dueno = $dueno;
    }

    public function getHoraApert(){
        return $this -> hora_desde;
    }
    public function setHoraApert($hora, $minuto){
        $this -> hora_desde = [$hora, $minuto];
    }

    public function getHoraCierre(){
        return $this -> hora_hasta;
    }
    public function setHoraCierr($hora, $minuto){
        $this -> hora_hasta = [$hora, $minuto];
    }

    public function getEstado(){
        return $this -> estado;
    }
    public function setEstado($estado){
        $this -> estado = $estado;
    }

    public function getDireccion(){
        return $this -> direccion;
    }
    public function setDireccion($direccion){
        $this -> direccion = $direccion;
    }

    public function getDueno(){
        return $this -> dueno;
    }
    public function setDueno($dueno){
        $this -> dueno = $dueno;
    }

    /** funcion que determina si la tienda se encuentra abierta o no a partir de un horario dado
     * @param int $hora
     * @param int $minuto
     * @return boolean
     */
    public function dentroHoraAtencion($hora, $minuto){
        $abierta = false;
        if ($hora > $this -> getHoraApert()[0] && $hora < $this -> getHoraCierre()[0]){
            $abierta = true;
        }
        elseif ($hora == $this -> getHoraApert()[0] || $hora == $this -> getHoraCierre()[0]){
            if($minuto >= $this -> getHoraApert()[1] && $minuto <= $this -> getHoraCierre()[1]){
                $abierta = true;
            }
        }
        return $abierta;
    }

    /** funcion que cambia el estado de la disquera a partir de un horario dado
     * @param int $hora
     * @param int $minuto
     */
    public function abrirDisquera($hora, $minuto){
        if($this -> dentroHoraAtencion($hora, $minuto)){
            $this -> setEstado("Abierta");
        }
        else {
            $this -> setEstado("Cerrada");
        }
    }

    public function __toString()
    {
        $disquera = "Horario de apertura: ".$this -> getHoraApert()[0].":".$this -> getHoraApert()[1]."\nHorario de cierre: ".$this -> getHoraCierre()[0].":".$this -> getHoraCierre()[1]."\nEstado: ".$this -> getEstado()."\nDirección: ".$this -> getDireccion()."\nDueño:\n".$this -> getDueno()."\n";
        return $disquera;
    }    
}
?>
<?php
class Vuelo{
    //Atributos
    private $numero;
    private $importe;
    private $fecha;
    private $destino;
    private $horaArribo;
    private $horaPartida;
    private $cantAsientosTotales;
    private $cantAsientosDisp;
    private $objPersona; //Referencia a la clase Persona

    //Método constructor
    public function __construct($numero, $importe, $fecha, $destino, $horaArribo, $horaPartida, $cantAsientosTotales, $cantAsientosDisp, Persona $objPersona)
    {
        $this -> numero = $numero;
        $this -> importe = $importe;
        $this -> fecha = $fecha;
        $this -> destino = $destino;
        $this -> horaArribo = $horaArribo;
        $this -> horaPartida = $horaPartida;
        $this -> cantAsientosTotales = $cantAsientosTotales;
        $this -> cantAsientosDisp = $cantAsientosDisp;
        $this -> objPersona = $objPersona;
    }

    //Métodos de acceso
    public function getNumero(){
        return $this -> numero;
    }
    public function setNumero($numero){
        $this -> numero = $numero;
    }

    public function getImporte(){
        return $this -> importe;
    }
    public function setImporte($importe){
        $this -> importe = $importe;
    }

    public function getFecha(){
        return $this -> fecha;
    }
    public function setFecha($fecha){
        $this -> fecha = $fecha;
    }

    public function getDestino(){
        return $this -> destino;
    }
    public function setDestino($destino){
        $this -> destino = $destino;
    }

    public function getHoraArribo(){
        return $this -> horaArribo;
    }
    public function setHoraArribo($horaArribo){
        $this -> horaArribo = $horaArribo;
    }
    
    public function getHoraPartida(){
        return $this -> horaPartida;
    }
    public function setHoraPartida($horaPartida){
        $this -> horaPartida = $horaPartida;
    }

    public function getCantAsientosTotales(){
        return $this -> cantAsientosTotales;
    }
    public function setCantAsientosTotales($cantAsientosTotales){
        $this -> cantAsientosTotales = $cantAsientosTotales;
    }

    public function getCantAsientosDisp(){
        return $this -> cantAsientosDisp;
    }
    public function setCantAsientosDisp($cantAsientosDisp){
        $this -> cantAsientosDisp = $cantAsientosDisp;
    }

    public function getObjPersona(){
        return $this -> objPersona;
    }
    public function setObjPersona($objPersona){
        $this -> objPersona = $objPersona;
    }

    /** funcion para asignar asientos
     * @param int $asientos
     * @return bool
     */
    public function asignarAsientosDisp($asientos){
        $asignacion = false;
        $asientosDisponibles = $this -> getCantAsientosDisp();
        if($asientos <= $asientosDisponibles){
            $asignacion = true;
            $asientosDisponibles = $asientosDisponibles - $asientos;
            $this -> setCantAsientosDisp($asientosDisponibles);
        }
        return $asignacion;
    }

    //Método toString
    public function __toString()
    {
        $vuelo = "Vuelo N°: ".$this -> getNumero()."\n";
        $vuelo .= "Importe: $ ".$this -> getImporte()."\n";
        $vuelo .= "Fecha: ".$this -> getFecha()."\n";
        $vuelo .= "Destino : ".$this -> getDestino()."\n";
        $vuelo .= "Horario de partida: ".$this -> getHoraPartida()."\n";
        $vuelo .= "Horario de arribo: ".$this -> getHoraArribo()."\n";
        $vuelo .= "Cantidad de asientos totales: ".$this -> getCantAsientosTotales()."\n";
        $vuelo .= "Cantidad de asientos disponibles: ".$this -> getCantAsientosDisp()."\n";
        $vuelo .= "Persona responsable: ".$this -> getObjPersona()."\n";
        return $vuelo;
    }
}
?>
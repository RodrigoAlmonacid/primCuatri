<?php
class Vuelo{
    //atributos
    private $numero;
    private $importe;
    private $fecha;
    private $destino;
    private $horaArribo;
    private $horaPartida;
    private $cantAsientos;
    private $cantAsientosDisponibles;
    private $objPersona;

    //metodo constructor
    public function __construct($numero, $importe, $fecha, $destino, $horaArribo, $horaPartida, $cantAsientos, $cantAsientosDisponibles, Persona $objPersona){
        $this -> numero = $numero;
        $this -> importe = $importe;
        $this -> fecha = $fecha;
        $this -> destino = $destino;
        $this -> horaArribo = $horaArribo;
        $this -> horaPartida = $horaPartida;
        $this -> cantAsientos = $cantAsientos;
        $this -> cantAsientosDisponibles = $cantAsientosDisponibles;
        $this -> objPersona = $objPersona;
    }

    //metodos de acceso
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

    public function getCantAsientos(){
        return $this -> cantAsientos;
    }
    public function setCantAsientos($cantAsientos){
        $this -> cantAsientos = $cantAsientos;
    }

    public function getCantAsientosDisponibles(){
        return $this -> cantAsientosDisponibles;
    }
    public function setCantAsientosDisponibles($cantAsientosDisponibles){
        $this -> cantAsientosDisponibles = $cantAsientosDisponibles;
    }

    public function getObjPersona(){
        return $this -> objPersona;
    }
    public function setObjPersona($objPersona){
        $this -> objPersona = $objPersona;
    }

    /** función que dada una cantiad de asientos chequea si existe esa cantidad disponible
     * en caso de existir setea la cantidad disponible restando los asientos asignados
     * @param int $cant_pasajeros
     * @return bool
     */
    public function asignarAsientosDisponibles($cant_pasajeros){
        $respuesta = false;
        $cant_disp = $this -> getCantAsientosDisponibles();
        if ($cant_pasajeros <= $cant_disp){
             $respuesta = true;
             $cant_disp = $cant_disp - $cant_pasajeros;
             $this -> setCantAsientosDisponibles($cant_disp);
        }
        return $respuesta;
   }
}
?>
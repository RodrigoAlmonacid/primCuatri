<?php
//Clase Pasajero vip, hija de Pasajero
class PasajeroVip extends Pasajero{
    //Atrubutos propios de la clase
    private $viajero_frecuente;
    private $cant_millas;

    //Método constructor
    public function __construct($viajero_frecuente, $cant_millas, $nombre, $num_asiento, $num_ticket)
    {
        //creo las variables instancia de la clase padre
        parent::__construct($nombre, $num_asiento, $num_ticket);
    }
}
?>
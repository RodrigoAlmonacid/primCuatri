<?php
class Aerolinea{
    //atributos
    private $identificacion;
    private $nombre;
    private $coleccionVuelos;

    //metodo costructor
    public function __construct($identificacion, $nombre, $coleccionVuelos)
    {
        $this -> identificacion = $identificacion;
        $this -> nombre = $nombre;
        $this -> coleccionVuelos = $coleccionVuelos;
    }

    //metodos de acceso
    public function getIdentificacion(){
        return $this -> identificacion;
    }
    public function setIdentificacion($id){
        $this -> identificacion = $id;
    }

    public function getNombre(){
        return $this -> nombre;
    }
    public function setNombre($nombre){
        $this -> nombre = $nombre;
    }

    public function getColeccionVuelos(){
        return $this -> coleccionVuelos;
    }
    public function setColeccionVuelos($vuelo){
        $this -> coleccionVuelos = $vuelo;
    }

    /** funcion que recibe un vuelo, chequa que no exista uno con igual destino,
     * en la misma fecha y con el mismo horario de partida
     */
    public function incorporaVuelo($vuelo){
    $incorpora = false;
    $coleccion = $this -> getColeccionVuelos();
    $destinoVuelo = $vuelo -> getDestino();
    $fechaVuelo = $vuelo -> getFecha();
    $horarioVuelo = $vuelo -> getHoraPartida();
        foreach($coleccion as $objVuelo){
            $destinoObjVuelo = $objVuelo -> getDestino();
            $fechaObjVuelo = $objVuelo -> getFecha();
            $horarioObjVuelo = $objVuelo -> getHoraPartida();
            if($destinoVuelo <> $destinoObjVuelo && $fechaVuelo <> $fechaObjVuelo && $horarioVuelo <> $horarioObjVuelo){
                $incorpora = true;
                array_push($coleccion, $objVuelo);
                $this -> setColeccionVuelos($coleccion);
            }
        }
    return $incorpora;
    }
}
?>
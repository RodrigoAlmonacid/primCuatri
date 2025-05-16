<?php
class Aerolinea{
    //Atributos
    private $identificacion;
    private $nombre;
    private $coleccionVuelos;

    //Método constructor
    public function __construct($identificacion, $nombre, $coleccionVuelos)
    {
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->coleccionVuelos = $coleccionVuelos;
    }

    //Métodos de acceso
    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getColeccionVuelos(){
        return $this->coleccionVuelos;
    }
    public function setColeccionVuelos($vuelo){
        $this->coleccionVuelos = $vuelo;
    }

    //Método toString

    /** funcion que devuelve una coleccion con vuelos disponibles a un destino dado
     * y, al menos, una cantidad de asientos disponibles determinada
     * @param string $destino
     * @param int $asientos
     * @return array //devolverá un arreglo vacío en caso de no haber coincidencias
     */
    public function darVueloADestino($destino, $asientos){
        $resultado = [];
        $listado = $this->getColeccionVuelos();
        foreach($listado as $vuelo){
            $destinoVuelo = $vuelo->getDestino();
            $cantAsientosDisponibles = $vuelo->getCantAsientosDisp();
            if($destino == $destinoVuelo && $asientos <= $cantAsientosDisponibles){
                array_push($resultado, $vuelo);
            }
        }
        return $resultado;
    }

    /** funcion que me permite incorporar un vuelo en caso que no exista uno igual en la coleccion
     * la funcion retornará verdadero o falso, dependiendo de si incorporó o no el vuelo a la colección
     * @param Vuelo $objVuelo
     * @return bool
     */
    public function incorporaVuelo($objVuelo){
        $nuevoDestino = $objVuelo->getDestino();
        $nuevaFecha = $objVuelo->getFecha();
        $nuevoHorario = $objVuelo->getHoraPartida();
        $coleccion = $this->getColeccionVuelos();
        $j = count($coleccion);
        $i = 0;
        $encuentra = false;
        $incorpora = false;
        do{
            $destino = $coleccion[$i]->getDestino();
            $fecha = $coleccion[$i]->getFecha();
            $horario = $coleccion[$i]->getHoraPartida();
            if($destino == $nuevoDestino && $fecha == $nuevaFecha && $horario == $nuevoHorario){
                $encuentra = true;
            }
            $i++;
        }while($i<$j && !$encuentra);
        if(!$encuentra){
            $incorpora = true;
            array_push($coleccion, $objVuelo);
            $this->setColeccionVuelos($coleccion);
        }
        return $incorpora;
    }

    /** funcion para vender asientos a un destino y fecha determinada
     * @param STRING $destino
     * @param INT $asientos
     * @param INT $fecha
     * @return BOOL 
     */
    public function venderVueloADestino($destino, $asientos, $fecha){
        $venta = null;
        $coleccion = $this->getColeccionVuelos();
        $j = count($coleccion);
        $i = 0;
        do{
            $verDestino = $coleccion[$i]->getDestino();
            $verFecha = $coleccion[$i]->getFecha();
            if($verDestino == $destino && $verFecha == $fecha){
                $asigna = $coleccion[$i]->asignarAsientosDisp($asientos);
                if($asigna){
                    $venta = true;
                }
            }
            $i++;
        }while($i<$j && !$venta);
        return $venta;
    }

    /** funcion que calcula el promedio recaudado por la aerolinea
     * @return FLOAT
     */
    public function montoPromedioRecaudado(){
        $coleccion = $this->getColeccionVuelos();
        $vuelos = count($coleccion);
        $promedio = 0;
        if($vuelos > 0){
            foreach($coleccion as $unVuelo){
                $asientosVendidos = $unVuelo->getCantAsientosTotales() - $unVuelo->getCantAsientosDisp();
                $valorBruto = $unVuelo->getImporte() * $asientosVendidos;
                $promedio = $promedio + $valorBruto;
            }
            $promedio = $promedio / $vuelos;
        }
        return $promedio;
    }
}
?>
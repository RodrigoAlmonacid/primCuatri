<?php
include_once 'Locomotora.php';
include_once 'Vagon.php';
//Clase formacion, 2do simulacro
class Formacion{
    //Atributos
    private $objLocomotora;
    private $colVagones; //coleccion de $objVagon
    private $maxVagones;

    //Método constructor
    public function __construct($maxVagones, Locomotora $objLocomotora)
    {
        $this->maxVagones = $maxVagones;
        $this->objLocomotora = $objLocomotora;
        $this->colVagones = [];
    }

    //Métodos de acceso
    public function getMaxVagones(){
        return $this->maxVagones;
    }
    public function setMaxVagones($maximo){
        $this->maxVagones = $maximo;
    }

    public function getObjLocomotora(){
        return $this->objLocomotora;
    }
    public function setObjLocomotora($locomotora){
        $this->objLocomotora = $locomotora;
    }

    public function getColVagones(){
        return $this->colVagones;
    }
    public function setColVagones($vagones){
        $this->colVagones = $vagones;
    }

    //Método toString
    public function __toString()
    {
        $formacion = "Datos de Formación:\n";
        $formacion .= "Datos de locomotora: ".$this->getObjLocomotora()."\n";
        $formacion .= "Cantidad máxima de vagones: ".$this->getMaxVagones()."\n";
        $arrayVagonones = $this->getColVagones();
        $cantVagones = count($arrayVagonones);
        if($cantVagones>0){
            foreach($arrayVagonones as $vagon){
                $formacion .= $vagon;
            }
        }
        else{
            $formacion .= "Esta formación no cuenta con vagones\n";
        }
        return $formacion;
    }

    //Método para incorporar pasajeros a la formación
    public function incorporarPasajeroFormacion($pasajeros){
        $incorpora = false;
        $vagonesFormacion = $this->getColVagones();
        $i = 0;
        $cantidadVagones = count($vagonesFormacion);
        if($cantidadVagones>0){
            do{
                if(get_class($vagonesFormacion[$i]) === 'VagonPasajeros'){
                    $incorpora = $vagonesFormacion[$i]->incorporarPasajero($pasajeros);
                    //incorporarPasajero($carga) me actualiza la variable de corte y actualiza los datos del vagon en la coleccion
                }
                $i++;
            }while($i<$cantidadVagones && !$incorpora);
        }
        return $incorpora;
    }

    //Método para incorporar carga a la formación
    public function incorporarCargaFormacion($carga){
        $incorpora = false;
        $vagonesFormacion = $this->getColVagones();
        $i = 0;
        $cantidadVagones = count($vagonesFormacion);
        if($cantidadVagones>0){
            do{
                if(get_class($vagonesFormacion[$i]) === 'VagonCarga'){
                    $incorpora = $vagonesFormacion[$i]->incorporarCarga($carga);
                    //incorporarCarga($carga) me actualiza la variable de corte y actualiza los datos del vagon en la coleccion
                }
                $i++;
            }while($i<$cantidadVagones && !$incorpora);
        }
        return $incorpora;
    }

    //Método para incorporar un vagón a la formación
    public function incorporaVagonFormacion($objVagon){
        $incorpora = false;
        $vagonesFormacion = $this->getColVagones();
        $nuevaCantidadVagones = count($vagonesFormacion) + 1;
        $maximo = $this->getMaxVagones();
        if($nuevaCantidadVagones <= $maximo){
            $incorpora = true;
            array_push($vagonesFormacion, $objVagon);
            $this->setColVagones($vagonesFormacion);
        }
        return $incorpora;
    }

    //Metodo que calcula el promedio de pasajeros en la formación
    public function promedioPasajeroFormacion(){
        $vagonesFormacion = $this->getColVagones();
        $cantidadVagones = count($vagonesFormacion);
        $vagonesPasajeros = 0;
        $pasajerosFormacion = 0;
        $promedioPasajeros = 0;
        if($cantidadVagones>0){
            foreach($vagonesFormacion as $objVagon){
                if(get_class($objVagon) === 'VagonPasajeros'){
                    $vagonesPasajeros++;
                    $pasajerosVagon = $objVagon->getCantActualPasajeros();
                    $pasajerosFormacion = $pasajerosFormacion + $pasajerosVagon;
                }
            }
        }
        if($vagonesPasajeros>0){
            $promedioPasajeros = $pasajerosFormacion / $vagonesPasajeros;
        }
        return $promedioPasajeros;
    }

    //Método para calcular el peso de la formacion
    public function pesoFormacion(){
        $objLocomotora = $this->getObjLocomotora();
        $pesoLocomotora = $objLocomotora->getPeso();
        $colVagones = $this->getColVagones();
        $cantVagones = count($colVagones);
        $pesoTotal = 0;
        if($cantVagones>0){
            foreach($colVagones as $unVagon){
                $pesoVagon = $unVagon->getPesoTotal();
                $pesoTotal = $pesoTotal + $pesoVagon;
            }
        }
        $pesoTotal = $pesoTotal + $pesoLocomotora;
        return $pesoTotal;
    }

    //Método que retorna el primer vagón sin completar, en caso que todos los vagones estén completos returna falso
    public function retornarVagonSinCompletar(){
        $vagonCompleto = false;
        $vagonesFormacion = $this->getColVagones();
        $cantidadVagones = count($vagonesFormacion);
        $i=0;
        if($cantidadVagones>0){
            do{
                $vagonPasajeros = get_class($vagonesFormacion[$i]) === 'VagonPasajeros.php';
                if($vagonPasajeros){
                    $pasajeros = $vagonesFormacion[$i]->getCantActualPasajeros();
                    $maximo = $vagonesFormacion[$i]->getCantMaxPasajeros();
                    $disponible = $maximo - $pasajeros;
                    if($disponible>0){
                        $vagonCompleto = true;
                    }
                }
                $i++; 
            }while($i<$cantidadVagones && !$vagonCompleto);
            if($vagonCompleto){
                $vagonCompleto = $i;
            }
        }
        return $vagonCompleto;
    }
    
}
?>
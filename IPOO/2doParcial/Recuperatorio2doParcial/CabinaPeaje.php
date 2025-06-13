<?php
Class CabinaPeaje{
    //Atributos
    private $colRecibos;
    private $colRegistros;
    
    //Metodo constructor
    public function __construct()
    {
        $this->colRecibos=[];
        $this->colRegistros=[];
    }

    //metodos de acceso
    public function getColRecibos(){
        return $this->colRecibos;
    }
    public function setColRecibos($colRecibos){
        $this->colRecibos = $colRecibos;
    }

    public function getColRegistros(){
        return $this->colRegistros;
    }
    public function setColRegistros($colRegistros){
        $this->colRegistros = $colRegistros;
    }

    //metodo toString
    public function __toString()
    {
        $peaje="Datos de Recibos:\n";
        $recibos=$this->getColRecibos();
        $registros=$this->getColRegistros();
        foreach($recibos as $unRecibo){
            $peaje.=$unRecibo."\n";
        }
        $peaje.="Datos de los registros:\n";
        foreach($registros as $unRegistro){
            $peaje.=$unRegistro."\n";
        }
        return $peaje;
    }

    //Método cobrar peaje
    public function cobrarPeaje($unTipoRegistroVehiculo, $info){
        $registros=$this->getColRegistros();
        $recibos=$this->getColRecibos();
        if($unTipoRegistroVehiculo='Camion'){
            $objCamion = new RegistroCamion($info['patente'], $info['peso'], $info['ejes']);
            $peaje=$objCamion->valorPeaje();
            $objRecibo= new Recibo($peaje, date("Y-m-d"), date("h:i:s"), $objCamion);
            array_push($registros, $objCamion);
            array_push($recibos, $objRecibo);
            $this->setColRecibos($recibos);
            $this->setColRegistros($registros);
        }
        elseif($unTipoRegistroVehiculo='Escolar'){
            $objEscolar = new RegistroEscolar($info['patente'], $info['cantAsientos']);
            $peaje=$objEscolar->valorPeaje();
            $objRecibo= new Recibo($peaje, date("Y-m-d"), date("h:i:s"), $objEscolar);
            array_push($registros, $objEscolar);
            array_push($recibos, $objRecibo);
            $this->setColRecibos($recibos);
            $this->setColRegistros($registros);
        }
        else{
            $objVehiculo = new RegistroVehiculo($info['patente']);
            $peaje=$objVehiculo->valorPeaje();
            $objRecibo= new Recibo($peaje, date("Y-m-d"), date("h:i:s"), $objVehiculo);
            array_push($registros, $objVehiculo);
            array_push($recibos, $objRecibo);
            $this->setColRecibos($recibos);
            $this->setColRegistros($registros);
        }
        return $objRecibo;
    }

    //Recibo con mayor monto en una fecha dada
    public function reciboMayorMonto($fecha){
        $colRecibos=$this->getColRecibos();
        $mayorRecibo=0;
        $recibo=null; //devuelve null en caso de no haber recibos esa fecha
        foreach($colRecibos as $objRecibo){
            $fechaRecibo=$objRecibo->getFecha();
            $montoRecibo=$objRecibo->getValor();
            if($fechaRecibo==$fecha && $montoRecibo>$mayorRecibo){
                $mayorRecibo=$montoRecibo;
                $recibo=$objRecibo;
            }
        }
        return $recibo;
    }

    //recaudacion por tipo de vehiculo en una fecha dada
    public function recaudacionXtipoVehivulo($fecha, $unTipoRegistroVehiculo){
        $colRecibos=$this->getColRecibos();
        $recaudacion=0;
        foreach($colRecibos as $unRecibo){
            if($fecha == $unRecibo->getFecha()){
                $objVehiculo=$unRecibo->getObjVehiculo();
                if($unTipoRegistroVehiculo=='Camion' && get_class($objVehiculo) == 'RegistroCamion'){
                    $recaudacion = $recaudacion + $unRecibo->getValor();
                }
                elseif($unTipoRegistroVehiculo=='Escolar' && get_class($objVehiculo) == 'RegistroEscolar'){
                    $recaudacion = $recaudacion + $unRecibo->getValor();
                }
                else{
                    $recaudacion = $recaudacion + $unRecibo->getValor();
                }
            }
        }
        return $recaudacion;
    }

    //recaudacion total por fecha
    public function totalRecaudado($fecha){
        $totalrecaudado=0;
        $colRecibos=$this->getColRecibos();
        foreach($colRecibos as $unRecibo){
            $fechaRecibo=$unRecibo->getFecha();
            if($fecha==$fechaRecibo){
                $recaudacion=$unRecibo->getValor();
                $totalrecaudado=$totalrecaudado+$recaudacion;
            }
        }
        return $totalrecaudado;
    }

}
?>
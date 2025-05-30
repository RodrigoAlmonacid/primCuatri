<?php
class Contrato{
    //atributos
    private $fecha_inicio;
    private $fecha_vencimiento;
    private $objPlan;
    private $estado;
    private $costo;
    private $renueva; //si o no
    private $objCliente;

    //método constructor
    public function __construct($fecha_inicio, $fecha_vencimiento, $objCliente)
    {
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_vencimiento = $fecha_vencimiento;
        $this->objCliente = $objCliente;
        $this->objPlan = null; //inicio valores en nulo para despues incorporar el plan que contrata
        $this->estado = null; //seteo al incorporar plan
        $this->costo = 0; //seteo al incorporar plan
        $this->renueva = false; //seteo al incorporar plan
    }

    //Metodos de acceso
    public function getFecha_inicio(){
        return $this->fecha_inicio;
    }
    public function setFecha_inicio($fecha_inicio){
        $this->fecha_inicio = $fecha_inicio;
    }

    public function getFecha_vencimiento(){
        return $this->fecha_vencimiento;
    }
    public function setFecha_vencimiento($fecha_vencimiento){
        $this->fecha_vencimiento=$fecha_vencimiento;
    }

    public function getObjCliente(){
        return $this->objCliente;
    }
    public function setObjCliente($objCliente){
        $this->objCliente = $objCliente;
    }

    public function getObjPlan(){
        return $this->objPlan;
    }
    public function setObjPlan($objPlan){
        $this->objPlan=$objPlan;
    }

    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }

        public function getCosto(){
        return $this->costo;
    }
    public function setCosto($costo){
        $this->costo = $costo;
    }

        public function getRenueva(){
        return $this->renueva;
    }
    public function setRenueva($renueva){
        $this->renueva = $renueva;
    }

    //calcula los días de un contrato vencido
    public function diasContratoVencido(){
        return null;
    }

    //Método toString
    public function __toString()
    {
        $contrato = "Fecha de inicio: ".$this->getFecha_inicio()."\n";
        $contrato.= "Fecha de finalización: ".$this->getFecha_vencimiento()."\n";
        $contrato.= "Plan contratado: ".$this->getObjPlan()."\n";
        $contrato.= "Estado: ".$this->getEstado()."\n";
        $contrato.= "Costo: ".$this->getCosto()."\n";
        if($this->getRenueva()){
            $contrato.= "Renovará.\n";
        }
        else{
            $contrato.= "No renovará.\n";
        }
        $contrato.= "Datos del cliente: ".$this->getObjCliente()."\n";
        return $contrato;
    }

    //Actualizar el estado de un contrato
    public function actualizarEstadoContrato(){
        $estado = $this->getEstado();
        $diasVencido = diasContratoVencido();
        if($estado != "Finalizado"){
            if($diasVencido == 0){
                $estado="Al día";
            }
            elseif($diasVencido>0 && $diasVencido<10){
                $estado="Moroso";
            }
            else{
                $estado="Suspendido";
            }
            $this->setEstado($estado);
        }
    }

    //Método que calcula el importe
    public function calcularImporte(){
        $costo = 0;
        $plan = $this->getObjPlan();
        $costoPlan = $plan->getImporte();
        $canales = $plan->getColCaneles();
        foreach($canales as $canal){
            $costoCanal = $canal->getImporte();
            $costo = $costo + $costoCanal;
        }
        $costo = $costo + $costoPlan;
        return $costo;
    }
}
?>
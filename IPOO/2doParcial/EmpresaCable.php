<?php
class EmpresaCable{
    //atributos
    private $colPlanes;
    private $colCanales;
    private $colClientes;
    private $colContratos;

    //Método consructor de la clase
    public function __construct($colCanales, $colClientes, $colContratos, $colPlanes)
    {
        $this->colCanales = $colCanales;
        $this->colContratos = $colContratos;
        $this->colClientes = $colClientes;
        $this->colPlanes = $colPlanes;
    }

    //Incorporar Plan
    public function incorporarPlan($objPlan){
        $encuentra = false;
        $incorpora = false;
        $planesActuales = $this->getColPlanes();
        $cantPlanes = count($planesActuales);
        if($cantPlanes>0){
            $canalesNuevoPlan = $objPlan->getColCanales();
            $datosNuevoPlan = $objPlan->getDatos();
            $i=0;
            do{
                $colCanalesExistente = $planesActuales[$i]->getColCanales();
                $datosPlanExistente = $planesActuales[$i]->getImporte();
                if($colCanalesExistente === $canalesNuevoPlan && $datosPlanExistente === $datosNuevoPlan){
                    $encuentra = true;
                }
                $i++;
            }while($i<$cantPlanes && !$encuentra);
            if(!$encuentra){
                $incorpora = true;
                array_push($planesActuales, $objPlan);
                $this->setColPlanes($planesActuales);
            }
        }
        return $incorpora;
    }

    //buscar contrato
    public function buscaContrato($tipo, $dni){
        $contrato = null;
        $colContratos = $this->getColContratos();
        $cantContratos = count($colContratos);
        if($cantContratos>0){
            $i=0;
            $encuentra = false;
            do{
                $cliente = $colContratos->getObjCliente();
            }
        }
    }
}
?>
<?php
//clase hija de contrato
class ContratoWeb extends Contrato{
    //Hereda los atributos de la clase padre
    //Atributos propios de la clase
    private $descuento;
    
    //Método constructor
    public function __construct($fecha_inicio, $fecha_vencimineto, $objCliente)
    {
        //inicio las variables instancia de la clase padre
        parent::__construct($fecha_inicio, $fecha_vencimineto, $objCliente);
        //variable instancia propia de la clase, con valor por defecto
        $this->descuento = 10; //descuento del 10%
    }

    //Métodos de acceso
    public function getDescuento(){
        return $this->descuento;
    }
    public function setDescuento($descuento){
        $this->descuento = $descuento;
    }

    //método toString
    public function __toString()
    {
        $contratoWeb = parent::__toString();
        return $contratoWeb;
    }

    //Calcula el costo
    public function calcularImporte(){
        $costo = parent::calcularImporte();
        $descuentoWeb = $this->getDescuento();
        $costo = $costo * ((100 - $descuentoWeb)/100);
        return $costo;
    }
}
?>
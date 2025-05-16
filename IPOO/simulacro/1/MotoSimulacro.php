<?php 
//Clase moto, simulacro de primer parcial

class Moto{
    //Atributos
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcIncAnual;
    private $disponible; //Indica si la moto está disponible para la venta

    //Método constructor
    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncAnual, $disponible)
    {
        $this -> codigo = $codigo;
        $this -> costo = $costo;
        $this -> anioFabricacion = $anioFabricacion;
        $this -> descripcion = $descripcion;
        $this -> porcIncAnual = $porcIncAnual;
        $this -> disponible = $disponible;
    }

    //Metodos de acceso
    public function getCodigo(){
        return $this -> codigo;
    }
    public function setCodigo($codigo){
        $this -> codigo = $codigo;
    }

    public function getCosto(){
        return $this -> costo;
    }
    public function setCosto($costo){
        $this -> costo = $costo;
    }
    
    public function getAnioFabricacion(){
        return $this -> anioFabricacion;
    }
    public function setAnioFabricacion($anioFabricacion){
        $this -> anioFabricacion = $anioFabricacion;
    }
    
    public function getDescripcion(){
        return $this -> descripcion;
    }
    public function setDescripcion($descripcion){
        $this -> descripcion = $descripcion;
    }
    
    public function getPorcIncAnual(){
        return $this -> porcIncAnual;
    }
    public function setPorcIncAnual($porcIncAnual){
        $this -> porcIncAnual = $porcIncAnual;
    }
    
    public function getDisponible(){
        return $this -> disponible;
    }
    public function setDisponible($disponible){
        $this -> disponible = $disponible;
    }
    
    public function __toString()
    {
        $moto = "Código: ".$this -> getCodigo()."\nCosto: $ ".$this -> getCosto()."\nModelo: ".$this -> getAnioFabricacion()."\nPorcentaje de aumento anual: ".$this -> getPorcIncAnual()."%\nDescripción: ".$this -> getDescripcion();
        if($this -> getDisponible()){
            $moto = $moto."\nStock disponible.\n";
        }
        else{
            $moto = $moto."\nSin stock.\n";
        }
        return $moto;
    }

    //Método que calcula el valor de una moto
    /** función que recbe como parámetro el año actual y devuelve el precio actualizado de una moto
     * @param int $anioActual
     * @return float
    */
    public function darPrecioVenta($anioActual){
        $precioVenta = -1;
        if ($this -> getDisponible()){
            $precioVenta = $this -> getCosto() * pow ((1 + $this -> getPorcIncAnual() / 100), ($anioActual - $this -> getAnioFabricacion()));
        }
        return $precioVenta;
    }
}
?>
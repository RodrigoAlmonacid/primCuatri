<?php
//Clase préstamo, recuperotorio 1er parcial
class Prestamo{
    //variable estática
    static $generaCodigo = 0;
    //Atributos
    private $fecha;
    private $identificacion;
    private $monto;
    private $cantCuotas;
    private $tazaInteres; //lo supongo con porcentajes, por ejemplo 15 (para el 15%)
    private $objCliente;
    private $colCuotas;
    //private $codElectro;
    
    //Método constructor
    public function __construct($monto, $cantCuotas, $tazaInteres, Cliente $objCliente)
    {
        self::$generaCodigo++;
        $this->identificacion = self::$generaCodigo;
        $this->monto = $monto;
        $this->cantCuotas = $cantCuotas;
        $this->tazaInteres = $tazaInteres;
        $this->objCliente = $objCliente;
        $this->colCuotas = [];

    }

    //Métodos de acceso
    public function getIdentificacion(){
        return $this->identificacion;
    }

    public function getMonto(){
        return $this->monto;
    }
    public function setMonto($monto){
        $this->monto = $monto;
    }

    public function getCantCuotas(){
        return $this->cantCuotas;
    }
    public function setCantCuotas($cantCuotas){
        $this->cantCuotas = $cantCuotas;
    }

    public function getTazaInteres(){
        return $this->tazaInteres;
    }
    public function setTazaInteres($tazaInteres){
        $this->tazaInteres = $tazaInteres;
    }

    public function getObjCliente(){
        return $this->objCliente;
    }
    public function setObjCliente($objCliente){
        $this->objCliente = $objCliente;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getColCuotas(){
        return $this->colCuotas;
    }
    public function setColCuotas($colCuotas){
        $this->colCuotas = $colCuotas;
    }

    /** método privado calcularInteresPrestamo(numCuota) que recibe por parámetro 
     * el numero de la cuota y calcula el importe del interés sobre el saldo deudor
     * @param INT $numCuota
     * @return FLOAT
     */
    private function calcularInteresPrestamo($numCuota){
        $cant_cuotas = $this->getCantCuotas();
        $monto_total = $this->getMonto();
        $taza = $this->getTazaInteres();
        $saldoDeudor = ($monto_total - ($monto_total/$cant_cuotas) * ($numCuota-1)) * ($taza/100);
        return $saldoDeudor;
    }

    /** método otorgarPrestamo que setea la variable instancia  fecha otorgamiento, con la fecha actual 
     * (puede utilizar el valor retornado por la función de PHP getdate())  y genera cada una de las 
     * cuotas dependiendo el valor almacenado en la variable instancia  “cantidad_de_cuotas” y monto
     */
    public function otorgarPrestamo(){
        $fechaPrestamo = getdate();
        $this->setFecha($fechaPrestamo);
        $prestamo=[];
        $i=0;
        $cuotas = $this->getCantCuotas();
        $monto_total = $this->getMonto();
        do{
            $prestamo[$i] = ($monto_total/$cuotas) + $this->calcularInteresPrestamo($i+1);//La cuota es i+1!! 
            $i++;
        }while($i<$cuotas);
        return $prestamo; //devuelve un arreglo indexado, donde el valor de la cuota i, está en $prestamo[i-1]
    }
    
    /** 
     * método darSiguienteCuotaPagar método que retorna la referencia a la siguiente cuota que debe ser abonada de un préstamo
     */
    public function darSiguienteCuotaPagar(){
        $cuotas = $this->getColCuotas();
        $cantidad = count($cuotas);
        $i = 0;
        $proxima = null;
        do{
            $paga = $cuotas[$i]->getCancelada();//Me faltó el argumento [$i] para recorrer el arreglo
            if(!$paga){
                $proxima = $i + 1;
            }
            $i++;
        }while($i<$cantidad && !$paga);
        return $proxima; 
    }
}
?>
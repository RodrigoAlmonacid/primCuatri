<?php
//Clase venta, simulacro del primer parcial
//include_once "ClienteSimulacro.php";
//include_once "MotoSimulacro.php";
class Venta{
    //Declaro variable static para asignar un único número de venta
    private static $numeroVenta = 0;
    //Atributos
    private $fecha = [];
    private $cliente; //referencia a la clase Cliente
    private $coleccionMotos = []; //arreglo con objetos de la clase moto
    private $precioFinal;
    
    //Método constructor
    public function __construct($fecha, Cliente $cliente, $coleccionMotos)
    {
        self :: $numeroVenta++;
        $this -> fecha = $fecha;
        $this -> cliente = $cliente;
        $this -> coleccionMotos = $coleccionMotos;
        $this -> actualizaPrecio();
    }

    //Métodos de acceso
    public function getNumeroVenta(){
        return self :: $numeroVenta;
    }

    public function getFecha(){
        return $this -> fecha;
    }
    public function setFecha($fecha){
        $this -> fecha = $fecha;
    }

    public function getCliente(){
        return $this -> cliente;
    }
    public function setCliente($cliente){
        $this -> cliente = $cliente;
    }

    public function getColeccionMotos(){
        return $this -> coleccionMotos;
    }
    public function setColeccionMotos($moto){
        $this -> coleccionMotos = $moto;
    }

    public function getPrecioFinal(){
        return $this -> precioFinal;
    }
    public function setPrecioFinal($precioFinal){
        $this -> precioFinal = $precioFinal;
    }


    //Método toString
    public function __toString()
    {
        $venta = "Fecha: ".$this -> getFecha()["dd"]."/".$this -> getFecha()["mm"]."/".$this -> getFecha()["aaaa"].".\nVenta Nº: ".$this -> getNumeroVenta()."\nCliente: ".$this -> getCliente()."\nTotal: ".$this -> getPrecioFinal()."\n";
        return $venta;
    }

    /** funcion que actualiza el total de la venta
     */
    public function actualizaPrecio(){
        // Paso 1: Recorrer la coleccion de motos
        // Paso 2: Por cada moto, obtener su precio
        // Paso 3: Sumar los precios de cada moto
        // Paso 4: setPrecioFinal
        $sumaTotal = 0;
        $coleccionMotos = $this->getColeccionMotos();
/*        for($i=0; $i< count($coleccionMotos); $i++){
            $objMoto = $coleccionMotos[$i];    
            $sumaTotal = $sumaTotal + $objMoto -> DarPrecioVenta($this -> getFecha()["aaaa"]);
        }
*/       
        foreach ($coleccionMotos as $objMoto){
            $precioMoto = $objMoto->darPrecioVenta($this -> getFecha()["aaaa"]);
            $sumaTotal = $sumaTotal + $precioMoto;
            //echo $precioMoto;
        }
        $this -> setPrecioFinal($sumaTotal);
    }

    /** funcion que agrega una moto a la coleccion actual
     * @param $objMoto
     * @return array
     */
    public function incorporarMoto($objMoto){
        $agrega = false;
        if ($objMoto -> getDisponible()){
            $coleccionMotos = $this->getColeccionMotos();
            array_push($coleccionMotos, $objMoto);
            $this -> setColeccionMotos($coleccionMotos);
            $this -> actualizaPrecio();
            $agrega = true;
        }
        return $agrega;
    }
    
}
?>
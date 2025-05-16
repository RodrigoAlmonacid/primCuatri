<?php
//Clase Empresa, simulacro primer parcial
class Empresa{
    //Atributos
    private $denominacion;
    private $direccion;
    private $coleccionClientes; //referencia a la clase cliente
    private $coleccionMotos; //referencia a la clase moto
    private $coleccionVentas; //referencia a la clase venta

    public function __construct($denominacion, $direccion, $coleccionClientes, $coleccionMotos, $coleccionVentas)
    {  
        $this -> denominacion = $denominacion;
        $this -> direccion = $direccion;
        $this -> coleccionClientes = $coleccionClientes;
        $this -> coleccionMotos = $coleccionMotos;
        $this -> coleccionVentas = $coleccionVentas;
    }

    //Metodos de acceso
    public function getDenominacion(){
        return $this -> denominacion;
    }
    public function setDenominacion($denominacion){
        $this -> denominacion = $denominacion;
    }

    public function getDireccion(){
        return $this -> direccion;
    }
    public function setDireccion($direccion){
        $this -> direccion;
    }

    public function getColeccionClientes(){
        return $this -> coleccionClientes;
    }
    public function setColeccionClientes($colCli){
        $this -> coleccionClientes = $colCli;
    }

    public function getColeccionMotos(){
        return $this -> coleccionMotos;
    }
    public function setColeccionMotos($colMotos){
        $this -> coleccionMotos = $colMotos;
    }

    public function getColeccionVentas(){
        return $this -> coleccionVentas;
    }
    public function setColeccionVentas($colVentas){
        $this -> coleccionVentas = $colVentas;
    }

    public function __toString()
    {
        $empresa = "Empresa: \n".$this -> getDenominacion()."\nDierección: ".$this -> getDireccion().".\n";
        return $empresa;
    }

    /** Función que recorre la colección de motos buscado un código dado
     * @param int $codigo
     * @return string
     */
    public function retornarMoto($codigoMoto){
        $coleccionMotos = $this->getColeccionMotos();
        $filas = count($coleccionMotos); //cantidad de filas del arreglo de motos
        $i = 0; //variable iteradora
        $encontrado = false;
        do{
            $objMoto = $coleccionMotos[$i];
            if($objMoto->getCodigo() == $codigoMoto){
                $encontrado = true;
            }
            $i++;
        } while($i<$filas && !$encontrado);
        if(!$encontrado){
            $objMoto = "No se ha encontrado un registro para el código ingresado.\n";
        }
        return $objMoto;
    }
}
?>
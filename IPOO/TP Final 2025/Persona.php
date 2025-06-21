<?php
include_once 'BaseDatos.php';
class Persona{
    //Atributos
    private $nombre;
    private $apellido;
    private $dni;
    private $mensaje;

    //Método constructor
    public function __construct()
    {
        $this->nombre="";
        $this->apellido="";
        $this->dni="";
        $this->mensaje="";
    }

    //Métodos de acceso
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function getMensaje(){
        return $this->mensaje;
    }
    public function setMensaje($mensaje){
        $this->mensaje=$mensaje;
    }

    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }

    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni=$dni;
    }

    //Método toString
    public function __toString()
    {
        $persona="Apellido y nombre: ".$this->getApellido().", ".$this->getNombre()."\n";
        $persona.="DNI N°: ".$this->getDni()."\n";
        return $persona;
    }

    /** funcion para buscar una persona en la base de datos (tabla persona)
     * 'dni' es la clave primaria en la tabla
     * @param int $dni
     * @return array
     */
    public function buscar($dni){
        $base=new BaseDatos();
        $consulta='SELECT * FROM persona WHERE dni='.$dni;
        $respuesta=false;
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $row2=$base->Registro();
                if($row2){
                    $this->setDni($dni);
                    $this->setNombre($row2['nombre']);
                    $this->setApellido($row2['apellido']);
                    $respuesta=true;
                }
                else{
                    $this->setApellido('Lo siento');
                    $this->setNombre('persona no encontrada');
                }				
		 	}
            else{
		 		$this->setMensaje($base->getError());	
			}
		}	
        else{
			$this->setMensaje($base->getError()); 	
		}		
		return $respuesta;
	}
}
?>
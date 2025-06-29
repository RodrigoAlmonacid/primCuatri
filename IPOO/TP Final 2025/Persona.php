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
     * @return bool
     */
    public function buscar($dni){
        $base=new BaseDatos();
        $consulta='SELECT * FROM persona WHERE dni='.$dni;
        $busqueda=false;
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $row2=$base->Registro();
                if($row2){
                    $this->setDni($dni);
                    $this->setNombre($row2['nombre']);
                    $this->setApellido($row2['apellido']);
                    $busqueda=true;
                }				
		 	}
            else{
		 		$this->setMensaje($base->getError());	
			}
		}	
        else{
			$this->setMensaje($base->getError()); 	
		}		
		return $busqueda;
	}

    /** funcion que me permite cargar datos de una nueva persona al objeto
     * @param int $dni
     * @param string $nombre, $apellido
     */
    public function cargar($dni, $nombre, $apellido){
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setDni($dni);
    }

    /** funcion que me permite insertar una persona cuando esta no exista en la base de datos
     * @param int $dni
     * @param strig $nombre, $apellido
     * @return bool
     */
    public function insertar(){
        $agrega=false;
        $base=new BaseDatos();
        $consulta="INSERT INTO persona(dni, nombre, apellido) VALUES ";
        $consulta.="(".$this->getDni().", '".$this->getNombre()."', '".$this->getApellido()."');";
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $agrega=true;
            }
            else{
			    $this->setMensaje($base->getError());
		    }
        }	
        else{
			$this->setMensaje($base->getError()); 	
        }
        return $agrega;   
    }

    /** Funcion que me permite modificar datos de una persona
     * @param int $dni
     * @param strig $nombre, $apellido
     * @return bool
     */
    public function modificar(){
        $base=new BaseDatos();
        $modifica=false;
        $consulta="UPDATE persona SET ";
        $consulta.="nombre='".$this->getNombre()."', ";
        $consulta.="apellido='".$this->getApellido()."' ";
        $consulta.="WHERE dni=".$this->getDni().";";
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $modifica=true;
            }
            else{
			    $this->setMensaje($base->getError());	
		    }
        }	
        else{
			$this->setMensaje($base->getError()); 	
        }
        return $modifica;
    }

    /** funcion que me permite eliminar datos de una persona, siempre que las pilíticas lo permitan
     * @param int $dni
     * @return bool
     */
    public function eliminar($dni){
        $base=new BaseDatos();
        $elimina=false;
        $consulta="DELETE FROM persona WHERE dni=".$dni;
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $elimina=true;
            }
            else{
			    $this->setMensaje($base->getError());	
		    }
        }	
        else{
			$this->setMensaje($base->getError()); 	
        }
        return $elimina;
    }
}
?>
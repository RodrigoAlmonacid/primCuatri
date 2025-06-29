<?php
include_once 'BaseDatos.php';
class Responsable extends Persona{
    //Atributos propios
    private $numLicencia;
    private $numEmpleado;

    //Método constructor
    public function __construct()
    {
        //llamo al constructor de la clase padre
        parent::__construct();
        //Inicio las variables instancia propias de la clase
        $this->numLicencia="";
        $this->numEmpleado=null;
    }

    //Método de acceso
    public function getNumLicencia(){
        return $this->numLicencia;
    }
    public function setNumLicencia($lic){
        $this->numLicencia=$lic;
    }

    public function getNumEmpleado(){
        return $this->numEmpleado;
    }
    public function setNumEmpleado($numEmpleado){
        $this->numEmpleado=$numEmpleado;
    }

    //Método toString
    public function __toString()
    {
        //Llamo al toString de la clase padre
        $responsable=parent::__toString();
        //agrego atributos propios
        $responsable.="Licencia N°: ".$this->getnumLicencia()."\n";
        $responsable.="Legajo N°: ".$this->getNumEmpleado()."\n";
        return $responsable;
    }

    /** funcion que me permite cargar un pasajero
     * @param int $dni, $telefono
     * @param string $nombre, $apellido
     */
    public function cargarResponsable($dni, $nombre, $apellido, $numLicencia)
    {
        parent::cargar($dni, $nombre, $apellido);
        $this->setNumLicencia($numLicencia);
    }

    /** funcion para buscar un responsable en la base de datos (tabla responsable)
     * 'dni' es la clave primaria en la tabla
     * @param int $dni
     * @return bool
     */
    public function buscar($dni){
        $base=new BaseDatos();
        $consulta='SELECT * FROM responsable WHERE dniResponsable='.$dni;
        $busqueda=false;
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $row2=$base->Registro();
                if($row2){
                    parent::buscar($dni);
                    $this->setNumLicencia($row2['numLicencia']);
                    $this->setNumEmpleado($row2['numEmpleado']);
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

    /** funcion para traer datos de un responsable en la base de datos (tabla responsable)
     * 'dni' es la clave primaria en la tabla
     * @param int $dni
     * @return bool
     */
    public function datos($dni){
        $base=new BaseDatos();
        $consulta='SELECT * FROM responsable WHERE dniResponsable='.$dni;
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $datos=$base->Registro();	
			}
		}	
        else{
			$this->setMensaje($base->getError()); 	
		}		
		return $datos;
	}

    /** funcion que me permite insertar un responsable cuando este exista en la base de datos persona
     * @param int $dni, $telefono
     * @param strig $nombre, $apellido
     * @return bool
     */
    public function insertar(){
        $agrega=false;
        $base=new BaseDatos();
        $consulta="INSERT INTO responsable(dniResponsable, numLicencia) VALUES ";
        $consulta.="(".parent::getDni().", ".$this->getNumLicencia().");";
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $agrega=true;
            }
            else{
			    parent::setMensaje($base->getError());
		    }
        }	
        else{
			parent::setMensaje($base->getError()); 	
        }
        return $agrega;   
    }

    /** Funcion que me permite modificar datos de un responsable
     * @param int $dni
     * @param strig $nombre, $apellido
     * @return bool
     */
    public function modificar(){
        $base=new BaseDatos();
        $modifica=false;
        $consulta="UPDATE responsable SET ";
        $consulta.="numLicencia='".$this->getNumLicencia()."' ";
        $consulta.="WHERE dni=".parent::getDni().";";
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $modifica=true;
            }
            else{
			    parent::setMensaje($base->getError());	
		    }
        }	
        else{
			parent::setMensaje($base->getError()); 	
        }
        return $modifica;
    }

    /** funcion que me permite eliminar datos de un responsable, siempre que las pilíticas lo permitan
     * @param int $dni
     * @return bool
     */
    public function eliminar($dni){
        $base=new BaseDatos();
        $elimina=false;
        $consulta="DELETE FROM responsable WHERE dniResponsable=".$dni.";";
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $elimina=true;
            }
            else{
			    parent::setMensaje($base->getError());	
		    }
        }	
        else{
			parent::setMensaje($base->getError()); 	
        }
        return $elimina;
    }
}
?>
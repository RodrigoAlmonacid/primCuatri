<?php
include_once 'BaseDatos.php';
class Responsable extends Persona{
    //Atributos propios
    private $numLicencia;
    private $numEmpleado;
    private $mensajeError;

    //Método constructor
    public function __construct()
    {
        //llamo al constructor de la clase padre
        parent::__construct();
        //Inicio las variables instancia propias de la clase
        $this->numLicencia="";
        $this->numEmpleado=null;
        $this->mensajeError="";
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

    public function getMensajeError(){
        return $this->mensajeError;
    }
    public function setMensajeError($mensaje)
    {
        $this->mensajeError=$mensaje;
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
        $existePersona = false;
        if($base->iniciar()){
            // Verificar si existe la persona
            if(parent::buscar(parent::getDni())){
                $existePersona = true;
            } 
            else {
                // No existe la persona, la creo
                $persona=parent::insertar();
                if($persona){
                    $existePersona = true;
                }
            }
            if($existePersona){
                if($base->Ejecutar($consulta)){
                    $agrega=true;
                }
            }
            else{
                $this->setMensajeError('No existe la persona');
            }    
        }	
        else{
			$this->setMensajeError($base->getError());	
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
        $consulta.="numLicencia=".$this->getNumLicencia();
        $consulta.=" WHERE dniResponsable=".parent::getDni();
        $consulta.=" AND numEmpleado=".$this->getNumEmpleado().";";
        parent::modificar();
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

    /** función que me trae los viajes de un responsable
     * @param int $dniPasajero
     * @return array
     */
    public function viajesResponsable($dniResponsable){
        $base=new BaseDatos();
        $consulta='SELECT v.idViaje FROM viaje v INNER JOIN responsable r ON v.dniResponsable=r.dniResponsable WHERE r.dniResponsable='.$dniResponsable.";";
        $arregloViajes=[];
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $row2=$base->Registro();
                if($row2){
                    do{
                        $objViaje=new Viaje;
                        $idViaje = $row2['idViaje'];
                        if($objViaje->buscar($idViaje, false)) {
                        array_push($arregloViajes, $objViaje);
                        }
                    }while($row2 = $base->Registro());
                }
            }
        }
        return $arregloViajes;
    }

    /** funcion para listar todas las personas
     * @return array
     * */
    public function listar(){
        $base=new BaseDatos();
        $consulta="SELECT * FROM responsable;";
        $arregloResponsable=[];
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $row2=$base->Registro();
                if($row2){
                    do{
                        $objResponsable=new Responsable();
                        $dniResponsable = $row2['dniResponsable'];
                        if($objResponsable->buscar($dniResponsable)) {
                        array_push($arregloResponsable, $objResponsable);
                        }
                    }while($row2 = $base->Registro());
                }
            }
        }
        return $arregloResponsable;
    }

    /** funcion que me permite eliminar datos de un responsable, siempre que las pilíticas lo permitan
     * @param int $dni
     * @return bool
     */
    public function eliminar(){
        $base=new BaseDatos();
        $elimina=false;
        $consulta="DELETE FROM responsable WHERE dniResponsable=".parent::getDni().";";
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
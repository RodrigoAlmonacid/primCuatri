<?php
class Pasajero extends Persona{
    //Atributos propios
    private $telefono;

    //Método constructor
    public function __construct()
    {
        //llamo al constructor de la clase padre
        parent::__construct();
        //Inicio la variable instancia propia de la clase
        $this->telefono="";
    }

    //Método de acceso
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($tel){
        $this->telefono=$tel;
    }

    //Método toString
    public function __toString()
    {
        //Llamo al toString de la clase padre
        $pasajero=parent::__toString();
        //agrego el atributo propio
        $pasajero.="Teléfono de contacto: ".$this->getTelefono()."\n";
        return $pasajero;
    }

    /** funcion para buscar un pasajero en la base de datos (tabla pasajero)
     * 'dni' es la clave primaria en la tabla
     * @param int $dni
     * @return array
     */
    public function buscar($dni){
        $base=new BaseDatos();
        $consulta='SELECT * FROM pasajero WHERE dni='.$dni;
        $busqueda=false;
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $row2=$base->Registro();
                if($row2){
                    parent::setDni($dni);
                    parent::setNombre($row2['nombre']);
                    parent::setApellido($row2['apellido']);
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

    /** funcion que me permite insertar un pasajero cuando este exista en la base de datos persona
     * @param int $dni, $telefono
     * @param strig $nombre, $apellido
     * @return bool
     */
    public function insertar(){
        $agrega=false;
        $base=new BaseDatos();
        $consulta="INSERT INTO pasajero(dni, telefono) VALUES ";
        $consulta.="(".parent::getDni().", '".$this->getTelefono()."');";
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $agrega=true;
            }
            else{
			    $this->setMensaje($base->getError());
                $agrega=$base->getError();	
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
        if($nombre!=0){
            $consulta.="nombre='".$nombre."' ";
        }
        if($nombre!=0 && $apellido!=0){
            $consulta.=", ";
        }
        if($apellido!=0){
            $consulta.="apellido='".$apellido."' ";
        }
        $consulta.="WHERE dni=".$dni.";";
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
        return $consulta;
    }

    /** funcion que me permite eliminar datos de una persona, siempre que las pilíticas lo permitan
     * @param int $dni
     * @param string $nombre, $apellido
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
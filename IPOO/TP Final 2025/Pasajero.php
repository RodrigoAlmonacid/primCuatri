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

    /** funcion que me permite cargar un pasajero
     * @param int $dni, $telefono
     * @param string $nombre, $apellido
     */
    public function cargarPasajero($dni, $nombre, $apellido, $telefono)
    {
        parent::cargar($dni, $nombre, $apellido);
        $this->setTelefono($telefono);
    }

    /** funcion para buscar un pasajero en la base de datos (tabla pasajero)
     * 'dni' es la clave primaria en la tabla
     * @param int $dni
     * @return bool
     */
    public function buscar($dni){
        $base=new BaseDatos();
        $consulta='SELECT * FROM pasajero WHERE dni='.$dni;
        $busqueda=false;
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $row2=$base->Registro();
                if($row2){
                    parent::buscar($dni);
                    $this->setTelefono($row2['telefono']);
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
        $consulta="INSERT INTO pasajero(dniPasajero, telefono) VALUES ";
        $consulta.="(".parent::getDni().", ".$this->getTelefono().");";
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

    /** Funcion que me permite modificar datos de una persona
     * @param int $dni
     * @param strig $nombre, $apellido
     * @return bool
     */
    public function modificar(){
        $base=new BaseDatos();
        $modifica=false;
        $consulta="UPDATE pasajero SET ";
        $consulta.="telefono='".$this->getTelefono()."' ";
        $consulta.="WHERE dni=".parent::getDni().";";
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

    /** funcion que me permite eliminar datos de un pasajero, siempre que las pilíticas lo permitan
     * @param int $dni
     * @param string $nombre, $apellido
     * @return bool
     */
    public function eliminar($dni){
        $base=new BaseDatos();
        $elimina=false;
        $consulta="DELETE FROM pasajero WHERE dni=".$dni;
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
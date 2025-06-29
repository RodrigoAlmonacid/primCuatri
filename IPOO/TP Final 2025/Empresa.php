<?php
class Empresa{
    //Atributos
    private $idEmpresa;
    private $nombre;
    private $direccion;
    private $mensaje;

    //Método constructor
    public function __construct()
    {
        $this->idEmpresa=null;
        $this->nombre="";
        $this->direccion="";
        $this->mensaje="";
    }

    //Métodos de acceso
    public function getIdEmpresa(){
        return $this->idEmpresa;
    }
    public function setIdEmpresa($idEmpresa){
        $this->idEmpresa=$idEmpresa;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }

    public function getMensaje(){
        return $this->mensaje;
    }
    public function setMensaje($mensaje){
        $this->mensaje=$mensaje;
    }

    //Método toString
    public function __toString()
    {
        $empresa="Código de empresa: ".$this->getIdEmpresa()."\n";
        $empresa.="Nombre: ".$this->getNombre()."\n";
        $empresa.="Direccion: ".$this->getDireccion()."\n";
        return $empresa;
    }

    /** funcion que me permite cargar datos de una empresa y setearlos en el objeto
     * @param string $nombre, $direccion
     */
    function cargar($nombre, $direccion){
        $this->setNombre($nombre);
        $this->setDireccion($direccion);
    }

    /** funcion para buscar una empresa en la base de datos (tabla empresa)
     * 'idEmpresa' es la clave primaria en la tabla
     * @param int $idEmpresa
     * @return bool
     */
    public function buscar($idEmpresa){
        $base=new BaseDatos();
        $consulta='SELECT * FROM empresa WHERE idEmpresa='.$idEmpresa.";";
        $busqueda=false;
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $row2=$base->Registro();
                if($row2){
                    $this->setIdEmpresa($row2['idEmpresa']);
                    $this->setNombre($row2['nombre']);
                    $this->setDireccion($row2['direccion']);
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

    /** funcion para obtener datos de una empresa en la base de datos (tabla empresa)
     * 'idEmpresa' es la clave primaria en la tabla
     * @param int $idEmpresa
     * @return bool
     */
    public function datos($idEmpresa){
        $base=new BaseDatos();
        $consulta='SELECT * FROM empresa WHERE idEmpresa='.$idEmpresa.";";
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

    /** funcion que me permite insertar una empresa
     * @param string $nombre, $direccion
     * @return bool
     */
    public function insertar(){
        $agrega=false;
        $base=new BaseDatos();
        $consulta="INSERT INTO empresa(nombre, direccion) VALUES ";
        $consulta.="('".$this->getNombre()."', '".$this->getDireccion()."');";
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

    /** Funcion que me permite modificar datos de una Empresa
     * @param string $nombre, $direccion
     * @return bool
     */
    public function modificar(){
        $base=new BaseDatos();
        $modifica=false;
        $consulta="UPDATE empresa SET ";
        $consulta.="nombre='".$this->getNombre()."', ";
        $consulta.="direccion='".$this->getDireccion()."' ";
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

    /** funcion que me permite eliminar datos de una empresa, siempre que las pilíticas lo permitan
     * @param int $idEmpresa
     * @return bool
     */
    public function eliminar($idEmpresa){
        $base=new BaseDatos();
        $elimina=false;
        $consulta="DELETE FROM empresa WHERE idEmpresa=".$idEmpresa;
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
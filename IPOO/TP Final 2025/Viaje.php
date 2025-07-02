<?php
include_once 'Empresa.php';
include_once 'Persona.php';
include_once 'Responsable.php';
include_once 'Pasajero.php';
class Viaje{
    //Atributos
    private $idViaje;
    private $destino;
    private $importe;
    private $cantMaxPasajeros;
    private $cantidadActualPasaj;
    private Empresa $objEmpresa;
    private Responsable $objResponsable;
    private $colPasajeros;
    private $mensaje;

    //metodo constructor
    public function __construct()
    {
        $this->destino="";
        $this->importe="";
        $this->cantMaxPasajeros="";
        $this->cantidadActualPasaj=0;
        $this->colPasajeros=[];
        $this->idViaje=null;
        $this->mensaje="";
    }

    //Métodos de acceso
    public function getIdViaje(){
        return $this->idViaje;
    }
    public function setIdViaje($idViaje){
        $this->idViaje=$idViaje;
    }

    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($destino){
        $this->destino=$destino;
    }

    public function getImporte(){
        return $this->importe;
    }
    public function setImporte($importe){
        $this->importe=$importe;
    }

    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros=$cantMaxPasajeros;
    }

    public function getCantidadActualPasaj(){
        return $this->cantidadActualPasaj;
    }
    public function setCantidadActualPasaj($cantidadActualPasaj){
        $this->cantidadActualPasaj=$cantidadActualPasaj;
    }

    public function getObjResponsable(){
        return $this->objResponsable;
    }
    public function setObjResponsable($objResponsable){
        $this->objResponsable=$objResponsable;
    }

    public function getObjEmpresa(){
        return $this->objEmpresa;
    }
    public function setObjEmpresa($objEmpresa){
        $this->objEmpresa=$objEmpresa;
    }

    public function getColPasajeros(){
        return $this->colPasajeros;
    }
    public function setColPasajeros($colPasajeros){
        $this->colPasajeros=$colPasajeros;
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
        $viaje="Identificador de viaje: ID".$this->getIdViaje()."\n";
        $viaje.="Destino: ".$this->getDestino()."\n";
        $viaje.="Importe: $".$this->getImporte()."\n";
        $viaje.="Empresa: ".$this->getObjEmpresa();
        $viaje.="Responsable: ".$this->getObjResponsable();
        $viaje.="Cantidad de plazas: ".$this->getCantMaxPasajeros()."\n";
        $pasajeros=$this->getColPasajeros();
        if(count($pasajeros)>0){
            $viaje.="Pasajeros en el viaje: ".$this->getCantidadActualPasaj()."\n";
            $viaje.="----------------------------\n";
            foreach($pasajeros as $unPasajero){
                $viaje.=$unPasajero->getNombre()." ".$unPasajero->getApellido().", DNI: ".$unPasajero->getDni().".\n";
                $viaje.="----------------------------\n";
            }
        }
        return $viaje;
    }

    /** funcion que me permite cargar datos de un viaje y setearlos en el objeto
     * @param string $destino
     * @param int $importe, $cantMaxPasajeros, $dniResponsable, $numEmpleado
     */
    function cargar($importe, $destino, $cantMaxPasajeros, $objEmpresa, $objResponsable){
        $this->setImporte($importe);
        $this->setDestino($destino);
        $this->setCantMaxPasajeros($cantMaxPasajeros);
        $this->setObjEmpresa($objEmpresa);
        $this->setObjResponsable($objResponsable);
    }

    /** funcion para buscar un viaje en la base de datos (tabla viaje)
     * 'idViaje' es la clave primaria en la tabla
     * @param int $idViaje
     * @return bool
     */
    public function buscar($idViaje, $incluirLista){
        //$incluir lista me sirve para que no me traiga la lista de pasajeros siempre
        //Por ejemplo cuando quiero saber que viajes tiene un pasajero, no quiero saber con quienes viaja
        $base=new BaseDatos();
        $consulta='SELECT * FROM viaje WHERE idViaje='.$idViaje.";";
        $busqueda=false;
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $row2=$base->Registro();
                if($row2){
                    $this->setIdViaje($idViaje);
                    $this->setImporte($row2['importe']);
                    $this->setDestino($row2['destino']);
                    $this->setCantMaxPasajeros($row2['cantMaxPasajeros']);
                    $empresa=new Empresa();
                    $empresa->buscar($row2['idEmpresa']);
                    $this->setObjEmpresa($empresa);
                    $responsable=new Responsable();
                    $responsable->buscar($row2['dniResponsable']);
                    $this->setObjResponsable($responsable);
                    if($incluirLista){
                        $this->pasajerosViaje($idViaje);
                    }
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
        $base->Cerrar();
		return $busqueda;
	}

    /** funcion que me permite obtener los pasajeros de un viaje
     * @param int $idViaje
     */
    public function pasajerosViaje($idViaje){
        $base=new BaseDatos();
        $consulta="SELECT dniPasajero FROM realiza WHERE idViaje=".$idViaje.";";
        $colPasajeros=$this->getColPasajeros();
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $row2=$base->Registro();
                if($row2){
                    do{
                        $objPasajero=new Pasajero;
                        $dniPasajero = $row2['dniPasajero'];
                        if($objPasajero->buscar($dniPasajero)) {
                        array_push($colPasajeros, $objPasajero);
                        }
                    }while($row2 = $base->Registro());
                }
            }
        }
        $this->setColPasajeros($colPasajeros);
        $cantPasajeros=count($this->getColPasajeros());
        $this->setCantidadActualPasaj($cantPasajeros);
    }

    /** funcion que me dice si un pasajero está en un viaje
     * @param int $dni, $idViaje
     * @return bool
     */
    public function pasajeroEnViaje($dni){
        $encuentra=false;
        $this->buscar($this->getIdViaje(), true);
        $coleccion=$this->getColPasajeros();
        $cant=count($coleccion);
        if($cant!=0){
            $i=0;
            do{
                $dniPasajero=$coleccion[$i]->getDni();
                if($dni==$dniPasajero){
                    $encuentra=true;
                }
                $i++;
            }while($i<$cant && !$encuentra);
        }
    return $encuentra;
    }

    /** funcion que me permite cargar un pasajero a un viaje
     * @param int 
     */
    public function cargarPasajero($dni){
        $lugaresDisp=$this->getCantMaxPasajeros()-$this->getCantidadActualPasaj();
        $agrega=false;
        if($lugaresDisp>0){    
            $base=new BaseDatos();    
            $consulta="INSERT INTO realiza(dniPasajero, idViaje) VALUES(".$dni.", ".$this->getIdViaje().");";
            if($base->Iniciar()){
                if($base->Ejecutar($consulta)){
                    $agrega=true;
                    $this->buscar($this->getIdViaje(), true);
                }
                else{
                    $this->setMensaje($base->getError());
                }
            }
            else{
                $this->setMensaje($base->getError());
            }
        }
        return $agrega;
    }

    /** funcion que me permite insertar un viaje
     * @param string $destino
     * @param int $importe, $cantMaxPasajeros, $idEmpresa, $dniResponsable, $numEmpleado
     * @return bool
     */
    public function insertar(){
        $empresa=$this->getObjEmpresa();
        $responsable=$this->getObjResponsable();
        $agrega=false;
        $base=new BaseDatos();
        $consulta="INSERT INTO viaje(importe, destino, cantMaxPasajeros, idEmpresa, dniResponsable, numEmpleado) VALUES ";
        $consulta.="(".$this->getImporte().", '".$this->getDestino()."', ".$this->getCantMaxPasajeros().", ";
        $consulta.=$empresa->getIdEmpresa().", ".$responsable->getDni().", ".$responsable->getNumEmpleado().");";
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

    /** Funcion que me permite modificar datos de un viaje
     * @param string $destino
     * @param int $importe, $cantMaxPasajeros, $idEmpresa, $dniResponsable, $numEmpleado
     * @return bool
     */
    public function modificar(){
        $empresa=$this->getObjEmpresa();
        $responsable=$this->getObjResponsable();
        $base=new BaseDatos();
        $modifica=false;
        $consulta="UPDATE viaje SET ";
        $consulta.="importe=".$this->getImporte().", ";
        $consulta.="destino='".$this->getDestino()."', ";
        $consulta.="cantMaxPasajeros=".$this->getCantMaxPasajeros().", ";
        $consulta.="idEmpresa=".$empresa->getIdEmpresa().", ";
        $consulta.="dniResponsable=".$responsable->getDni().", ";
        $consulta.="numEmpleado=".$responsable->getNumEmpleado();
        $consulta.=" WHERE idViaje=".$this->getIdViaje().";";
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

    /** funcion para listar todos los viajes
     * @return array
     * */
    public function listar(){
        $base=new BaseDatos();
        $consulta="SELECT * FROM viaje;";
        $arregloViaje=[];
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $row2=$base->Registro();
                do{
                    $objViaje=new Viaje();
                    $idViaje = $row2['idViaje'];
                    if($objViaje->buscar($idViaje, true)) {
                    array_push($arregloViaje, $objViaje);
                    }
                }while($row2 = $base->Registro());
            }
        }
        return $arregloViaje;
    }

    /** funcion que me permite eliminar datos de un viaje, siempre que las pilíticas lo permitan
     * @param int $idViaje
     * @return bool
     */
    public function eliminar(){
        $base=new BaseDatos();
        $elimina=false;
        $consulta="DELETE FROM viaje WHERE idViaje=".$this->getIdViaje();
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
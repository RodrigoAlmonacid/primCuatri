<?php
include_once 'BaseDatos.php';
class Visita{
    //Atributos
    private $idVisita;
    private $nombre;
    private $apellido;
    private $telefono;
    private $fecha;
    private $deleted_at;
    private $hora;

    //Método constructor
    public function __construct()
    {
        $this->idVisita=null;
        $this->nombre="";
        $this->apellido="";
        $this->telefono="";
        $this->fecha=null;
        $this->deleted_at=null;
        $this->hora=null;
    }

    //Métodos de acceso
    public function getIdVisita(){
        return $this->idVisita;
    }
    public function setIdVisita($idVisita){
        $this->idVisita=$idVisita;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }

    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }

    public function getDeleted_at(){
        return $this->deleted_at;
    }
    public function setDeleted_at($deleted_at){
        $this->deleted_at=$deleted_at;
    }

    public function getHora(){
        return $this->hora;
    }
    public function setHora($hora){
        $this->hora=$hora;
    }

    /** función para cargar una visita
     */
    public function cargar($nombre, $apellido, $telefono, $fecha, $deleted_at, $hora){
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setTelefono($telefono);
        $this->setFecha($fecha);
        $this->setDeleted_at($deleted_at);
        $this->setHora($hora);
    }

    /** funcion que me permite buscar una visita por id
     * @param int $idVisita
     * @return bool
     */
    public function buscar($idVisita){
        $base=new BaseDatos();
        $respuesta=false;
        $consulta="SELECT * FROM visita WHERE id=".$idVisita.";";
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $row=$base->Registro();
                if($row){
                    $respuesta=true;
                    $this->setIdVisita($row['id']);
                    $this->setNombre($row['nombre']);
                    $this->setApellido($row['apellido']);
                    $this->setTelefono($row['telefono']);
                    $this->setFecha($row['fecha']);
                    $this->setDeleted_at($row['deleted_at']);
                    $this->setHora($row['hora']);
                }
            }
        }
        $base->Cerrar();
        return $respuesta;
    }
        
    /** funcion para listar todas las visitas
     * @return array
     * */
    public function listar(){
        $base=new BaseDatos();
        $consulta="SELECT * FROM visita;";
        $arregloVisitas=[];
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $row=$base->Registro();
                if($row){
                    do{
                        $objVisita=new Visita();
                        $objVisita->setIdVisita($row['id']);
                        $objVisita->setNombre($row['nombre']);
                        $objVisita->setApellido($row['apellido']);
                        $objVisita->setTelefono($row['telefono']);
                        $objVisita->setDeleted_at($row['deleted_at']);
                        $objVisita->setHora($row['hora']);
                        array_push($arregloVisitas, $objVisita);
                    }while($row = $base->Registro());
                }
            }
        }
        $base->Cerrar();
        return $arregloVisitas;
    }

    /** funcion que me permite insertar una visita
     * @return bool
     */
    public function insertar(){
        $agrega=false;
        $base=new BaseDatos();
        $consulta="INSERT INTO visita(nombre, apellido, telefono, fecha, deleted_at, hora) VALUES";
        $consulta.="('".$this->getNombre()."', '".$this->getApellido()."', ".$this->getTelefono().", '".$this->getFecha()."', null, '".$this->getHora()."');";
        echo $consulta;
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $agrega=true;
            }
            else {echo "no se ejecuta la consulta";} 	
        }
        else {echo "no se inicia la conexión";}
        $base->Cerrar();
        return $agrega;   
    }

    /** Funcion que me permite modificar una visita
     * @return bool
     */
    public function modificar(){
        $base=new BaseDatos();
        $modifica=false;
        $consulta="UPDATE visita SET ";
        $consulta.="id=".$this->getIdVisita().", nombre='".$this->getNombre()."', apellido='".$this->getApellido()."', telefono='".$this->getTelefono()."', fecha='".$this->getFecha();
        if($this->getDeleted_at()!=null){
            $consulta.="', deleted_at='".$this->getDeleted_at()."'";
            }
        $consulta.="', hora=".$this->getHora()." WHERE id=".$this->getIdVisita();        
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
            $modifica=true;
            }
        }
        $base->Cerrar();
        return $modifica;
    }

    /** funcion que me permite eliminar una visita
     * @param int $idVisita
     * @return bool
     */
    public function eliminar($idVisita){
        $base=new BaseDatos();
        $elimina=false;
        $consulta="DELETE FROM visita WHERE id=".$idVisita;
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $elimina=true;
            } 	
        }
        $base->Cerrar();
        return $elimina;
    }
}
?>
<?php
include_once 'BaseDatos.php';
class Imagenes{
    //Atributos
    private $idImagen;
    private $dirUrl;
    private $titulo;
    private $alt;
    private $delete_at;
    private $id_tipo_trabajo;

    //Método constructor
    public function __construct()
    {
        $this->idImagen=null;
        $this->dirUrl="";
        $this->titulo="";
        $this->alt="";
        $this->delete_at=null;
        $this->id_tipo_trabajo="";
    }

    //Métodos de acceso
    public function getIdImagen(){
        return $this->idImagen;
    }
    public function setIdImagen($idImagen){
        $this->idImagen=$idImagen;
    }

    public function getDirUrl(){
        return $this->dirUrl;
    }
    public function setDirUrl($dirUrl){
        $this->dirUrl=$dirUrl;
    }

    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }

    public function getAlt(){
        return $this->alt;
    }
    public function setAlt($alt){
        $this->alt=$alt;
    }

    public function getDelete_at(){
        return $this->delete_at;
    }
    public function setDelete_at($delete_at){
        $this->delete_at=$delete_at;
    }

    public function getId_tipo_trabajo(){
        return $this->id_tipo_trabajo;
    }
    public function setId_tipo_trabajo($id_tipo_trabajo){
        $this->id_tipo_trabajo=$id_tipo_trabajo;
    }

    /** función para cargar una imágen
     */
    public function cargar($dirUrl, $titulo, $alt, $delete_at, $tipoTrabajo){
        $this->setDirUrl($dirUrl);
        $this->setTitulo($titulo);
        $this->setAlt($alt);
        $this->setDelete_at($delete_at);
        $this->setId_tipo_trabajo($tipoTrabajo);
    }

    /** funcion que me permite buscar una imagen
     * @param int $idImagen
     * @return bool
     */
    public function buscar($idImagen){
        $base=new BaseDatos();
        $respuesta=false;
        $consulta="SELECT * FROM imagenes WHERE id=".$idImagen.";";
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $row=$base->Registro();
                if($row){
                    $respuesta=true;
                    $this->setIdImagen($row['id']);
                    $this->setDirUrl($row['dirUrl']);
                    $this->setTitulo($row['titulo']);
                    $this->setAlt($row['alt']);
                    $this->setDelete_at($row['delete_at']);
                    $this->setId_tipo_trabajo($row['id_tipo_trabajo']);
                }
            }
        }
        $base->Cerrar();
        return $respuesta;
    }
        
    /** funcion para listar todas las imágenes
     * @return array
     * */
    public function listar(){
        $base=new BaseDatos();
        $consulta="SELECT * FROM imagenes;";
        $arregloImagenes=[];
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $row=$base->Registro();
                if($row){
                    do{
                        array_push($arregloImagenes, $row);
                    }while($row = $base->Registro());
                }
            }
        }
        $base->Cerrar();
        return $arregloImagenes;
    }

    /** funcion que me permite insertar una imagen
     * @return bool
     */
    public function insertar(){
        $agrega=false;
        $base=new BaseDatos();
        $consulta="INSERT INTO imagenes(dirUrl, titulo, alt, delete_at, id_tipo_trabajo) VALUES";
        $consulta.="('".$this->getDirUrl()."', '".$this->getTitulo()."', '".$this->getAlt()."', null, ".$this->getId_tipo_trabajo().");";
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

    /** Funcion que me permite modificar visibilidad de una Imagen
     * @return bool
     */
    public function modificar(){
        $base=new BaseDatos();
        $modifica=false;
        $consulta="UPDATE imagenes SET ";
        $consulta.="id=".$this->getIdImagen().", dirUrl='".$this->getDirUrl()."', titulo='".$this->getTitulo()."', alt='".$this->getAlt();
        if($this->getDelete_at()){
            $consulta.="', delete_at='".$this->getDelete_at()."'";
            }
        $consulta.="', id_tipo_trabajo=".$this->getId_tipo_trabajo()." WHERE id=".$this->getIdImagen();        
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
            $modifica=true;
            }
        }
        $base->Cerrar();
        return $modifica;
    }

    /** funcion que me permite eliminar una imagen
     * @param int $idImagen
     * @return bool
     */
    public function eliminar($idImagen){
        $base=new BaseDatos();
        $elimina=false;
        $consulta="DELETE FROM imagenes WHERE id=".$idImagen;
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
<?php
include_once 'BaseDatos.php';
class Imagen{
    //Atributos
    private $idImagen;
    private $dirUrl;
    private $titulo;
    private $alt;
    private $deleted_at;
    private $id_tipo_trabajo;

    //Método constructor
    public function __construct()
    {
        $this->idImagen=null;
        $this->dirUrl="";
        $this->titulo="";
        $this->alt="";
        $this->deleted_at=null;
        $this->id_tipo_trabajo=null;
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

    public function getDeleted_at(){
        return $this->deleted_at;
    }
    public function setDeleted_at($deleted_at){
        $this->deleted_at=$deleted_at;
    }

    public function getId_tipo_trabajo(){
        return $this->id_tipo_trabajo;
    }
    public function setId_tipo_trabajo($id_tipo_trabajo){
        $this->id_tipo_trabajo=$id_tipo_trabajo;
    }

    /** función para cargar una imágen
     */
    public function cargar($dirUrl, $titulo, $alt, $deleted_at, $tipoTrabajo){
        $this->setDirUrl($dirUrl);
        $this->setTitulo($titulo);
        $this->setAlt($alt);
        $this->setDeleted_at($deleted_at);
        $this->setId_tipo_trabajo($tipoTrabajo);
    }

    /** funcion que me permite buscar una imagen
     * @param int $idImagen
     * @return bool
     */
    public function buscar($idImagen){
        $base=new BaseDatos();
        $respuesta=false;
        $consulta="SELECT * FROM imagen WHERE id=".$idImagen.";";
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $row=$base->Registro();
                if($row){
                    $respuesta=true;
                    $this->setIdImagen($row['id']);
                    $this->setDirUrl($row['dirUrl']);
                    $this->setTitulo($row['titulo']);
                    $this->setAlt($row['alt']);
                    $this->setDeleted_at($row['deleted_at']);
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
        $consulta="SELECT * FROM imagen;";
        $arregloImagenes=[];
        if($base->iniciar()){
            if($base->Ejecutar($consulta)){
                $row=$base->Registro();
                if($row){
                    do{
                        $objImagen=new Imagen();
                        $objImagen->setIdImagen($row['id']);
                        $objImagen->setDirUrl($row['dirUrl']);
                        $objImagen->setTitulo($row['titulo']);
                        $objImagen->setAlt($row['alt']);
                        $objImagen->setDeleted_at($row['deleted_at']);
                        $objImagen->setId_tipo_trabajo($row['id_tipo_trabajo']);
                        array_push($arregloImagenes, $objImagen);
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
        $consulta="INSERT INTO imagen(dirUrl, titulo, alt, deleted_at, id_tipo_trabajo) VALUES";
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
        $consulta="UPDATE imagen SET ";
        $consulta.="id=".$this->getIdImagen().", dirUrl='".$this->getDirUrl()."', titulo='".$this->getTitulo()."', alt='".$this->getAlt();
        if($this->getDeleted_at()!=null){
            $consulta.="', deleted_at='".$this->getDeleted_at()."'";
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
        $consulta="DELETE FROM imagen WHERE id=".$idImagen;
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
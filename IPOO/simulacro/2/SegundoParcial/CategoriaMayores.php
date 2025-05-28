<?php
//Categoría mayores
class CategoriaMayores extends Categoria{
    //Atributo propio
    private $coefMayores;

    //Método constructor
    public function __construct($idcategoria, $descripcion)
    {
        //inicio los atributos de la clase padre
        parent::__construct($idcategoria, $descripcion);
        //inicio el atributo propio de la clase
        $this->coefMayores=0.27;
    }

    //método de acceso
    public function getCoefMayores(){
        return $this->coefMayores;
    }
    public function setCoefMayores($coeficiente){
        $this->coefMayores=$coeficiente;
    }

    //Método toString
    public function __toString()
    {
        $mayores = parent::__toString();
        $mayores.= "Coeficiente: ".$this->getCoefMayores()."\n";
        return $mayores; 
    }
}
?>
<?php
//Categoría juveniles
class CategoriaJuveniles extends Categoria{
    //Atributo propio
    private $coefJuveniles;

    //Método constructor
    public function __construct($idcategoria, $descripcion)
    {
        //inicio los atributos de la clase padre
        parent::__construct($idcategoria, $descripcion);
        //inicio el atributo propio de la clase
        $this->coefJuveniles=0.19;
    }

    //método de acceso
    public function getCoefJuveniles(){
        return $this->coefJuveniles;
    }
    public function setCoefJuveniles($coeficiente){
        $this->coefJuveniles=$coeficiente;
    }

    //Método toString
    public function __toString()
    {
        $juveniles = parent::__toString();
        $juveniles.= "Coeficiente: ".$this->getCoefJuveniles()."\n";
        return $juveniles; 
    }
}
?>
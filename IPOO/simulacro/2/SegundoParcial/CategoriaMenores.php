<?php
//Categoría menores
class CategoriaMenores extends Categoria{
    //Atributo propio
    private $coefMenores;

    //Método constructor
    public function __construct($idcategoria, $descripcion)
    {
        //inicio los atributos de la clase padre
        parent::__construct($idcategoria, $descripcion);
        //inicio el atributo propio de la clase
        $this->coefMenores=0.13;
    }

    //método de acceso
    public function getCoefMenores(){
        return $this->coefMenores;
    }
    public function setCoefMenores($coeficiente){
        $this->coefMenores=$coeficiente;
    }

    //Método toString
    public function __toString()
    {
        $menores = parent::__toString();
        $menores.= "Coeficiente: ".$this->getCoefMenores()."\n";
        return $menores; 
    }
}
?>
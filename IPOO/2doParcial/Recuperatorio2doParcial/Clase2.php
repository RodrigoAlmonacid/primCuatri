<?php
Class clase1{
    //Atributos
    private
    private
    private
    private


//Metodo constructor
public function __construct()
{
    $this->
    $this->
    $this->
    $this->
}

//metodos de acceso
public function getA(){
    return $this->
}
public function setA($){
    $this-> = 
}

public function getA(){
    return $this->
}
public function setA($){
    $this-> = 
}

public function getA(){
    return $this->
}
public function setA($){
    $this-> = 
}

public function getA(){
    return $this->
}
public function setA($){
    $this-> = 
}

public function getA(){
    return $this->
}
public function setA($){
    $this-> = 
}

//metodo toString
public function __toString()
{
    
}


/** funcion que compara si dos arreglos tienen los mismos datos
 * @param array arreglo1
 * @param array arreglo2
 * @return bool
 */
public function comparaArreglo($arreglo1, $arreglo2){
    $concidencia=false;
    $cantArr1=count($arreglo1);
    $cantArr2=count($arreglo2);
    $i=0;
    $j=0;
    do{
        if($arreglo1[$i]->getA() == $arreglo1[$j]->getA()){
            $concidencia=true;
        }
        $j++;
        if($j>=$cantArr2){
            $j=0;
            $i++;
        }
    }while(!$concidencia && $i<$cantArr1); 
return $concidencia;
}


}
?>
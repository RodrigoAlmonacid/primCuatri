<?php
//Ejercicio 3, modificacion de la clase libro
include_once "Persona.php";
class Libro{
    //Atributos
    private $isbn;
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $cantPaginas;
    private $sinopsis;
    private $autor;

    public function __construct($isbn, $titulo, $anioEdicion, $editorial, $cantPaginas, $sinopsis, $autor)
    {
        $this -> isbn = $isbn;
        $this -> titulo = $titulo;
        $this -> anioEdicion = $anioEdicion;
        $this -> editorial = $editorial;
        $this -> cantPaginas = $cantPaginas;
        $this -> sinopsis = $sinopsis;
        $this -> autor = $autor;
    }

    public function getIsbn(){
        return $this -> isbn;
    }
    public function setIsbn($isbn){
        $this -> isbn = $isbn;
    }

    public function getTitulo(){
        return $this -> titulo;
    }
    public function setTitulo($titulo){
        $this -> titulo -> $titulo;
    }

    public function getAnioEdicion(){
        return $this -> anioEdicion;
    }
    public function setAnioEdicion($anioEdicion){
        $this -> anioEdicion = $anioEdicion;
    }

    public function getEditorial(){
        return $this -> editorial;
    }
    public function setEditorial($editorial){
        $this -> editorial = $editorial;
    }

    public function getCantPaginas(){
        return $this -> cantPaginas;
    }
    public function setCantPaginas($cantPaginas){
        $this -> cantPaginas = $cantPaginas;
    }

    public function getSinopsis(){
        return $this -> sinopsis;
    }
    public function setSinopsis($sinopsis){
        $this -> sinopsis = $sinopsis;
    }

    public function getAutor(){
        return $this -> autor;
    }
    public function setAutor($autor){
        $this -> autor = $autor;
    }

    /** funcion que determina si un libro pertenece a una editorial dada
     * @param string $editorial
     * @return boolean
     */
    public function perteneceEditorial($editorial){
        $pertenece = false;
        if ($editorial == $this -> getEditorial()){
            $pertenece = true;
        }
        return $pertenece;
    }

    /** funcion que calcula los años que pasaron desde la edición del libro
     * @param int $anio
     * @return int
     */
    public function aniosDesdeEdicion($anio){
        $aniosDesde = $anio - $this -> getAnioEdicion();
        return $aniosDesde;
    }

    public function __toString()
    {
        $libro = "Libro:\nCódigo ISBN: ".$this -> getIsbn()."\nTítulo: ".$this -> getTitulo()."\nAño de edición: ".$this -> getAnioEdicion()."\nEditorial: ".$this -> getEditorial()."\nCantidad de páginas: ".$this -> getCantPaginas()."\nSinopsis: ".$this -> getSinopsis()."\nAutor: ".$this -> getAutor()."\n";
        return $libro;
    }

}
?>                    
<?php
class Torneo{
    //Atributos
    private $importe;
    private $colPartidos;

    //método constructor
    public function __construct($importe)
    {
        $this->importe = $importe;
        $this->colPartidos = [];
    }

    //Metodos de acceso
    public function getImporte(){
        return $this->importe;
    }
    public function setImporte($importe){
        $this->importe=$importe;
    }

    public function getColPartidos(){
        return $this->colPartidos;
    }
    public function setColPartidos($partidos){
        $this->colPartidos=$partidos;
    }

    //Método toString
    public function __toString()
    {
        $torneo = "Premio por torneo: $".$this->getImporte()."\n";
        $partidosIngresados = $this->getColPartidos();
        if(count($partidosIngresados)>0){
            foreach($partidosIngresados as $partido){
                $torneo .= $partido;
            }
        }
        else{
            $torneo .= "No se han ingresado partidos.\n";
        }
        return $torneo;
    }

    //Método para ingresar un partido
    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido){
        $incorpora = false;
        $partidos = $this->getColPartidos();
        $numeroPartido = count($partidos)+1;
        $cantJugE1 = $objEquipo1->getCantJugadores();
        $cantJugE2 = $objEquipo2->getCantJugadores();
        $catE1 = $objEquipo1->getObjCategoria();
        $catE2 = $objEquipo2->getObjCategoria();
        if($cantJugE1 === $cantJugE2 && $catE1 === $catE2){
            $incorpora = true;
            if($tipoPartido == 'futbol'){
                $objCategoria = new CategoriaMenores(1, 'furtbol, menores'); //Debería haber mas información, por ejemplo la edad del capitan para determinar el tipo de categotía
                $objPartido = new PartidoFutbol($numeroPartido, $fecha, $objEquipo1, 0, $objEquipo2, 0, $objCategoria);
                array_push($partidos, $objPartido);
                $this->setColPartidos($partidos);
            }
            elseif($tipoPartido == 'basquetbol'){
                $objPartido = new PartidoBasquet($numeroPartido, $fecha, $objEquipo1, 0, $objEquipo2, 0, 0, 0);
                array_push($partidos, $objPartido);
                $this->setColPartidos($partidos);
            }
        }
        return $incorpora;
    }

    
}
?>
<?php
/*10.c.
Diseñar e implementar la clase Fecha. La clase deberá disponer de los atributos mínimos y
necesarios para almacenar el día, el mes y el año, además de métodos que devuelvan un String con la
fecha en forma abreviada (16/02/2000) y extendida (16 de febrero de 2000) . Implementar una función
incremento, que reciba como parámetros un entero y una fecha, que retorne una nueva fecha, resultado
de incrementar la fecha recibida por parámetro en el numero de días definido por el parámetro entero.
Nota 1: Son años bisiestos los múltiplos de cuatro que no lo son de cien, salvo que lo sean de
cuatrocientos, en cuyo caso si son bisiestos.
Nota 2: Para la solución de este problema puede ser útil definir un método incrementa_un_dia.
*/
class Fecha {
    // Atributos de la clase
    private $dia;
    private $mes;
    private $anio;
    private $calendarioAnual;

public function __construct($dia, $mes, $anio)
{
    $this -> dia = $dia;
    $this -> mes = $mes;
    $this -> anio = $anio;
    $this -> calendarioAnual = $this -> calendario();
}    

public function getDia (){
    return $this -> dia;
}
public function setDia($dia){
    $this -> dia = $dia;
}

public function getMes (){
    return $this -> mes;
}
public function setMes($mes){
    $this -> mes = $mes;
}

public function getAnio (){
    return $this -> anio;
}
public function setAnio($anio){
    $this -> anio = $anio;
}
/** Función que devuelve una arreglo con los meses y total de días
 * @return array $calendarioAnual
*/
public function calendario(){
    $calendarioAnual[1] = ["enero", 31];
    $calendarioAnual[2] = ["febrero", 28];
    $calendarioAnual[3] = ["marzo", 31];
    $calendarioAnual[4] = ["abril", 30];
    $calendarioAnual[5] = ["mayo", 31];
    $calendarioAnual[6] = ["junio", 30];
    $calendarioAnual[7] = ["julio", 31];
    $calendarioAnual[8] = ["agosto", 31];
    $calendarioAnual[9] = ["septiembre", 30];
    $calendarioAnual[10] = ["octubre", 31];
    $calendarioAnual[11] = ["noviembre", 30];
    $calendarioAnual[12] = ["diciembre", 31];
    if (($this -> getAnio() % 400 == 0) || ($this -> getAnio() % 4 == 0 && $this -> getAnio() % 100 != 0)){
        $calendarioAnual[2][1] = 29;
    }
    return $calendarioAnual;
}
/** Función que aumenta una cantidad de días desde una fecha dada
 * @param INT $contador
 * @return array
 */
public function incremento ($incremento){
    $contador = 0;
    do{
        if ($this -> getDia() < $this -> calendario()[$this -> getMes()][1]){
            $this -> setDia($this -> getDia() + 1);
        }
        else {
            $this -> setDia(1);
            if ($this -> getMes() < 12){
                $this -> setMes($this -> getMes() + 1);
            }
            else{
                $this -> setMes(1);
                $this -> setAnio($this -> getAnio() +1);
        }
        }
        $contador = $contador + 1;
    }while ($contador != $incremento);
}

public function __toString()
{
    return "Fecha corta: (".$this -> getDia()."/".$this -> getMes()."/".$this ->getAnio().")\nFecha larga: ".$this -> getDia()." de ".$this -> calendario()[$this -> getMes()][0]." de ".$this -> getAnio()."\n";
}
}
?>


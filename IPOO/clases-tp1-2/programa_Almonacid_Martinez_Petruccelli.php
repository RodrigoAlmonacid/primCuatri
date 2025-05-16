<?php
include_once("memoria.php"); //Permite desde este código utilizar los datos almacenados en memoria.php
/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Almonacid Medina, Rodrigo Ulises. FAI-4968. Tecnicatura Universitaria en Administración de Sistemas y Software Libre.
 rodrigo.almonacid@est.fi.uncoma.edu.ar
 
 Martinez, Enrique. FAI-4766. Tecnicatura Universitaria en Administración de Sistemas y Software Libre.
 enrique.martinez@est.fi.uncoma.edu.ar
 
 Petruccelli, Gustavo Daniel. FAI-5107. Tecnicatura Universitaria en Administración de Sistemas y Software Libre.
 gustavo.petruccelli@est.fi.uncoma.edu.ar
* */

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/** función que carga y retorna una estructura con información de 10 juegos que se jugaron.
 * @return array
*/
function cargarJuegos(){
    // array $coleccionJuego
    $coleccionJuegos = [];
    $coleccionJuegos[0] = [ "jugador1" => "Cristian", "aciertos1" => 3, "jugador2" => "Luis", "aciertos2" => 1 ];
    $coleccionJuegos[1] = [ "jugador1" => "Luis", "aciertos1" => 2, "jugador2" => "Juan", "aciertos2" => 2 ];
    $coleccionJuegos[2] = [ "jugador1" => "Ana", "aciertos1" => 1, "jugador2" => "Pablo", "aciertos2" => 3 ];
    $coleccionJuegos[3] = [ "jugador1" => "Ariel", "aciertos1" => 3, "jugador2" => "Rodrigo", "aciertos2" => 1 ];
    $coleccionJuegos[4] = [ "jugador1" => "Gustavo", "aciertos1" => 2, "jugador2" => "Luis", "aciertos2" => 2 ];
    $coleccionJuegos[5] = [ "jugador1" => "Pedro", "aciertos1" => 1, "jugador2" => "Ana", "aciertos2" => 3 ];
    $coleccionJuegos[6] = [ "jugador1" => "Juan", "aciertos1" => 3, "jugador2" => "Diego", "aciertos2" => 1 ];
    $coleccionJuegos[7] = [ "jugador1" => "Valeria", "aciertos1" => 2, "jugador2" => "Alfredo", "aciertos2" => 2 ];
    $coleccionJuegos[8] = [ "jugador1" => "Daniela", "aciertos1" => 1, "jugador2" => "Juan", "aciertos2" => 3 ];
    $coleccionJuegos[9] = [ "jugador1" => "Pepe", "aciertos1" => 3, "jugador2" => "Gustavo", "aciertos2" => 1];
    return  $coleccionJuegos;
}
  
/** función que carga y muestra por pantalla el menú de opciones, solicita al usuario una opción
 * retorna la opción elegida, previamente validada
 * @return int
 */
function seleccionarOpcion(){    
    //Variables: int $numero
    echo "Menu de opciones: \n";
    echo "      1) Jugar a memoria \n";
    echo "      2) Mostrar un juego \n";
    echo "      3) Mostrar el primer juego ganador \n";
    echo "      4) Mostrar porcentaje de juegos ganados \n";
    echo "      5) Mostrar resumen de jugador \n";
    echo "      6) Mostrar listado de juegos ordenados por jugador 2 \n";
    echo "      7) Salir \n";
    echo "Ingrese un número según la opcion que desea: \n";
    $numero = trim(fgets(STDIN));
    while (!(is_numeric($numero) && is_int($numero + 0) && ($numero >= 1 && $numero <= 7))) {
        echo "OPCION INVALIDA\nEl número debe ser entre 1 y 7\n";
        echo "Menu de opciones: \n";
        echo "      1) Jugar a memoria \n";
        echo "      2) Mostrar un juego \n";
        echo "      3) Mostrar el primer juego ganador \n";
        echo "      4) Mostrar porcentaje de juegos ganados \n";
        echo "      5) Mostrar resumen de jugador \n";
        echo "      6) Mostrar listado de juegos ordenados por jugador 2 \n";
        echo "      7) Salir \n";
        echo "Ingrese un número según la opcion que desea: \n";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

/** función que busca un nombre en un arreglo con una estructura como la de $coleccionJuegos
 * @param array $arreglo
 * @param string $nombre
 * @return bool
 * */
function buscaNombre($arreglo, $nombre){
    //Variables: int $filas, $i, 
    //           bool $encontro
    $filas = count($arreglo);
    $i = 0; //Variable iteradora
    $encontro = FALSE;
    do {
        if (($arreglo[$i]["jugador1"] == $nombre) || ($arreglo[$i]["jugador2"] == $nombre)){
            //Ingresa si encuentra el nombre en alguna fila (jugador1 o jugador2)
            $encontro = TRUE;
        }
        $i++;
    } while (($i < $filas) && ($encontro == FALSE));
    return $encontro;
}

/** función que busca el primer juego ganado de un nombre dado
 * en caso de encontrar una victoria retorna el índice donde la halló
 * en caso de no encontrar victorias retorna -1
 * @param array $arreglo
 * @param string $nombre
 * @return int
 * */
function primeroGanado($arreglo, $nombre){
    //Variables: int $gana, $i, $tope
    $gana = -1;
    $i = 0; //Variable iteradora
    $tope = count($arreglo);
    do{
        if (($arreglo[$i]["jugador1"] == $nombre) && (($arreglo[$i]["aciertos1"]) > ($arreglo[$i]["aciertos2"]))){
            //Ingresa solamente si encuentra el nombre dado en jugador1 y este ganó ese juego
            $gana = $i;
        }
        elseif (($arreglo[$i]["jugador2"] == $nombre) && (($arreglo[$i]["aciertos2"]) > ($arreglo[$i]["aciertos1"]))){
            //Ingresa solamente si encuentra el nombre dado en jugador2 y este ganó ese juego
            $gana = $i;
        }
        $i = $i + 1; //Suma uno a la variable iteradora para poder recorrer las distintas líneas del arreglo
    } while (($gana == -1) && ($tope > $i)); //frena el bucle si recorrió todo el arreglo o si encontró una victoria del nombre dado
    return $gana; //retorna -1 si nadie ganó, o retorna el índice donde encontró la primer victoria 
}

/** función que muestra por pantalla el resultado de un juego determinado
 * @param array $arreglo
 * @param int $indice
 * */
function resultadoJuego($arreglo, $indice){
    echo "**************************************\n";
    if ($arreglo[$indice]["aciertos1"] > $arreglo[$indice]["aciertos2"]){
        //Muestra este encabezado si gana jugador1
        echo "Juego MEMORIA: ".($indice+1)." (Gana Jugador 1)\n";
    }
    elseif($arreglo[$indice]["aciertos1"] < $arreglo[$indice]["aciertos2"]){
        //Muestra este encabezado si gana jugador2
        echo "Juego MEMORIA: ".($indice+1)." (Gana Jugador 2)\n";
    }
    else{
        //Muestra este encabezado si hubo empate
        echo "Juego MEMORIA: ".($indice+1)." (Empate)\n";
    }
    //Se muestra el resto del resumen con los nombres en mayúscula
    echo "Jugador 1: ".strtoupper($arreglo[$indice]["jugador1"])." obtuvo ".$arreglo[$indice]["aciertos1"]." aciertos\n";
    echo "Jugador 2: ".strtoupper($arreglo[$indice]["jugador2"])." obtuvo ".$arreglo[$indice]["aciertos2"]." aciertos\n";
    echo "**************************************\n";
}

/** función que determina cuantas partidas se ganaron, sin importar quien ganó
 * retorna el número total de victorias
 * @param array $arreglo
 * @return int
*/
function victoriasTotales($arreglo){
    //Variables: int $total, $victorias, $i
    $total = count($arreglo);
    $victorias = 0; //Variable contadora
    for ($i = 0; $i < $total; $i++){
        //Recorrido exhaustivo del arreglo
        if (($arreglo[$i]["aciertos1"] <> $arreglo[$i]["aciertos2"])){
            //Ingresa si encuentra una victoria en la línea i, sin importar quien ganó
            $victorias = $victorias + 1;
        }
    }
    return $victorias;
}

/** función que determina victorias de un jugador determinado
 * El retorno será la cantidad de victorias del jugador1 o del jugador2, según se indique en el parámetro $eleccion
 * @param array $arreglo
 * @param int $eleccion
 * @return int
*/
function victoriasJugador($arreglo, $eleccion){
    //Variables: int $total, $victorias, $i
    $total = count($arreglo);
    $victorias = 0; //Variable contadora
    for ($i = 0; $i < $total; $i++){
        //Recorrido exhaustivo del arreglo
        if(($eleccion == 1) && ($arreglo[$i]["aciertos1"] > $arreglo[$i]["aciertos2"])){
            //Cuenta victorias del jugador1
            $victorias = $victorias + 1;
        }
        elseif ($eleccion == 2 && ($arreglo[$i]["aciertos1"] < $arreglo[$i]["aciertos2"])){
            //Cuenta victorias del jugador2
            $victorias = $victorias + 1;
        }
    }
    return $victorias;
}

/** función que retorna una estructura, según lo indicado, con el resumen de juegos de un nombre dado 
 * @param array $arreglo
 * @param string $nombre
 * @return array
 */
function resumenJugador($arreglo, $nombre){
    //Variables int $filas, $i
    //          array $resumen
    //$resumen es un arreglo asociativo unidimensional
    $filas = count($arreglo);
    $resumen["nombre"] = $nombre;
    $resumen["juegosGanados"] = 0; //Almacena el número de victorias del nombre dado
    $resumen["juegosPerdidos"] = 0; //Almacena el número de derrotas del nombre dado
    $resumen["juegosEmpatados"] = 0; //Almacena el número de empates del nombre dado
    $resumen["aciertosAcumulados"] = 0; //Almacena el número de aciertos del nombre dado, sin importar el resultado del juego
    for ($i = 0; $i < $filas; $i++){
        //Recorrido exhaustivo del arreglo
        if ($arreglo[$i]["jugador1"] == $nombre){
            //Ingresa si encuentra el nombre dado en jugador1 
            $resumen["aciertosAcumulados"] = $resumen["aciertosAcumulados"] + $arreglo[$i]["aciertos1"];
            if ($arreglo[$i]["aciertos1"] > $arreglo[$i]["aciertos2"]){
                //Ingresa si el nombre dado ganó el juego
                $resumen["juegosGanados"] = $resumen["juegosGanados"] + 1;
            }
            elseif ($arreglo[$i]["aciertos1"] < $arreglo[$i]["aciertos2"]){
                //Perdió
                $resumen["juegosPerdidos"] = $resumen["juegosPerdidos"] + 1;
            }
            else{
                //Empató
                $resumen["juegosEmpatados"] = $resumen["juegosEmpatados"] + 1;
            }
        }
        elseif ($arreglo[$i]["jugador2"] == $nombre){
            //Ingresa si encuentra el nombre dado en jugador2
            $resumen["aciertosAcumulados"] = $resumen["aciertosAcumulados"] + $arreglo[$i]["aciertos2"];
            if ($arreglo[$i]["aciertos1"] < $arreglo[$i]["aciertos2"]){
                //Ganó
                $resumen["juegosGanados"] = $resumen["juegosGanados"] + 1;
            }
            elseif ($arreglo[$i]["aciertos1"] > $arreglo[$i]["aciertos2"]){
                //Perdió
                $resumen["juegosPerdidos"] = $resumen["juegosPerdidos"] + 1;
            }
            else{
                //Empató
                $resumen["juegosEmpatados"] = $resumen["juegosEmpatados"] + 1;
            }
        }
    }
    return $resumen;
}

/** funcion que agrega una jugada y retorna el arreglo con la nueva jugada incorporada al final
 * @param array $arreglo
 * @param array $nuevoDato
 * @return array
 */
function agregarJuego($arreglo, $nuevoDato){
    array_push($arreglo, $nuevoDato); //array_push agrega el nuevoDato al final del arreglo
    return $arreglo;
}

/** función predefinida de php que compara cadenas de texto
 * devuelve 0 si son iguales
 * 1 si el primer texto es mayor al segundo (está después en el abecedario)
 * -1 si el primer texto es menor al segundo (está antes en el abecedario)
 * @param array $a
 * @param array $b
 * @return int
*/
function compararNombres($a, $b) {
    //Variable int $orden
    if ($a['jugador2'] == $b['jugador2']){
        $orden = 0;}
    elseif($a['jugador2'] < $b['jugador2']){
        $orden = -1;}
    else{
        $orden = 1;}
    return $orden;
    //return strcmp($a['jugador2'], $b['jugador2']);
}

/** función que ordena el arreglo según jugador 2
 * @param array $arreglo
*/
function ordenadora($arreglo){
    //Recorre un arreglo de manera exhaustiva, y lo ordena según lo indica el segundo argumento
    uasort($arreglo, 'compararNombres');
    // Mostrar el resultado
    print_r($arreglo);
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Variables int $opcion, $cantJuegos, $numero, $ganado, $jugador
//          array $juego, $arregloInicial, $resumenJugador
//          string $nombreJugador, $nombreResumen
//          float $porc
$arregloInicial = [];
$arregloInicial = cargarJuegos();

do {
    $opcion = seleccionarOpcion();
    //Swith con 7 opciones para el menú principal
    switch ($opcion) {
        case 1: 
            //Jugar a Memoria             
            $juego = jugarMemoria();
            $arregloInicial = agregarJuego($arregloInicial, $juego);
            $cantJuegos = count($arregloInicial);
            resultadoJuego($arregloInicial, ($cantJuegos - 1));
            break;
        case 2: 
            //Mostrar un juego
            $cantJuegos = count($arregloInicial);
            if($cantJuegos <> 0){
                echo "Ingrese un número entre 1 y ".$cantJuegos,":\n";
                $numero = solicitarNumeroEntre(1, $cantJuegos);
                resultadoJuego($arregloInicial, ($numero-1));
            }
            else 
                echo "No existen juegos cargados para ejecutar esta opción.\n";
                break;
        case 3: 
            // Mostrar el primer juego ganador
            $cantJuegos = count($arregloInicial);
            if($cantJuegos <> 0){    
                echo "Ingrese el nombre de jugador para visualizar su primer juego ganado. \n";
                $nombreJugador = ucfirst(strtolower(trim(fgets(STDIN))));
                if (buscaNombre($arregloInicial, $nombreJugador)){
                    $ganado = primeroGanado($arregloInicial, $nombreJugador);
                    if ( $ganado == -1)
                        echo "El jugador ".$nombreJugador." no ganó ningún juego.\n";
                    else{
                        resultadoJuego($arregloInicial, $ganado); 
                    } 
                }
                else 
                    echo $nombreJugador." no se encuentra en los datos de juego\n";
            }
            else 
                echo "No existen juegos cargados para ejecutar esta opción.\n";        
                break;

        case 4: 
            //Mostrar porcentaje de Juegos ganados
            $cantJuegos = count($arregloInicial);
            if($cantJuegos <> 0){  
                echo "Elija un número de jugador (1 o 2) para ver el porcentaje de victorias: ";
                $jugador = trim(fgets(STDIN));
                while (($jugador <> 1) && ($jugador <> 2)){
                    echo "Opción inválida. Por favor elija:\n1 para jugador 1\n2 para jugador 2\n";
                    $jugador = trim(fgets(STDIN));
                }
                $porc = victoriasTotales($arregloInicial);
                if ($porc <> 0){
                    $porc = (victoriasJugador($arregloInicial, $jugador) / $porc) * 100;
                    $porc = ((int)($porc * 100)) / 100;
                }
                echo "El jugador ".$jugador." ha obtenido ".$porc."% de victorias.\n";
            }    
            else 
                echo "No existen juegos cargados para ejecutar esta opción.\n";   
                break;    
        case 5: 
            //Mostrar resumen de Jugador
            $cantJuegos = count($arregloInicial);
            if($cantJuegos <> 0){
                echo "Ingrese un nombre de jugador para mostrar su resumen:\n";
                $nombreResumen = ucfirst(strtolower(trim(fgets(STDIN))));
                if (buscaNombre($arregloInicial, $nombreResumen)){
                    $resumenJugador = resumenJugador($arregloInicial, $nombreResumen);
                    echo "******************************************\n";
                    echo "Jugador: ".strtoupper($resumenJugador["nombre"])."\n";
                    echo "Ganó: ".$resumenJugador["juegosGanados"]." juegos\n";
                    echo "Perdió: ".$resumenJugador["juegosPerdidos"]." juegos\n";
                    echo "Empató: ".$resumenJugador["juegosEmpatados"]." juegos\n";
                    echo "Total de aciertos acumulados: ".$resumenJugador["aciertosAcumulados"]." aciertos\n";
                    echo "******************************************\n";
                }
                else
                    echo $nombreResumen." no se encuentra en los datos de juego\n";
            }
            else 
                echo "No existen juegos cargados para ejecutar esta opción.\n"; 
                break;             
        case 6: 
            //Mostrar listado de juegos Ordenado por jugador 2
            $cantJuegos = count($arregloInicial);
            if($cantJuegos <> 0){    
                ordenadora($arregloInicial);
            }
            else 
                echo "No existen juegos cargados para ejecutar esta opción.\n"; 
            break;
            
        case 7: 
            //Salir: : Sale del programa.
            echo "Usted eligio la opcion 7) Salir. \n";
            echo "Gracias por participar  \n";
            break;      
    }
} while ($opcion != 7);
?> 
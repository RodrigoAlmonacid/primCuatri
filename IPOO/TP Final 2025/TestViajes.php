<?php
include_once 'Persona.php';
include_once 'Pasajero.php';
include_once 'BaseDatos.php';
include_once 'Responsable.php';
include_once 'Viaje.php';
menu();
//Menú principal
function menu(){
    echo "Ingrese el número de la opcion que desea:\n";
    echo "**** MENU PRINCIPAL ****\n";
    echo "1) Empresa\n2) Viajes\n3) Pasajeros\n4) Responsables\n5) Salir\n";
    echo "Su eleccion: ";
    $eleccion=trim(fgets(STDIN));
    opcionesMenu($eleccion);
}
//Opciones del menú principal
function opcionesMenu($option){
    switch($option){
        case 1:
            echo "**** Empresa ****\n";
            $empresa=opcionesAccion();
            opcionesEmpresa($empresa);
            break;
        case 2:
            echo "**** Viajes ****\n";
            $viaje=opcionesAccion();
            opcionesViaje($viaje);
            break;
        case 3:
            echo "**** Pasajeros ****\n";
            $pasajero=opcionesAccion();
            opcionesPasajero($pasajero);
            break;
        case 4:
            echo "**** Responsables ****\n";
            $responsable=opcionesAccion();
            opcionesResponsables($responsable);
            break;
        case 5:
            break;
        default:
            echo "Error: opcion inválida!!!\n";
            menu();
    }
}
//Menú para cada una de las opciones del programa
function opcionesAccion(){
    echo "1) Buscar\n2) Ver \n3) Modificar\n4) Crear\n5) Eliminar\n6) Volver al menu principal\n";
    echo "Su Eleccion:\n";
    $eleccion=trim(fgets(STDIN));
    return $eleccion;
}
//Acciones para Empresas
function opcionesEmpresa($opcion){
    switch($opcion){
        case 1:
            $objEmpresa=new Empresa();
            echo "Ingrese un ID de empresa: ";
            $idEmpresa=trim(fgets(STDIN));
            $encuentra=$objEmpresa->buscar($idEmpresa);
            if($encuentra){
                echo $objEmpresa;
            }
            else{
                echo "No hemos encontrado la empresa con ID= ".$idEmpresa."\n";
            }
            opcionesMenu(1);
            break;
        case 2:
            $objEmpresa=new Empresa();
            echo "Las empresas registradas son:\n";
            $listarEmpresas=$objEmpresa->listar();
            foreach($listarEmpresas as $unaEmpresa){
                echo $unaEmpresa."**** ---------- ****\n";
            }
            opcionesMenu(1);
            break;
        case 3:
            $objEmpresa=new Empresa();
            echo "Recuerde que solo pordrá modificar el nombre y la dirección de la empresa.\n";
            echo "Ingrese un ID de empresa: ";
            $idEmpresa=trim(fgets(STDIN));
            $encuentra=$objEmpresa->buscar($idEmpresa);
            if($encuentra){
                echo "Modificará la empresa:\n".$objEmpresa."Está seguro? si/no\n";
                $seguro=trim(fgets(STDIN));
                if($seguro=="si"){
                    echo "Ingrese el nuevo nombre: ";
                    $nombre=ucwords(strtolower(trim(fgets(STDIN))));;
                    echo "Ingrese la nueva direccion: ";
                    $direccion=trim(fgets(STDIN));
                    $objEmpresa->cargar($nombre, $direccion);
                    $modifica=$objEmpresa->modificar($idEmpresa);
                    if($modifica){
                        echo "Empresa modificada con éxito\n";
                        $objEmpresa->buscar($idEmpresa);
                        echo $objEmpresa;
                    }
                    else{
                        echo "Hemos experimentado un error, intente nuevamente.\n";
                    }
                }
                else{
                    echo "Si no conoce el ID empresa puede ver todas las empresas en la opción 2.\n";
                }
            }
            else{
                echo "No hemos encontrado la empresa con ID= ".$idEmpresa."\n";
            }
            opcionesMenu(1);
            break;
        case 4:
            $objEmpresa=new Empresa();
            echo "Ingrese el nombre y la direccion de la nueva empresa.\nNombre: ";
            $nombre=ucwords(strtolower(trim(fgets(STDIN))));;
            echo "Dirección: ";
            $direccion=trim(fgets(STDIN));
            $objEmpresa->cargar($nombre, $direccion);
            $nuevaEmpresa=$objEmpresa->insertar();
            if($nuevaEmpresa){
                echo "Empresa agregada con éxito. Datos:\n";
                $cantidad=count($objEmpresa->listar());
                $objEmpresa->buscar($cantidad);
                echo $objEmpresa;
            }
            else{
                echo "Hemos experimentado un error, por favor vuelva a intetar.\n";
            }
            opcionesMenu(1);
            break;
        case 5:
            $objEmpresa=new Empresa();
            echo "Ingrese el ID de la empresa que desea eliminar: ";
            $idEmpresa=trim(fgets(STDIN));
            $encuentra=$objEmpresa->buscar($idEmpresa);
            if($encuentra){
                $arregloViaje=$objEmpresa->buscaViaje($idEmpresa);
                if(count($arregloViaje)==0){
                    $elimina=$objEmpresa->eliminar($idEmpresa);
                    if($elimina){
                        echo "Empresa eliminada con éxito.\n";
                    }
                    else{
                        echo "Hemos experimentado un error, virlva a intentar.\n";
                    }
                }
                else{
                    echo "No se puede realizar la acción, la empresa tiene los siguientes viajes asociados:\n";
                    foreach($arregloViaje as $unViaje){
                        echo $unViaje."**** ---------- ****\n";
                    }
                }
            }
            else{
                echo "No hemos encontrado una empresa con ID=".$idEmpresa."\n";
            }
            opcionesMenu(1);
            break;
        case 6:
            menu();
            break;
        default:
            echo "Opción inválida.\n";
            opcionesMenu(1);
            break;
    }
}
//Acciones para Viaje
function opcionesViaje($opcion){
    switch($opcion){
        case 1:
            $objViaje=new Viaje();
            echo "Ingrese el ID del viaje que desea buscar: ";
            $idViaje=trim(fgets(STDIN));
            $busqueda=$objViaje->buscar($idViaje, true);
            if($busqueda){
                echo $objViaje;
            }
            else{
                echo "No hemos encontrado el viaje con ID= ".$idViaje."\n";
            }
            opcionesMenu(2);
            break;
        case 2:
            $objViaje=new Viaje();
            echo "Los viajes registrados son:\n";
            $listarViaje=$objViaje->listar();
            foreach($listarViaje as $unViaje){
                echo $unViaje."**** ---------- ****\n";
            }
            opcionesMenu(2);
            break;
        case 3:
            $objViaje=new Viaje();
            echo "Ingrese el ID del viaje que desea modificar: ";
            $idViaje=trim(fgets(STDIN));
            $busca=$objViaje->buscar($idViaje, true);
            if($busca){
                echo "Recuerde que usted puede modificar: importe, destino, cantidad máxima de asientos, empresa, responsable y cargar pasajeros.\n";
                echo "Datos del viaje: ".$objViaje;
                echo "Si desea cargar pasajeros ingrese 1, si desea modificar los demás datos ingrese 2: ";
                $eleccion=trim(fgets(STDIN));
                if($eleccion==1){
                    echo "Ingrese el DNI del pasajero que desea ingresar al viaje ID ".$idViaje.": ";
                    $dniPasajero=trim(fgets(STDIN));
                    $objPasajero=new Pasajero();
                    $existePasajero=$objPasajero->buscar($dniPasajero);
                    if($existePasajero){//existe el pasajero en la base
                        $pasajerosCargados=$objViaje->pasajeroEnViaje($dniPasajero);
                        if(!$pasajerosCargados){//el pasajero no está en el viaje
                            $lugaresDis=$objViaje->getCantMaxPasajeros()-$objViaje->getCantidadActualPasaj();
                            if($lugaresDis>0){
                                $agrega=$objViaje->cargarPasajero($dniPasajero); 
                                if($agrega){
                                    echo "Pasajero agregado con éxito.\n";
                                }
                                else{
                                    echo "Hubo un error al cargar el pasajero, vuelva a intentar.\n";
                                }
                            }
                            else{
                                echo "No hay disponibilidad de asientos.\n";
                            }
                        }
                        else{
                            echo "El pasajero ya existe en el viaje.\n";
                        }
                    }
                    else{
                        echo "No existe el pasajero en nuestra base de datos, por favor creelo antes de continuar.\n";
                    }
                }
                else{//modifica los demas datos importe, destino, cantidad máxima de asientos, empresa, responsable
                    echo "Por favor ingrese los siguientes datos:\nImporte: ";
                    $importe=trim(fgets(STDIN));
                    echo "Destino: ";
                    $destino=trim(fgets(STDIN));
                    echo "Cantidad Máxima de asientos: ";
                    $cantAsientos=trim(fgets(STDIN));
                    echo "ID empresa encargada: ";
                    $empresa=trim(fgets(STDIN));
                    echo "DNI del responsable del viaje: ";
                    $dniResponsable=trim(fgets(STDIN));
                    $objEmpresa=new Empresa();
                    $encuentraEmpresa=$objEmpresa->buscar($empresa);
                    if(!$encuentraEmpresa){
                        echo "No existe una empresa con ese ID.\n";
                    }
                    $objResponsable=new Responsable();
                    $encuentraResponsable=$objResponsable->buscar($dniResponsable);
                    if(!$encuentraResponsable){
                        echo "No existe un responsable con ese dni.\n";
                    }
                    if($encuentraEmpresa && $encuentraResponsable){
                        $objViaje->cargar($importe, $destino, $cantAsientos, $empresa, $dniResponsable, $objResponsable->getNumEmpleado());
                        $modifica=$objViaje->modificar();
                        if($modifica){
                            echo "Viaje con ID ".$idViaje." modificado con éxito.\n";
                        }
                    }
                }
            }
            else{
                echo "No hemos encontrado un viaje con ID= ".$idViaje."\n";
            }
            opcionesMenu(2);
            break;
        case 4:
            $objViaje=new Viaje();
            echo "Por favor ingrese los siguientes datos:\nImporte: ";
            $importe=trim(fgets(STDIN));
            echo "Destino: ";
            $destino=trim(fgets(STDIN));
            echo "Cantidad Máxima de asientos: ";
            $cantAsientos=trim(fgets(STDIN));
            echo "ID empresa encargada: ";
            $empresa=trim(fgets(STDIN));
            echo "DNI del responsable del viaje: ";
            $dniResponsable=trim(fgets(STDIN));
            $objEmpresa=new Empresa();
            $encuentraEmpresa=$objEmpresa->buscar($empresa);
            if(!$encuentraEmpresa){
                echo "No existe una empresa con ese ID.\n";
            }
            $objResponsable=new Responsable();
            $encuentraResponsable=$objResponsable->buscar($dniResponsable);
            if(!$encuentraResponsable){
                echo "No existe un responsable con ese dni.\n";
            }
            if($encuentraEmpresa && $encuentraResponsable){
                $objViaje->cargar($importe, $destino, $cantAsientos, $empresa, $dniResponsable, $objResponsable->getNumEmpleado());
                $crea=$objViaje->insertar();
                if($crea){
                    echo "Viaje creado con éxito.\n";
                }
            }
            opcionesMenu(2);
            break;
        case 5:
            $objViaje=new Viaje();
            echo "Ingrese el ID del viaje que desea eliminar: ";
            $idViaje=trim(fgets(STDIN));
            $encuentra=$objViaje->buscar($idViaje, true);
            if($encuentra){
                echo "Eliminará el siguiente viaje:\n".$objViaje."Está seguro? si/no: ";
                $respuesta=trim(fgets(STDIN));
                if($respuesta=="si"){
                    $elimina=$objViaje->eliminar();
                    if($elimina){
                        echo "Viaje eliminado con éxito.\n";
                    }
                    else{
                        echo "No hemos podido eliminar el viaje.\n";
                    }
                }
            }
            else{
                echo "No hemos encontrado un viaje con ID=".$idViaje.".\n";
            }
            opcionesMenu(2);
            break;
        case 6:
            menu();
            break;
        default:
            echo "Opción inválida.\n";
            opcionesMenu(2);
            break;
        }
}
//Accedo a pasajeros
function opcionesPasajero($opcion){
    switch($opcion){
        case 1:
            $objPasajero=new Pasajero();
            echo "Ingrese el dni del pasajero que desea buscar: ";
            $pasajero=trim(fgets(STDIN));
            $encuentra=$objPasajero->buscar($pasajero);
            if($encuentra){
                echo $objPasajero;
            }
            else{
                echo "no hemos encontrado al pasajero.\n";
            }
            opcionesMenu(3);
            break;
        case 2:
            $objPasajero=new Pasajero();
            echo "Los pasajeros cargados son:\n";
            $pasajeros=$objPasajero->listar();
            if(count($pasajeros)!=0){
                foreach($pasajeros as $unPasajero){
                    echo $unPasajero."**** ---------- ****\n";
                }
            }
            else{
                echo "No hay pasajeros cargados.\n";
            }
            opcionesMenu(3);
            break;
        case 3:
            $objPasajero=new Pasajero();
            echo "Ingrese el DNI del pasajero que desea editar: ";
            $dniPasajero=trim(fgets(STDIN));
            $encuentra=$objPasajero->buscar($dniPasajero);
            if($encuentra){
                echo "El pasajero es:\n".$objPasajero;
                echo "Recuerde que podrá modificar el teléfono, nombre y apellido.\nNombre: ";
                $nombre=ucwords(strtolower(trim(fgets(STDIN))));;
                echo "Apellido: ";
                $apellido=ucwords(strtolower(trim(fgets(STDIN))));;
                echo "Teléfono: ";
                $telefono=trim(fgets(STDIN));
                $objPasajero->cargar($dniPasajero, $nombre, $apellido, $telefono);
                $modifica=$objPasajero->modificar();
                if($modifica){
                    echo "Pasajero actualizado con éxito.\n";
                }
                else {
                    echo "Algo salió mal al actualizar el pasajero.\n";
                }
            }
            opcionesMenu(3);
            break;
        case 4:
            $objPasajero=new Pasajero();
            echo "Ingrese el DNI del pasajero que desea crear.\nDNI: ";
            $dniPasajero=trim(fgets(STDIN));
            $encuentra=$objPasajero->buscar($dniPasajero);
            if(!$encuentra){
                $objPersona=new Persona();
                $buscaPersona=$objPersona->buscar($dniPasajero);
                if(!$buscaPersona){
                    echo "Ingrese Nombre: ";
                    $nombre=ucwords(strtolower(trim(fgets(STDIN))));
                    echo "Ingrese Apellido: ";
                    $apellido=ucwords(strtolower(trim(fgets(STDIN))));
                    echo "Ingrese teléfono: ";
                    $telefono=trim(fgets(STDIN));
                    $objPasajero->cargarPasajero($dniPasajero, $nombre, $apellido, $telefono);                    
                    $pasajero=$objPasajero->insertar();
                    if($pasajero){
                        echo "Pasajero creado con éxito.\n";
                    }
                    else{
                        echo "No hemos podido crear el pasajero.\n";
                    }
                }
                else{
                    echo "Hemos encontrado a la siguiente persona:\n".$objPersona."Ingrese el teléfono: ";
                    $telefono=trim(fgets(STDIN));
                    $objPasajero->setTelefono($telefono);
                    $crea=$objPasajero->insertar();
                    if($crea){
                        echo "Pasajero creado con éxito.\n";
                    }
                    else{
                        echo "Hubo un error al intentar crear el usuario.\n";
                    }
                }
            }
            else{
                echo "El pasajero ya existe.\n";
            }
            opcionesMenu(3);
            break;
        case 5:
            $objPasajero=new Pasajero();
            echo "Ingrese el DNI de la persona que desea eliminar.\nDNI: ";
            $dniPasajero=trim(fgets(STDIN));
            $encuentra=$objPasajero->buscar($dniPasajero);
            if($encuentra){
                echo "Usted eliminará el siguiente pasajero:\n".$objPasajero."Está seguro? si/no: ";
                $respuesta=strtolower(trim(fgets(STDIN)));
                if($respuesta=="si"){
                    $elimina=$objPasajero->eliminar();
                    if($elimina){
                        echo "Pasajero eliminado con éxito.\n";
                    }
                    else{
                        echo "Hubo un error al intentar eliminar el usuario.\n";
                    }
                }
            }
            else{
                echo "No hemos encontrado un pasajero con DNI = ".$dniPasajero."\n";
            }
            opcionesMenu(3);
            break;
        case 6:
            menu();
            break;
        default:
            echo "Opción inválida.\n";
            opcionesMenu(3);
            break;
    }
}
//Accedo a responsables
function opcionesResponsables($opcion){
    switch($opcion){
        case 1:
            $objResponsable=new Responsable();
            echo "Ingrese el dni del responsable que desea buscar: ";
            $responsable=trim(fgets(STDIN));
            $encuentra=$objResponsable->buscar($responsable);
            if($encuentra){
                echo $objResponsable;
            }
            else{
                echo "no hemos encontrado al responsable.\n";
            }
            opcionesMenu(4);
            break;
        case 2:
            $objResponsable=new Responsable();
            echo "Los responsables cargados son:\n";
            $responsables=$objResponsable->listar();
            if(count($responsables)!=0){
                foreach($responsables as $unResponsable){
                    echo $unResponsable."**** ---------- ****\n";
                }
            }
            else{
                echo "No hay responsables cargados.\n";
            }
            opcionesMenu(4);
            break;
        case 3:
            $objResponsable=new Responsable();
            echo "Ingrese el DNI del responsable que desea editar: ";
            $dniResponsable=trim(fgets(STDIN));
            $encuentra=$objResponsable->buscar($dniResponsable);
            if($encuentra){
                echo "El responsable es:\n".$objResponsable;
                echo "Recuerde que podrá modificar el número de licencia, nombre y apellido.\nNombre: ";
                $nombre=ucwords(strtolower(trim(fgets(STDIN))));
                echo "Apellido: ";
                $apellido=ucwords(strtolower(trim(fgets(STDIN))));
                echo "Número de licencia: ";
                $numLicencia=trim(fgets(STDIN));
                $objResponsable->cargar($dniResponsable, $nombre, $apellido, $numLicencia);
                $modifica=$objResponsable->modificar();
                if($modifica){
                    echo "Responsable actualizado con éxito.\n";
                }
                else {
                    echo "Algo salió mal al actualizar el responsable.\n";
                }
            }
            opcionesMenu(4);
            break;
        case 4:
            $objResponsable=new Responsable();
            echo "Ingrese el DNI del responsable que desea crear.\nDNI: ";
            $dniResponsable=trim(fgets(STDIN));
            $encuentra=$objResponsable->buscar($dniResponsable);
            if(!$encuentra){
                $objPersona=new Persona();
                $buscaPersona=$objPersona->buscar($dniResponsable);
                if(!$buscaPersona){
                    echo "Recuerde que el número de empleado se genera autoáticamente.\nIngrese Nombre: ";
                    $nombre=ucwords(strtolower(trim(fgets(STDIN))));
                    echo "Ingrese Apellido: ";
                    $apellido=ucwords(strtolower(trim(fgets(STDIN))));
                    echo "Ingrese número de licencia: ";
                    $numLicencia=trim(fgets(STDIN));
                    $objResponsable->cargarResponsable($dniResponsable, $nombre, $apellido, $numLicencia);                    
                    $crea=$objResponsable->insertar();
                }
                else{
                    echo "Hemos encontrado a la siguiente persona:\n".$objPersona."Ingrese el número de licencia: ";
                    $numLicencia=trim(fgets(STDIN));
                    $objResponsable->setNumLicencia($numLicencia);
                    $crea=$objResponsable->insertar();
                }
                if($crea){
                        echo "Responsable creado con éxito.\n";
                    }
                    else{
                        echo "Hubo un error al intentar crear el responsable.\n";
                    }
            }
            else{
                echo "El responsable ya existe.\n";
            }
            opcionesMenu(4);
            break;
        case 5:
            $objResponsable=new Responsable();
            echo "Ingrese el DNI del responsable que desea eliminar.\nDNI: ";
            $dniResponsable=trim(fgets(STDIN));
            $encuentra=$objResponsable->buscar($dniResponsable);
            if($encuentra){
                echo "Usted eliminará el siguiente responsable:\n".$objResponsable."Está seguro? si/no: ";
                $respuesta=strtolower(trim(fgets(STDIN)));
                if($respuesta=="si"){
                    $elimina=$objResponsable->eliminar();
                    if($elimina){
                        echo "Responsable eliminado con éxito.\n";
                    }
                    else{
                        echo "Hubo un error al intentar eliminar el responsable.\n";
                    }
                }
            }
            else{
                echo "No hemos encontrado un responsable con DNI = ".$dniResponsable."\n";
            }
            opcionesMenu(4);
            break;
        case 6:
            menu();
            break;
        default:
            echo "Opción inválida.\n";
            opcionesMenu(3);
            break;
    }
}
?>
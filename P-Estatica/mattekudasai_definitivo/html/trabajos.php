<?php
include_once '../php/Imagen.php';
$objImagen=new Imagen();
$arregloImg=$objImagen->listar();
$arregloImg1 = [];
$arregloImg2 = [];
$arregloImg3 = [];
$arregloImg4 = [];
$arregloImg5 = [];
foreach($arregloImg as $imagen){
    if($imagen->getId_tipo_trabajo()==1){
        array_push($arregloImg1, $imagen);
    }
    else if($imagen->getId_tipo_trabajo()==2){
        array_push($arregloImg2, $imagen);
    }
    else if($imagen->getId_tipo_trabajo()==3){
        array_push($arregloImg3, $imagen);
    }
    else if($imagen->getId_tipo_trabajo()==4){
        array_push($arregloImg4, $imagen);
    }
    else if($imagen->getId_tipo_trabajo()==5){
        array_push($arregloImg5, $imagen);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../imagenes/matteIcono.ico" type="image/x-ico">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.js"></script>

    </head>

    <body>
        <header>
            <div class="row">
                <div class="col-4">
                    <img src="../imagenes/MATTEKUDASAI2.png" alt="LOGO" class="img-fluid">
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <h1>Mattekudasai Servicios</h1>
                        </div>
                        <div class="col-12">
                            <ul class="nav justify-content-end">
                                <li class="nav-item"><a class="nav-link" href="index.html">Inicio</a></li>
                                <li class="nav-item"><a class="nav-link" href="servicios.html">Servicios</a></li>
                                <li class="nav-item"><a class="nav-link" href="trabajos.php">Trabajos</a></li>
                                <li class="nav-item"><a class="nav-link" href="cotizador.html">Cotizador</a></li>
                                <li class="nav-item"><a class="nav-link" href="contacto.html">Contactanos</a></li>
                                <li class="nav-item"><a class="nav-link" href="valoracion.html">Valoranos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="seccion" >
            <h2>Arreglos</h2>
            <div id="carouselArreglos" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php    
                        foreach($arregloImg1 as $index => $imagen){
                    ?>
                            <div class="carousel-item <?= $index===0 ? 'active' : '' ?> ">
                                <img src=" <?= $imagen->getDirUrl() ?> " class="d-block w-100" alt=" <?= $imagen->getAlt() ?>'">
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselArreglos" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselArreglos" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
        <div class="seccion" >
            <h2>Impermeabilizante</h2>
            <div id="carouselImpermeabilizante" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php    
                        foreach($arregloImg2 as $index => $imagen){
                    ?>
                            <div class="carousel-item <?= $index===0 ? 'active' : '' ?> ">
                                <img src=" <?= $imagen->getDirUrl() ?> " class="d-block w-100" alt=" <?= $imagen->getAlt() ?>'">
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselImpermeabilizante" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselImpermeabilizante" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
        <div class="seccion" >
            <h2>Madera</h2>
            <div id="carouselMadera" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php    
                        foreach($arregloImg3 as $index => $imagen){
                    ?>
                            <div class="carousel-item <?= $index===0 ? 'active' : '' ?> ">
                                <img src=" <?= $imagen->getDirUrl() ?> " class="d-block w-100" alt=" <?= $imagen->getAlt() ?>'">
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselMadera" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselMadera" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
        <div class="seccion" >
            <h2>Pared Dañada</h2>
            <div id="carouselParedDanada" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php    
                        foreach($arregloImg4 as $index => $imagen){
                    ?>
                            <div class="carousel-item <?= $index===0 ? 'active' : '' ?> ">
                                <img src=" <?= $imagen->getDirUrl() ?> " class="d-block w-100" alt=" <?= $imagen->getAlt() ?>'">
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselParedDanada" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselParedDanada" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
        <div class="seccion" >
            <h2>Pintura Sobre Color</h2>
            <div id="carouselPinturaSobreColor" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php    
                        foreach($arregloImg5 as $index => $imagen){
                    ?>
                            <div class="carousel-item <?= $index===0 ? 'active' : '' ?> ">
                                <img src=" <?= $imagen->getDirUrl() ?> " class="d-block w-100" alt=" <?= $imagen->getAlt() ?>'">
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselPinturaSobreColor" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselPinturaSobreColor" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
    </body>
</html>
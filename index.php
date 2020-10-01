<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="admin/css/styles1.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <title>Rica Cocina</title>
</head>

<body>
    <?php
        include('admin/conexion.php');
        session_start();
        if(!isset($_SESSION['rol'])){
            include 'includes/header-idx.php';
        }else{
            if($_SESSION['rol'] !=1 ){
                if($_SESSION['rol'] =2 ){
                    include 'includes/header-user.php';
                }else {
                    include 'includes/header-idx.php';
                }
            }else {
                include 'includes/header-admin.php';
            }            
        }
    ?>
    <section class="sldier">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 sli-img" src="img/slider-06.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sli-img" src="img/slider-07.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sli-img" src="img/slider-08.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sli-img" src="img/slider-01.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sli-img" src="img/slider-02.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section class="contenedor">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-3 buscador">
                <form action="#">
                    <input type="text" placeholder="Buscar" class="buscar">
                    <button class="boton-buscar" type="submit">
                            <img src="img/buscar.svg">
                        </button>
                </form>
            </div>
        </div>
    </section>
    <main class="seccion contenedor">
        <div class="row">
            <div class="col-12 md-2 top">
                <h1>Top Recetas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 md-2 top">
                <div class="conenedor-recetas">
                    <?php 
                        $sel = $conn ->query("SELECT re.recetaid, re.imagen,re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid ORDER BY re.votacionacomulada DESC LIMIT 3");
                                
                        while ($row=$sel->fetch_array()) {
                    ?>
                    <div class="tarjetas">
                        <a href="vistas/receta-individual/mostrar-receta.php?recetaid=<?php echo $row[0] ?>" style="text-decoration: none">
                            <div class="tarjeta-img">
                                <!--<img class="tarjeta-img" src="../img/fideos.jpg" class="" alt="...">-->
                                <img class="tarjeta-img tam-img" src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $row['imagen'] ) ?>">
                                
                            </div>
                            <div class="tarjeta-info">
                                <h3 class="card-title"><?php echo $row[2] ?></h3>
                                <p class="card-text">Por: <?php echo $row[3]?></p>
                                <p class="card-text"> Puntaje: <?php echo $row[4]?></p>
                            </div>
                        </a>
                    </div>
                    <?php	
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="bgcolor">
        <div class="contenedor contenedor-footer">
            <div class="row footer-centrar py-4 d-flex align-items-center">
                <div class="col-2">
                    <h4 class="copy">Todos los Derechos Reservador 2020 &copy;</h4>
                </div>

                <div class="col-8 footer-img align-items-center">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#"><img class="mx-auto" src="img/twitter.svg" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><img class="mx-auto" src="img/facebook.svg" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><img class="mx-auto" src="img/instagram.svg" alt=""></a>
                        </li>
                    </ul>

                </div>
                <div class="col-2">
                    <a style="text-decoration: none" href="vistas/contacto/contacto.php"><h2>Contáctenos</h2></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
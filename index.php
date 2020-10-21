<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="admin/css/styles1.css">
    <link rel="stylesheet" href="vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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

        if(isset($_GET['estado'])){
            $estado=$_GET['estado'];
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
                        $sel = $conn ->query("SELECT re.recetaid, re.imagen,re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid WHERE validar='2' ORDER BY re.votacionacomulada DESC LIMIT 5");
                                
                        while ($row=$sel->fetch_array()) {
                    ?>
                    <div class="tarjetas">
                        <a href="vistas/receta-individual/mostrar-receta.php?recetaid=<?php echo $row[0] ?>"
                            style="text-decoration: none">
                            <div class="tarjeta-img">
                                <!--<img class="tarjeta-img" src="../img/fideos.jpg" class="" alt="...">-->
                                <img class="tarjeta-img tam-img"
                                    src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $row['imagen'] ) ?>">

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
    <div class="row seccion contenedor">
        <div class="row">
            <div class="col-12 md-2 tit-busc">
                <h1>Buscar Recetas</h1>
            </div>
        </div>
        <div class="contenedor">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-3 buscador busc">
                    <form action="index.php" method="POST">
                        <input type="text" name="buscar" placeholder="Buscar" class="buscar">
                        
                        <button class="boton-buscar" type="submit" value="buscar">
                            <img src="img/buscar.svg">
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="conenedor-recetas">
                <?php include 'buscador.php'; ?>
                <?php if(!isset($_SESSION['msg'])) : ?>
                    <?php
                        while ($receta = $sql_query->fetch_object()) :
                    ?>
                    <div class="tarjetas">
                        <a href="vistas/receta-individual/mostrar-receta.php?recetaid=<?= $receta->recetaid ?>"
                            style="text-decoration: none">
                            <div class="tarjeta-img">
                                <!--<img class="tarjeta-img" src="../img/fideos.jpg" class="" alt="...">-->
                                <img class="tarjeta-img tam-img"
                                    src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $receta->imagen ) ?>">

                            </div>
                            <div class="tarjeta-info">
                                <h3 class="card-title"><?= $receta->titulo; ?></h3>
                                <p class="card-text">Por: <?= $receta->nombres; ?></p>
                                <p class="card-text"> Puntaje: <?= $receta->votacionacomulada; ?></p>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if(isset($renderizar) && $renderizar == true) : ?>
                <div><?php $paginacion->render(); ?></div>
    <?php endif; ?>
    <br/>
    
    <footer class="footer py-4 bgcolor">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 text-lg-left text-center">Copyright © Rica 2020</div>
                <div class="col-lg-6 my-3 my-lg-0 text-lg-center text-center">
                    <a class="btn btn-social mx-3" href="#!"><i class="fab fa-twitter"><img class="mx-auto"
                                src="<?php echo $URL ?>img/twitter.svg" style="max-width: 75%"></i></a>
                    <a class="btn btn-social mx-3" href="#!"><i class="fab fa-facebook-f"><img class="mx-auto"
                                src="<?php echo $URL ?>img/facebook.svg" style="max-width: 75%"></i></a>
                    <a class="btn btn-social mx-3" href="#!"><i class="fab fa-linkedin-in"><img class="mx-auto"
                                src="<?php echo $URL ?>img/instagram.svg" style="max-width: 75%"></i></a>
                </div>
                <div class="col-lg-3 text-lg-center text-center contac">
                    <h3><a href="<?php echo $URL ?>vistas/contacto/contacto.php">Contáctenos</a></h3>
                </div>
            </div>
        </div>
    </footer>

    <?php
    if(isset($estado)){
    ?>

    <script>
        Swal.fire({
            title: '¡Bienvenido de nuevo!',
            text: 'Disfruta de más recetas',
            icon: 'success',
            confirmButtonText: 'OK'
        })
    </script>

    <?php
    }
    ?>

<?php
        if(isset($_SESSION['msg']) && $_SESSION['msg'] == '1') :
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Observación!',
                text: 'No hubo resultados',
                confirmButtonText: "Aceptar",
                
            })
            .then(resultado => {
                    if (resultado.value) {
                        // Hicieron click en "Sí"
                        //console.log("se elimina la venta");
                        // window.location.href="mis_recetas.php"
                    } 
            });
        </script>

        <?php $_SESSION['msg'] = null; ?>

    <?php endif; ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- <script src="vistas/js/paginacion.js"></script> -->
    
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../admin/css/estilo.css">
    <title>Rica Cocina</title>
</head>

<body>
    <?php
        include('../admin/conexion.php');
    ?>


    <header class="site-header" id="nav">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="../index.html">
                    <img src="../img/logo-rica-cociona3.png" class="logo">
                </a>
                <nav class="navegacion">
                    <a href="#">Recetas</a>
                    <a href="#">Registrate</a>
                    <a href="#">Inicia Sesión</a>
                </nav>
            </div>
        </div>

        <div class="container text-center mt-4">
            <div>
                <h1>Ingresar Utensilios</h1>
            </div>
            <div class="col-md-12">
                <?php 
                              $sel = $conn ->query("SELECT re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid ");
                            
                      		 while ($row=$sel->fetch_array()) {
                            ?>
                <div class="card" style="width: 18rem;">
                    <img src="../img/logo-rica-cociona2.png" class="" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row[0] ?></h5>
                        <p class="card-text"><?php echo $row[1]?></p>
                        <p class="card-text"> Puntaje: <?php echo $row[2]?></p>

                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <?php	
                          }
                          ?>
            </div>
            <div>

                <footer class="bgcolor">
                    <div class="contenedor contenedor-footer">
                        <div class="row footer-centrar py-4 d-flex align-items-center">
                            <div class="col-2">
                                <h4>Todos los Derechos Reservador 2020 &copy;</h4>
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
                                <h2>Contáctenos</h2>
                            </div>
                        </div>
                    </div>
                </footer>

                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                    crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                    crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                    crossorigin="anonymous"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../admin/css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../admin/css/style.css">
    <title>Rica Cocina</title>
</head>

<body>
    <?php
        include('../admin/conexion.php');
    ?>


    <header class="site-header" id="nav">
        <div class="container contenido-header">
            <nav class="navbar navbar-expand-lg navbar-light navegacion">
                <div class="col-sm-4">
                    <a class="navbar-brand" href="../index.html">
                        <img src="../img/logo-rica-cociona3.png" class="logo" alt="Logotipo de Rica Cocina">
                    </a>
                </div>
                <button class="navbar-toggler bt-color" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-sm-8">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <a href="vistas/recetas.php">Recetas</a>
                            <a href="Usuario/form_usuario.php">Registrar</a>
                            <a href="vistas/login/iniciar_sesion.php">Inicia Sesión</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
        <div class="row text-center">
            <nav class="col-md-3" id="nav-recetas">
                <form action="recetas.php" name="add_form" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <label for="" class="lbl-form-receta">País: </label>
                        <select name="ocacion" id="ocacion" class="form-control">
                            <option value="0" select-hidden disabled>-Seleccione-</option>
                            <option value="desayuno">Desayuno</option>
                            <option value="almuerzo">Almuerzo</option>
                            <option value="cena">Cena</option>
                        </select>
                        <label for="" class="lbl-form-receta">País: </label>
                        <select name="ocacion" id="ocacion" class="form-control">
                            <option value="0" select-hidden disabled>-Seleccione-</option>
                            <option value="desayuno">Desayuno</option>
                            <option value="almuerzo">Almuerzo</option>
                            <option value="cena">Cena</option>
                        </select>
                        <label for="" class="lbl-form-receta">País: </label>
                        <select name="ocacion" id="ocacion" class="form-control">
                            <option value="0" select-hidden disabled>-Seleccione-</option>
                            <option value="desayuno">Desayuno</option>
                            <option value="almuerzo">Almuerzo</option>
                            <option value="cena">Cena</option>
                        </select>
                    </fieldset>
                    <input type="submit" value="Filtrar" class="boton boton-rojo form-control">
                </form>
            </nav><!-- Nav -->
            <div class="col-md-9">
                <div>
                    <h1>Recetas</h1>
                </div>
                <div class="conenedor-recetas">
                    <?php 
                        $sel = $conn ->query("SELECT re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid ");
                                
                        while ($row=$sel->fetch_array()) {
                    ?>
                    <div class="tarjetas">
                        <a href="#" style="text-decoration: none">
                            <div class="tarjeta-img">
                                <img class="tarjeta-img" src="../img/fideos.jpg" class="" alt="...">
                            </div>
                            <div class="tarjeta-info">
                                <h3 class="card-title"><?php echo $row[0] ?></h3>
                                <p class="card-text">Por: <?php echo $row[1]?></p>
                                <p class="card-text"> Puntaje: <?php echo $row[2]?></p>
                            </div>
                        </a>
                    </div>
                    <?php	
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    <footer class="bgcolor">
        <div class="contenedor contenedor-footer">
            <div class="row footer-centrar py-4 d-flex align-items-center">
                <div class="col-2">
                    <h4 class="copy">Todos los Derechos Reservador 2020 &copy;</h4>
                </div>

                <div class="col-8 footer-img align-items-center">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#"><img class="mx-auto" src="../img/twitter.svg" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><img class="mx-auto" src="../img/facebook.svg" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><img class="mx-auto" src="../img/instagram.svg" alt=""></a>
                        </li>
                    </ul>

                </div>
                <div class="col-2">
                    <a style="text-decoration: none" href="contacto/contacto.php"><h2>Contáctenos</h2></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"crossorigin="anonymous"></script>
</body>

</html>
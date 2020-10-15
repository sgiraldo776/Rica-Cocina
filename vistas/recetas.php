    <?php
        include('../admin/conexion.php');
        session_start();
        if(!isset($_SESSION['rol'])){
            include '../includes/header-idx.php';
        }else{
            if($_SESSION['rol'] !=1 ){
                if($_SESSION['rol'] =2 ){
                    include '../includes/header-user.php';
                }else {
                    include '../includes/header-idx.php';
                }
            }else {
                include '../includes/header-admin.php';
            }            
        }

        $sql="SELECT"
    ?>
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

        <div class="row text-center">
            <nav class="col-md-3" id="nav-recetas">
                <form action="recetas.php" name="add_form" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <label for="" class="lbl-form-receta">Tipo Comida: </label>
                        <select name="tipocomida" id="tipocomida" class="form-control">
                            <option value="0">-Seleccione-</option>
                            <?php 
                                $sel = $conn ->query("SELECT * FROM tbltipocomida");
                            
                      		    while ($row=$sel->fetch_array()) {
                                ?>
                                <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                <?php	
                                }
                                ?>
                        </select>
                        <label for="" class="lbl-form-receta">Tipo de Dieta: </label>
                        <select name="tipodieta" id="tipodieta" class="form-control">
                            <option value="0">-Seleccione-</option>
                            <?php 
                                             $sel = $conn ->query("SELECT * FROM tbltipodieta");
                            
                      		                while ($row=$sel->fetch_array()) {
                                            ?>
                                            <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                            <?php	
                                            }
                                            ?>
                        </select>
                        <label for="" class="lbl-form-receta">Tipo Receta: </label>
                        <select name="tiporeceta" id="tiporeceta" class="form-control">
                            <option value="0">-Seleccione-</option>
                            <option value="Indefinido">Indefinido</option>
                            <option value="Plato">Plato</option>
                            <option value="Postre">Postre</option>
                            <option value="Bebida">Bebida</option>
                            <option value="Snack">Snack</option>
                        </select>
                        <label for="" class="lbl-form-receta">Padecimiento: </label>
                        <select name="padecimiento" id="padecimiento" class="form-control">
                        <option value="0">-Seleccione-</option>
                                <?php 
                                    $sel = $conn ->query("SELECT * FROM tblpadecimiento");
                            
                      		        while ($row=$sel->fetch_array()) {
                                    ?>
                                    <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                    <?php	
                                    }
                                    ?>
                        </select>
                        <label for="" class="lbl-form-receta">Ocación: </label>
                        <select name="ocacion" id="ocacion" class="form-control">
                            <option value="0">-Seleccione-</option>
                            <option value="cualquiera">Cualquiera</option>
                            <option value="desayuno">Desayuno</option>
                            <option value="almuerzo">Almuerzo</option>
                            <option value="cena">Cena</option>
                        </select>
                        <label for="" class="lbl-form-receta">País: </label>
                        <select name="pais" id="pais" class="form-control">
                            <option value="0">-Seleccione-</option>
                                <?php 
                                 $sel = $conn ->query("SELECT * FROM tblpais");
                            
                      		    while ($row=$sel->fetch_array()) {
                                ?>
                                <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                <?php	
                                }
                                ?>
                        </select>
                    </fieldset>
                    <input type="submit" value="Filtrar" class="boton boton-rojo form-control">
                </form>
            </nav><!-- Nav -->
            <div class="col-md-9">
                <div>
                    <h1>Recetas</h1>
                </div>
                <div class="conenedor-recetas" id="agrega-registros">
                </div>
                <ul class="pagination justify-content-center" id="pagination"></ul>
            </div>
        </div>

        <footer class="footer py-4 bgcolor">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 text-lg-left text-center">Copyright © Rica 2020</div>
                <div class="col-lg-6 my-3 my-lg-0 text-lg-center text-center">
                    <a class="btn btn-social mx-3" href="#!"><i class="fab fa-twitter"><img class="mx-auto" src="<?php echo $URL ?>img/twitter.svg" style="max-width: 75%"></i></a>
                    <a class="btn btn-social mx-3" href="#!"><i class="fab fa-facebook-f"><img class="mx-auto" src="<?php echo $URL ?>img/facebook.svg" style="max-width: 75%"></i></a>
                    <a class="btn btn-social mx-3" href="#!"><i class="fab fa-linkedin-in"><img class="mx-auto" src="<?php echo $URL ?>img/instagram.svg" style="max-width: 75%"></i></a>
                </div>
                <div class="col-lg-3 text-lg-center text-center contac">
                    <h3><a href="<?php echo $URL ?>vistas/contacto/contacto.php">Contáctenos</a></h3>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"crossorigin="anonymous"></script>
    <script src="js/paginacion.js"></script>
</body>
</html>

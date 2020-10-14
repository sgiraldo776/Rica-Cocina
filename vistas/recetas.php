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
                <div class="conenedor-recetas" id="agrega-registros">
                </div>
                <ul class="pagination justify-content-center" id="pagination"></ul>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"crossorigin="anonymous"></script>
    <script src="js/paginacion.js"></script>
</body>
</html>
<?php
    include '../includes/footer.php';
?>


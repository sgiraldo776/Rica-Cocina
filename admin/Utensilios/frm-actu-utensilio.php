<?php include '../conexion.php';
$id = $_REQUEST['utensilioid'];

// $_REQUEST Un array asociativo que por defecto contiene el contenido de $_GET, $_POST y $_COOKIE

$sel = $conn -> query("SELECT * FROM tblutensilios WHERE utensilioid='$id' ");
if ($fila = $sel -> fetch_assoc()) {
}
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"><!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title></title>
</head>
<body>
    <header class="navbar navbar-expand-md navbar-dark bg-dark">
        <h1 class="text-light">Rica Cocina</h1>
    </header>
    <main class="col-12">
        <div class="container text-center mt-4">
            <div>
                <h2>Actualizar Utensilio</h2>
            </div><!-- Div Nav-->
            <form action="actualizar.php" name="add_form" method="post">
                <input type="hidden" name="utensilioid" value="<?php echo $id ?>">
                <input type="text" id="txt_utensilio" name="nombre" placeholder="Nombre Utencilio" value="<?php echo $fila['nombre'] ?>"><br>
                <input type="button" onclick="validarformulario3();" value="Actualizar" class="btn btn-primary mt-4">
            </form>
        </div>
    </main>
    <!--JS de bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!--validacion de capos vacios-->
    <script type="text/javascript" src="../js/camposvacios.js"></script>
     <!--validacion de capos vacios-->
</body>
</html>
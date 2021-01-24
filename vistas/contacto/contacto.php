<?php
        include('../../admin/conexion.php');
        session_start();
        if(!isset($_SESSION['rol'])){
            include '../../includes/header-idx.php';
        }else{
            if($_SESSION['rol'] !=1 ){
                if($_SESSION['rol'] =2 ){
                    include '../../includes/header-user.php';
                }else {
                    include '../../includes/header-idx.php';
                }
            }else {
                include '../../includes/header-admin.php';
            }            
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css" >
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../../admin/css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../../admin/css/style.css">
    <link rel="icon" type="image/png" href="../../img/favicon.png">
    <title>Rica Cocina</title>
</head>
<body>
    
    <main>
        <div class="container text-center">
            <div class="row">
                    <div class="card-body">
                        <h1>Contáctenos</h1>
                        <form action="enviar-contacto.php" name="add_form" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <label for="">Nombres: </label>
                                <input class="form-control" type="text" name="nombres" placeholder="Ingrese un Nombre"> 
                                <label for="">Correo: </label>
                                <input class="form-control" type="email" name="correo" placeholder="Ingrese un Correo"> 
                                <label for="">Celular: </label>
                                <input class="form-control" type="tel" name="celular" placeholder="Ingrese un numero de celular">
                                <label for="">Asunto: </label>
                                <input class="form-control" type="text" name="asunto" placeholder="Ingrese un Asunto"> 
                                <label for="">Comentario</label>
                                <textarea class="form-control" name="comentario" rows="10" placeholder="Ingrese un comentario"></textarea>
                            </fieldset>
                            <input type="submit" class="boton boton-amarillo" value="Enviar">
                        </form>
                    </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php

session_start();
if(!isset($_SESSION['rol'])){
    header('location: vistas/login/iniciar_sesion.php');
}else{
    if($_SESSION['rol'] !=2 ){
        header('location: vistas/login/iniciar_sesion.php');
    }
}
?>
<!DOCTYPE html>
<html class="no-js"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <h1>Usuario</h1>

    <a href="vistas/login/config/cerrar_sesion.php">Cerrar Sesión</a>
        
        <script src="" async defer></script>
    </body>
</html>
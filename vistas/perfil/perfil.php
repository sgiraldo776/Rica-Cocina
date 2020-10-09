<?php
include('../../admin/conexion.php');
session_start();
        if(!isset($_SESSION['rol'])){
            header('location: ../login/iniciar_sesion.php');
        }else{
            if($_SESSION['rol'] !=2 ){
                header('location: ../login/iniciar_sesion.php');
            }else{
                include '../../includes/header-user.php';
            }
        }
        
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../../admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../admin/css/styles1.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/favicon.png">
</head>

<body class="bgimg-perfil">
    <div class="container">
        <div class="row perfilcss">

            <div class="col-12 perfil-img">
            <img src="<?php echo $URL ?>img/logo-rica-cociona1.png" alt="">
            </div>
            <?php
                $sql = $conn ->query("SELECT concat_ws(' ', us.nombres, us.apellidos) as 'Persona', us.fechanacimiento, cu.correoelectronico FROM tblusuario as us INNER JOIN tblcuenta as cu ON cu.usuarioid = us.usuarioid WHERE us.usuarioid='$_SESSION[usuarioid]'");

                $row=$sql->fetch_array();
            ?>
            <div class="dat-usu col-12 text-center">
                <label for="">Nombre</label>
                <input type="text" class="form-control" value="<?php echo $row[0]?>" disabled>

                <label for="">Fecha de nacimiento</label>
                <input type="date" class="form-control" value="<?php echo $row[1]?>" disabled>

                <label for="">Correo</label>
                <input type="text" class="form-control" value="<?php echo $row[2]?>" disabled>
            </div>
            
            <div class="col-12 text-center bot-perf">
            <button type="submit" class="boton boton-amarillo" id="ingresar">Editar perfil</button>
            <a href="<?php echo $URL ?>vistas/login/config/darse_baja.php">
                <button type="submit" class="boton boton-amarillo" id="ingresar">Desactivar Cuenta</button>
            </a>
            </div>
        
        </div>
    </div>

    </main>

    <!--JS de bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--<script src="../../admin/js/alerts.js"></script>-->

</body>

</html>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                <div class="modal fade" tabindex="-1" id="modal1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>Modificar datos</h2>
                                <button class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            <?php
                                $sql = $conn ->query("SELECT us.nombres, us.apellidos, us.fechanacimiento FROM tblusuario as us WHERE us.usuarioid='$_SESSION[usuarioid]'");

                                $row=$sql->fetch_array();
                            ?>
                            <form action="actualizar-perfil.php" name="add_form" method="post">
                            <div class="card-body">
                                <fieldset class="fieldset">
                                    <legend class="legend">
                                        Información Personal</legend>
                                    <div class="row">
                                        <div class="col">
                                            <label>Nombre</label>
                                            <input
                                                type="text"
                                                name="nombre"
                                                class="form-control"
                                                placeholder="Ingrese el nombre"
                                                id="nombre"
                                                value="<?php echo $row[0]?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Apellido</label>
                                            <input
                                                type="text"
                                                name="apellidos"
                                                class="form-control"
                                                placeholder="Ingrese los apellidos"
                                                id="apellido"
                                                value="<?php echo $row[1]?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label>Fecha de Nacimiento</label>
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    name="fechanacimiento"
                                                    placeholder="Ingrese Fecha de Nacimiento"
                                                    id="fechanacimiento"
                                                    onblur="myFunction()"
                                                    value="<?php echo $row[2]?>">
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <button type="button" class="boton boton-amarillo" id="enviar">Guardar Cambios</button>
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="boton boton-amarillo" data-toggle="modal" data-target="#modal1" id="ingresar">Editar perfil</button>
                <a href="<?php echo $URL ?>vistas/login/config/darse_baja.php">
                    <button type="submit" class="boton boton-amarillo" id="ingresar">Desactivar Cuenta</button>
                </a>
            </div>
        
        </div>
    </div>

    </main>
    <?php
    if(isset($_GET['ntf'])){
    ?>

    <script>
        Swal.fire({
            title: '¡Hecho!',
            text: 'Datos actualizados correctamente',
            icon: 'success',
            confirmButtonText: 'OK'
        })    
    </script>

    <?php
    }
    ?>

    <!--JS de bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/validacion-perfil.js"></script>
    <!--<script src="../../admin/js/alerts.js"></script>-->

</body>

</html>
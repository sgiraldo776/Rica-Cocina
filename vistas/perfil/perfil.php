<?php
include '../../admin/conexion.php';
session_start();
if(!isset($_SESSION['rol'])){
    header('location: ../login/iniciar_sesion.php');
}
include '../../admin/util/validar_premium.php';
$premium=validarPremium($_SESSION['cuentaid'],$conn);

$sqlConsultaPlanes = "SELECT * FROM tblplan";
$resultConsultaPlanes = $conn->query($sqlConsultaPlanes);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>

    <link rel="stylesheet" href="../../admin/css/bootstrap.min.css" >
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../../admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../admin/css/styles1.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="bgimg-perfil">

        <?php

        if($_SESSION['rol'] ==2 ){
            include '../../includes/header-user.php';
        }else if($_SESSION['rol'] ==1){
            include '../../includes/header-admin.php';
        }  
        ?>
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
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" value="<?php echo $row[0]?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Fecha de nacimiento</label>
                        <input type="date" class="form-control" value="<?php echo $row[1]?>" disabled>
                    </div>
                </div>
                <div form-group>
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
                                    <legend class="legend">Información Personal</legend>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nombre</label>
                                            <input
                                                type="text"
                                                name="nombre"
                                                class="form-control"
                                                placeholder="Ingrese el nombre"
                                                id="nombre"
                                                value="<?php echo $row[0]?>"
                                            >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Apellido</label>
                                            <input
                                                type="text"
                                                name="apellidos"
                                                class="form-control"
                                                placeholder="Ingrese los apellidos"
                                                id="apellido"
                                                value="<?php echo $row[1]?>"
                                            >
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de Nacimiento</label>
                                        <input
                                            type="date"
                                            class="form-control"
                                            name="fechanacimiento"
                                            placeholder="Ingrese Fecha de Nacimiento"
                                            id="fechanacimiento"
                                            onblur="myFunction()"
                                            value="<?php echo $row[2]?>"
                                        >
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

            <!-- inicio contenedor pago -->
            <div class="container d-flex mt-5 text-center">
                <?php if(!$premium): ?>
                <div class="row">

                <?php 
                    while($plan =  $resultConsultaPlanes->fetch_row()): 
                ?> 
                        <div class="col-auto">
                            <button onclick="preguntar(<?php echo $plan[0] ?>)" class="btn btn-premium"><?php echo $plan[1] ?></button>
                        </div>
                <?php 
                    endwhile; 
                ?>
                </div>
                <?php else: ?>

                    <div class="contenedor-premium p-5">
                        <div class="col-md-6 bg-yellow p-3 redondeado">
                            <h2 class="premium_titulo">Eres premium</h2>                        
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-white">Fecha fin</h2>  
                            <p>3/12/1992</p>                     
                        </div>
                    </div>
                <?php endif; ?>

                
            </div>
            <!-- fin contenedor form pago -->       
        </div>
        </div>
    </div>
    </main>
    <br>
    <br>
    <?php include '../../includes/footer.php' ?>
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


    <script type="text/javascript">
        function preguntar(id){
            Swal.fire({
                title: "Comprar Premium",
                text: "¿Estas seguro que desea comprar este paquete premium?",
                icon: 'warning',            
                showCancelButton: true,
                confirmButtonText: "Sí, Continuar",
                cancelButtonText: "Cancelar",
            })
            .then(resultado => {
                if (resultado.value) {
                    // Hicieron click en "Sí"
                    //console.log("*se elimina la venta*");
                    window.location.href="pago.php?id="+id
                } else {
                    // Dijeron que no
                    console.log("*NO se elimina*");
                }
            });

        }
    </script>

    <!--JS de bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/validacion-perfil.js"></script>
    <!--<script src="../../admin/js/alerts.js"></script>-->

</body>

</html>
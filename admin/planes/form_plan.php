<?php

include '../conexion.php';
    session_start();
    if(!isset($_SESSION['rol'])){
        header('location: ../../vistas/login/iniciar_sesion.php');
    }else{
        if($_SESSION['rol'] !=1 ){
            header('location: ../../vistas/login/iniciar_sesion.php');
        }
    }

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membresias</title>

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
                <div class="text-center">
                    <h1 class="mt-4">Planes Premium</h1><br>
                </div>
        <div class="container bg-white p-5">

                <div>
                    <form action="ingresarplan.php" name="add_form" method="post">
                        <div class="form-group">
                            <label>Plan</label>
                                <input type="text" name="plan" class="form-control" placeholder="descicion del plan" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tiempo</label>
                                <input type="number" name="tiempo" class="form-control" placeholder="Tiempo del plan" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Precio</label>
                                <input type="number" name="precio" class="form-control" placeholder="Precio del plan" required>
                            </div>
                        </div>

                        <div class="form-group text-center mb-5">
                            <button type="submit" class="boton boton-amarillo">Registrar</button>
                        </div>
                        
                    </form>
                </div>
        
        <div class="row perfilcss">
                
        <div class="mt-4" style="margin: 0 auto;">
            <table class="table table-hover">
                <thead class="thead">
                    <th>Membresia</th>
                    <th>Tiempo</th>
                    <th>Precio</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </thead>
                <?php 
                $sel = $conn ->query("SELECT * FROM tblplan");
                    $cont=0;
                while ($fila = $sel -> fetch_assoc()) {
                    $cont++;
                ?>
                <tr>
                    <td><?php echo $fila['descripcion'] ?></td>
                    <td><?php echo $fila['tiempo'] ?></td>
                    <td><?php echo $fila['precio'] ?></td>
                    <td><button type="button" class="boton boton-amarillo" data-toggle="modal" data-target="#modal<?php echo $cont; ?>" id="ingresar">Actualizar</button></td>
                    <td><a href="#" onclick="preguntar(<?php echo $fila['id']?>)"><button class="boton boton-amarillo" >Eliminar</button></a></td>
                </tr>

                <!-- /Modal actualizar Producto -->

                <div class="modal" tabindex="-1" role="dialog" id="modal<?php echo $cont; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Editar Plan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="actualizar_plan.php?id=<?php echo $fila['id']?>" method="post">
                                                <div class="form-group">
                                                    <label>Plan</label>
                                                    <input type="text" name="plan" value="<?php echo $fila['descripcion']?>" class="form-control" placeholder="descicion del plan" required>
                                                </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Tiempo</label>
                                                    <input type="number" name="tiempo" value="<?php echo $fila['tiempo'] ?>" class="form-control" placeholder="Tiempo del plan" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Precio</label>
                                                    <input type="number" name="precio" value="<?php echo $fila['precio'] ?>" class="form-control" placeholder="Precio del plan" required>
                                                </div>
                                            </div>

                                            <div class="form-group text-center mb-5">
                                                <button type="submit" class="boton boton-amarillo">Actualizar</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php } ?>
            </table>
        </div>
        
        </div>

    </div>
    </main>
    <br>
    <br>
    <?php include '../../includes/footer.php' ?>

    <!--JS de bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--<script src="../../admin/js/alerts.js"></script>-->
    
     <!-- pregunta antes de eliminar sweat alert -->
     <script type="text/javascript">
            function preguntar(id){
            Swal
                .fire({
                    title: "¿Eliminar el plan?",
                    text: "¿Estas seguro de eliminar el plan?",
                    icon: 'error',            
                    showCancelButton: true,
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar",
                })
                .then(resultado => {
                    if (resultado.value) {
                        // Hicieron click en "Sí"
                        //console.log("*se elimina la venta*");
                        window.location.href="eliminar_plan.php?id="+id
                    } else {
                        // Dijeron que no
                        console.log("*NO se elimina*");
                    }
                });

            }
        </script>

    

</body>

</html>
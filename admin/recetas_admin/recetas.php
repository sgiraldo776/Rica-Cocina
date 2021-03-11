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

    $receta=$conn->query("SELECT `tblreceta`.`recetaid`, `tblreceta`.`titulo`, `tblusuario`.`Nombres`, `tblreceta`.`validar`
    FROM `tblreceta` 
        LEFT JOIN `tblusuario` ON `tblreceta`.`usuarioid` = `tblusuario`.`usuarioid`;");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas</title>

    <link rel="stylesheet" href="../../admin/css/bootstrap.min.css" >
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../../admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../admin/css/styles1.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- data tables -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

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
                    <h1 class="mt-4">Todas las recetas</h1><br>
                </div>
        <div class="container bg-white p-5">

        <div class="mt-4" style="margin: 0 auto;">
            <table id="tabla" class="table table-hover">
                <thead class="thead">
                    <th>titulo</th>
                    <th>Autor</th>
                    <th>estado</th>
                    <th>Acciones</th>
                    <th>Ver</th>
                    
                </thead>
                <?php 
                    $cont=0;
                while ($fila = $receta -> fetch_assoc()) {
                    $cont++;
                ?>
                <tr>
                    <td><?php echo $fila['titulo'] ?></td>
                    <td><?php echo $fila['Nombres'] ?></td>
                    <?php if ($fila['validar']==1){
                        $estado="NO PUBLICADA";
                    }else{
                        $estado="PUBLICADA";
                    } 
                    ?>
                    <td><?php echo $estado ?></td>
                    <?php
                    if ($fila['validar']==1){
                        ?>
                        <td><button onclick="preguntar(<?php echo $fila['recetaid'] ?>)" class="boton boton-amarillo" >Publicar</button></td>
                    <?php } elseif ($fila['validar']==2) {

                        ?>

                        <td><button onclick="preguntar(<?php echo $fila['recetaid'] ?>)" class="boton boton-amarillo" >No publicar</button></td>

                    <?php } ?>
                    
                    <td><a href="<?php echo $URL ?>vistas/receta-individual/mostrar-receta.php?recetaid=<?php echo $fila['recetaid'] ?>" target="_blank"><button class="boton boton-amarillo" >Mostrar</button></a></td>
                </tr>

                    

                
                <?php } ?>
            </table>
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
                    title: "¿cambiar receta?",
                    text: "¿Estas seguro de cambiar el estado de la receta?",
                    icon: 'error',            
                    showCancelButton: true,
                    confirmButtonText: "Sí, cambiar",
                    cancelButtonText: "Cancelar",
                })
                .then(resultado => {
                    if (resultado.value) {
                        // Hicieron click en "Sí"
                        //console.log("*se elimina la venta*");
                        window.location.href="../recetas/publicar_receta.php?recetaid="+id
                    } else {
                        // Dijeron que no
                        console.log("*NO se elimina*");
                    }
                });

            }
        </script>

        <!-- data tables -->

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>


    <script>
        $(document).ready( function () {
        $('#tabla').DataTable();
        } );

    </script>


    

</body>

</html>
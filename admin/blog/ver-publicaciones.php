<?php
 include "../conexion.php";
 include "../../includes/open-graph.php";
 include '../util/funciones.php';
 session_start();
    if(!isset($_SESSION['rol'])){
        header('location: ../../vistas/login/iniciar_sesion.php');
    }else{
        if($_SESSION['rol'] !=1 ){
            header('location: ../../vistas/login/iniciar_sesion.php');
        }
    }

    $nombre_fichero = "../../blog/publicaciones";
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="icon" type="image/png" href="../../img/favicon.png">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <?php echo og(); ?>
</head>
<body>
    <?php include "../../includes/header-admin.php";?>
    <div class="row">
        <nav class="col-2" id="nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-light" href="./ver-publicaciones.php">Ver publicaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./registro-entrada.php">Registar publicación</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link text-light" href="form_TipoComida.php">Tipo Comida</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="../Padecimiento/form_padecimiento.php">Padecimientos</a>
                </li> -->
            </ul><!-- UL -->
        </nav><!-- Nav -->
        <main class="col-10">
            <div class="container container-page text-center mt-4">
                <div class="mt-4">
                    <table class="table table-hover" id="table-entry">
                        <thead class="thead">
                           <tr>
                                <th>id</th>
                                <th>Titulo</th>
                                <th>fecha de creación</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                           </tr>
                        </thead>
                        <?php 
                        $sel = $conn ->query("SELECT * FROM tblpublicacion");
                        while ($fila = $sel -> fetch_row()) {
                            $titulo_publicacion = get_url_valid_text($fila[1]);
                            $titulo_publicacion = $nombre_fichero."/".$titulo_publicacion."-".$fila[0];
                        ?>
                        <tr onclick="editarEntrada(<?php echo $fila[0] ?>)">
                            <td><?php echo $fila[0] ?></td>
                            <td><?php echo $fila[1] ?></td>
                            <td><?php echo $fila[3] ?></td>
                            <td><?php echo $fila[6] == 1 ?"<span class='text-success'>Publicado</span>" : "<span class='text-warning'>Oculto</span>" ?></td>
                            <td>
                                <?php echo $fila[6] == 1 ? '<a href="'.$titulo_publicacion.'" title="Ver Publicación" class="badge badge-dark"> <i class="icon-eye-open"></i></a>': ""; ?>
                                <?php echo $fila[6] == 1 ? '<a href="ocultar.php?id='.$fila[0].'" title="Ocultar" class="badge badge-dark"> <i class="icon-unlink"></i></a>': ""; ?>
                                <?php echo $fila[6] == 0 ? '<a href="publicar.php?id='.$fila[0].'" title="Publicar" class="badge badge-dark"> <i class="icon-share-sign"></i></a>': ""; ?> 
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div><!-- Div Lista -->
            </div><!-- Div Conetenedor -->

        </main>
        
    </div>
    <?php include "../../includes/footer.php";?>

    <!--JS de bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="../js/dataTables.js"></script>           
    <script>
        $(document).ready( function () {
            $('#table-entry').DataTable({
                height:300,
                language: {
                    processing:     "Procesando...",
                    search:         "Buscar:",
                    lengthMenu:     "Mostrar _MENU_ registros",
                    info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    infoFiltered:   "(filtrado de un total de _MAX_ registros)",
                    infoPostFix:    "",
                    loadingRecords: "Cargando...",
                    zeroRecords:    "No se encontraron resultados",
                    emptyTable:     "La tabla esta vacia",
                    paginate: {
                        first:      "Primero",
                        previous:   "Último",
                        next:       "Siguiente",
                        last:       "Anterior"
                    },
                    aria: {
                        sortAscending:  ": Activar para ordenar la columna de manera ascendente",
                        sortDescending: ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        });
    </script>
    <script>
        function editarEntrada(id){
            location.href ="./editar-publicacion.php?id="+id;
        }
    </script>
    <!--validacion de capos vacios-->
    <script type="text/javascript" src="../js/camposvacios.js"></script>
    <!--validacion de capos vacios-->
</body>
</html>
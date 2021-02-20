<?php
    session_start();
    include('../conexion.php');

    if(!isset($_SESSION['rol'])){
        $urlFinal = $URL."vistas/login/iniciar_sesion.php";
        header('location: '.$urlFinal);
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="icon" type="image/png" href="../../img/favicon.png">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Rica Cocina</title>
</head>

<body>


    <?php
        
       
        require_once "../../vendor/stefangabos/zebra_pagination/Zebra_Pagination.php";

        include '../../includes/header-admin.php';

    ?>

    <div class="row text-center">
        <div class="col-md-12">
            <div>
                <h1>Recetas</h1>
            </div>
            <div class="contenedor-recetas">
                <?php 
                
                    $selectAll=$conn->query("SELECT count(*) from tblreceta WHERE validar='1'");
                    $numero_elementos = $selectAll->fetch_row();
                    $numero_elementos = $numero_elementos[0];
                    if($numero_elementos > 0){
                        // Determinamos la cantidad de elementos a mostrar en la página
                        $numero_elementos_pagina = 3;
                        // Hacer paginación
                        $paginacion = new zebra_pagination();
                        // Numero total de elementos a paginar
                        $paginacion->records($numero_elementos);    
                        // Numero de elementos por página:
                        $paginacion->records_per_page($numero_elementos_pagina);
                        $page = $paginacion->get_page();  // Toma el número de la páginación por GET.
                        $empieza_aqui = (($page - 1) * $numero_elementos_pagina);
                        
                        $sel = $conn ->query("SELECT re.recetaid,re.imagen,re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid WHERE validar='1' LIMIT $empieza_aqui, $numero_elementos_pagina;");


                        $renderizar = true;
                    }else{
                        echo "No hay resultados";
                    }




                    if(isset($sel)):
                    while ($row=$sel->fetch_array()) {
                ?>
                <div class="cont-tarjetas">
                    <div class="tarjetas">
                        <a href="../../vistas/receta-individual/mostrar-receta.php?recetaid=<?php echo $row[0] ?>" style="text-decoration: none">
                            <div class="tarjeta-img">
                                <!--<img class="tarjeta-img" src="../img/fideos.jpg" class="" alt="...">-->
                                <img async class="tarjeta-img tam-img " src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $row['imagen'] ) ?>">
                            
                            </div>
                            <div class="tarjeta-info">
                                <h3 class="card-title"><?php echo $row[2] ?></h3>
                                <p class="card-text">Por: <?php echo $row[3]?></p>
                            </div>
                        </a>
                    </div>
                    
                    <form action="" name="add_form" method="POST">
                    <input type="text" id="recetaid" name="recetaid" value="<?php echo $row[0] ?>" hidden>
                        <!--<button class="boton boton-amarillo">EDITAR</button>-->
                        <!--<button type="button" onclick="validareliminar()"><a id="eliminar" href="">ELIMINAR</a></button>-->
                        <!--<button type="button" class="boton boton-amarillo" id="eliminar">eliminar</button>-->
                        <button type="button" class="boton boton-amarillo" href="#" onclick="preguntar(<?php echo $row[0]?>)">Publicar</button>
                        <button type="button" class="boton boton-amarillo" href="#" onclick="preguntar1(<?php echo $row[0]?>)">Denegar</button>
                    </form><br>
                </div>
                
                <?php	
                    }
                endif;
                ?>
                
            </div>
            <div class="col-12 contenedor-recetas">
                <?php if(isset($renderizar) && $renderizar == true) : ?>
                            <div class="mx-auto"><?php $paginacion->render(); ?></div>
                <?php endif; ?>
            </div>
          
            <!-- <button type="button" class="boton boton-rojo" href="<?php echo $URL.'admin/recetas/receta_val.php' ?>">ver mas recetas</button> -->

        </div>
    </div>

    <?php include '../../includes/footer.php' ?>

    <script type="text/javascript">
        function preguntar(id){
           Swal
            .fire({
                title: "¿Publicar?",
                text: "¿Estas seguro de publicar la Receta?",
                icon: 'success',            
                showCancelButton: true,
                confirmButtonText: "Sí, publicar",
                cancelButtonText: "Cancelar",
            })
            .then(resultado => {
                if (resultado.value) {
                    // Hicieron click en "Sí"
                    //console.log("*se elimina la venta*");
                    window.location.href="publicar_receta.php?recetaid="+id
                } else {
                    // Dijeron que no
                    console.log("*NO se elimina *");
                }
            });

        }
    </script>
    <script type="text/javascript">
        function preguntar1(id){
           Swal
            .fire({
                title: "¿Denegar?",
                text: "¿Estas seguro de denegar la Receta?",
                icon: 'error',            
                showCancelButton: true,
                confirmButtonText: "Sí, denegar",
                cancelButtonText: "Cancelar",
            })
            .then(resultado => {
                if (resultado.value) {
                    // Hicieron click en "Sí"
                    //console.log("*se elimina la venta*");
                    window.location.href="denegar_receta.php?recetaid="+id
                } else {
                    // Dijeron que no
                    console.log("*NO se elimina*");
                }
            });

        }
    </script>
    <?php 
    if(!empty($_SESSION['error'])){
        ?>
<script type="text/javascript">
    
           Swal
            .fire({
                title: "Ocurrio un error",
                text: "La accion anterior no se completo correctamente, comuniquese con el administrador",
                icon: 'error',            
                showCancelButton: true,
                cancelButtonText: "Cerrar",
            })
            .then(resultado => {
                if (resultado.value) {
                    // Hicieron click en "Sí"
                    //console.log("*se elimina la venta*");
                    window.location.href="denegar_receta.php?recetaid="+id
                } else {
                    // Dijeron que no
                    console.log("*NO se elimina*");
                }
            });

        
    </script>
<?php

unset($_SESSION['error']);

} ?>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        var lazyloadImages = document.querySelectorAll("img.lazy");    
        var lazyloadThrottleTimeout;
        
        function lazyload () {
            if(lazyloadThrottleTimeout) {
            clearTimeout(lazyloadThrottleTimeout);
            }    
            
            lazyloadThrottleTimeout = setTimeout(function() {
                var scrollTop = window.pageYOffset;
                lazyloadImages.forEach(function(img) {
                    if(img.offsetTop < (window.innerHeight + scrollTop)) {
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    }
                });
                if(lazyloadImages.length == 0) { 
                document.removeEventListener("scroll", lazyload);
                window.removeEventListener("resize", lazyload);
                window.removeEventListener("orientationChange", lazyload);
                }
            }, 20);
        }
        
        document.addEventListener("scroll", lazyload);
        window.addEventListener("resize", lazyload);
        window.addEventListener("orientationChange", lazyload);
        });
    
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--<script src="../admin/js/alerts.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"crossorigin="anonymous"></script>

</body>

</html>
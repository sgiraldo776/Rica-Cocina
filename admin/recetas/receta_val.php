<?php
        include('../conexion.php');
        session_start();
        if(!isset($_SESSION['rol'])){
            header('location: login/iniciar_sesion.php');
        }else{
            if($_SESSION['rol'] !=1 ){
                header('location: login/iniciar_sesion.php');
            }else{
                include '../../includes/header-admin.php';
            }
        }
        
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../../img/favicon.png">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Rica Cocina</title>
</head>

<body>

<div class="row text-center">
            
            <div class="col-md-12">
                <div>
                    <h1>Recetas</h1>
                </div>
                <div class="conenedor-recetas">
                    <?php 
                        $sel = $conn ->query("SELECT re.recetaid,re.imagen,re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid WHERE validar='1'");
                                
                        while ($row=$sel->fetch_array()) {
                    ?>
                    <div class="cont-tarjetas">
                        <div class="tarjetas">
                            <a href="../../vistas/receta-individual/mostrar-receta.php?recetaid=<?php echo $row[0] ?>" style="text-decoration: none">
                                <div class="tarjeta-img">
                                    <!--<img class="tarjeta-img" src="../img/fideos.jpg" class="" alt="...">-->
                                    <img class="tarjeta-img tam-img" src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $row['imagen'] ) ?>">
                                
                                </div>
                                <div class="tarjeta-info">
                                    <h3 class="card-title"><?php echo $row[2] ?></h3>
                                    <p class="card-text">Por: <?php echo $row[3]?></p>
                                    <p class="card-text"> Puntaje: <?php echo $row[4]?></p>
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
                    ?>
                    
                </div>
            </div>
        </div>

        <footer class="footer py-4 bgcolor">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 text-lg-left text-center">Copyright © Rica 2020</div>
                <div class="col-lg-6 my-3 my-lg-0 text-lg-center text-center">
                    <a class="btn btn-social mx-3" href="#!"><i class="fab fa-twitter"><img class="mx-auto" src="<?php echo $URL ?>img/twitter.svg" style="max-width: 75%"></i></a>
                    <a class="btn btn-social mx-3" href="#!"><i class="fab fa-facebook-f"><img class="mx-auto" src="<?php echo $URL ?>img/facebook.svg" style="max-width: 75%"></i></a>
                    <a class="btn btn-social mx-3" href="#!"><i class="fab fa-linkedin-in"><img class="mx-auto" src="<?php echo $URL ?>img/instagram.svg" style="max-width: 75%"></i></a>
                </div>
                <div class="col-lg-3 text-lg-center text-center contac">
                    <h3><a href="<?php echo $URL ?>vistas/contacto/contacto.php">Contáctenos</a></h3>
                </div>
            </div>
        </div>
    </footer>

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

    

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--<script src="../admin/js/alerts.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"crossorigin="anonymous"></script>

</body>

</html>
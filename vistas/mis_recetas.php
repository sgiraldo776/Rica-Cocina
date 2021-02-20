<?php
session_start();
include('../admin/conexion.php');
        
        if(!isset($_SESSION['rol'])){
            header('location: login/iniciar_sesion.php');
        }else{
            if($_SESSION['rol'] !=2 ){
                header('location: login/iniciar_sesion.php');
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
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../admin/css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../admin/css/style.css">
    <title>Rica Cocina</title>
</head>

<body>
<?php

    if($_SESSION['rol'] ==2 ){
        include '../includes/header-user.php';
    }else if($_SESSION['rol'] ==1){
        include '../includes/header-admin.php';
    }  
?>
        <div class="row text-center">
            
            <div class="col-md-12">
                <div>
                    <h1>Mis Recetas</h1>
                </div>
                <div class="conenedor-recetas">
                    <?php 
                        $sel = $conn ->query("SELECT re.recetaid,re.imagen,re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid WHERE re.usuarioid='$_SESSION[usuarioid]' AND validar='2'");
                                
                        while ($row=$sel->fetch_array()) {
                    ?>
                    <div class="cont-tarjetas">
                        <div class="tarjetas">
                            <a href="receta-individual/mostrar-receta.php?recetaid=<?php echo $row[0] ?>" style="text-decoration: none">
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
                        
                        <form action="ingreso/frm-actu-receta.php?recetaid=<?php echo $row[0] ?>" name="add_form" method="POST">
                        <input type="text" id="recetaid" name="recetaid" value="<?php echo $row[0] ?>" hidden>
                            <!--<button class="boton boton-amarillo">EDITAR</button>-->
                            <!--<button type="button" onclick="validareliminar()"><a id="eliminar" href="">ELIMINAR</a></button>-->
                            <!--<button type="button" class="boton boton-amarillo" id="eliminar">eliminar</button>-->
                            <button type="button" class="boton boton-amarillo" href="#" onclick="preguntar(<?php echo $row[0]?>)">ELIMINAR</button>
                        </form><br>
                    </div>
                    
                    <?php	
                        }
                    ?>
                    
                </div>
            </div>




            <div class="col-md-12">
                <div>
                    <h1>Recetas en espera de aprobación</h1>
                </div>
                <div class="conenedor-recetas">
                    <?php 
                        $sel = $conn ->query("SELECT re.recetaid,re.imagen,re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid WHERE re.usuarioid='$_SESSION[usuarioid]' AND validar='1'");
                                
                        while ($row=$sel->fetch_array()) {
                    ?>
                    <div class="cont-tarjetas">
                        <div class="tarjetas">
                            <a href="receta-individual/mostrar-receta.php?recetaid=<?php echo $row[0] ?>" style="text-decoration: none">
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
                        
                        <form action="ingreso/frm-actu-receta.php?recetaid=<?php echo $row[0] ?>" name="add_form" method="POST">
                        <input type="text" id="recetaid" name="recetaid" value="<?php echo $row[0] ?>" hidden>
                            <button class="boton boton-amarillo">EDITAR</button>
                            <!--<button type="button" onclick="validareliminar()"><a id="eliminar" href="">ELIMINAR</a></button>-->
                            <!--<button type="button" class="boton boton-amarillo" id="eliminar">eliminar</button>-->
                            <button type="button" class="boton boton-amarillo" href="#" onclick="preguntar(<?php echo $row[0]?>)">ELIMINAR</button>
                        </form><br>
                    </div>
                    
                    <?php	
                        }
                    ?>
                    
                </div>
            </div>



            <div class="col-md-12">
                <div>
                    <h1>Recetas no aprobadas</h1>
                </div>
                <div class="conenedor-recetas">
                    <?php 
                        $sel = $conn ->query("SELECT re.recetaid,re.imagen,re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid WHERE re.usuarioid='$_SESSION[usuarioid]' AND validar='3'");
                                
                        while ($row=$sel->fetch_array()) {
                    ?>
                    <div class="cont-tarjetas">
                        <div class="tarjetas">
                            <a href="receta-individual/mostrar-receta.php?recetaid=<?php echo $row[0] ?>" style="text-decoration: none">
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
                        
                        <form action="ingreso/frm-actu-receta.php?recetaid=<?php echo $row[0] ?>" name="add_form" method="POST">
                        <input type="text" id="recetaid" name="recetaid" value="<?php echo $row[0] ?>" hidden>
                            <button class="boton boton-amarillo">EDITAR</button>
                            <!--<button type="button" onclick="validareliminar()"><a id="eliminar" href="">ELIMINAR</a></button>-->
                            <!--<button type="button" class="boton boton-amarillo" id="eliminar">eliminar</button>-->
                            <button type="button" class="boton boton-amarillo" href="#" onclick="preguntar(<?php echo $row[0]?>)">ELIMINAR</button>
                        </form><br>
                    </div>
                    
                    <?php	
                        }
                    ?>
                    
                </div>
            </div>

        </div>
        
        <?php include '../includes/footer.php' ?>

    <script type="text/javascript">
        function preguntar(id){
           Swal
            .fire({
                title: "¿Eliminar Receta?",
                text: "¿Estas seguro de Eliminar la Receta?",
                icon: 'error',            
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar",
            })
            .then(resultado => {
                if (resultado.value) {
                    // Hicieron click en "Sí"
                    //console.log("*se elimina la venta*");
                    window.location.href="ingreso/eliminar_receta.php?recetaid="+id
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
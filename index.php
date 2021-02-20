<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./admin/css/styles1.css">
    <link rel="stylesheet" href="vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        var palabrasBuscar = [];    
    </script>

    <title>Rica Cocina</title>
</head>

<body>
    <?php
        include('admin/conexion.php');
        if(!isset($_SESSION['rol'])){
            include 'includes/header-idx.php';
        }else{
            if($_SESSION['rol'] !=1 ){
                if($_SESSION['rol'] =2 ){
                    include 'includes/header-user.php';
                }else {
                    include 'includes/header-idx.php';
                }
            }else {
                include 'includes/header-admin.php';
            }            
        }

        if(isset($_GET['estado'])){
            $estado=$_GET['estado'];
        }
    ?>
    <section class="sldier contendor-slider">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="contenedor-slider_buscardor-receta">
                <div class="row">
                    <div class="col-12 md-2 tit-busc">
                        <h1>Buscar Recetas</h1>
                    </div>
                </div>
                <div class="contenedor">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-3 buscador busc">
                            <form action="vistas/recetas.php" method="POST" id="frm-buscar">
                                <input type="text" name="buscar" placeholder="Buscar" class="buscar">
                                <button class="boton-buscar" type="submit" value="buscar">
                                    <img src="img/lupa.svg" style="background:transparent">
                                </button>

                                <span class="buscador-sugerencia">Palabra sugeridas: 
                                    <button type="button" onclick='buscarSuegerencia("cualquiera")' class='link-sugerencia'>Cualquiera</button>
                                    <button type="button" onclick='buscarSuegerencia("Desayuno")' class='link-sugerencia'>Desayuno</button>
                                    <button type="button" onclick='buscarSuegerencia("Almuerzo")' class='link-sugerencia'>Almuerzo</button>
                                    <button type="button" onclick='buscarSuegerencia("Cena")' class='link-sugerencia'>Cena</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>        
            </div>       
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 sli-img" src="img/slider-06.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sli-img" src="img/slider-07.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sli-img" src="img/slider-08.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sli-img" src="img/slider-01.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sli-img" src="img/slider-02.jpg" alt="Third slide">
                </div>
            </div>
               
        </div>    
         
    </section>
    <main class="seccion contenedor">
        <div class="row">
            <div class="col-12 md-2 top">
                <h1>Top Recetas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 md-2 top">
                <div class="contenedor-recetas">
                    <?php 
                        $sel = $conn->query("SELECT re.recetaid, re.imagen,re.titulo,us.nombres,re.votacionacomulada, re.numeroVotaciones FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid WHERE validar='2' ORDER BY re.votacionacomulada DESC LIMIT 5");
                                
                        while ($row=$sel->fetch_array()) {

                            if($row[5] != null and $row[5] != 0){
                                $puntaje = bcdiv($row[4]/$row[5], '1', 1);
                            }else{
                                $puntaje = 0;
                            }
                    ?>
                    <div class="tarjetas">
                        <a href="vistas/receta-individual/mostrar-receta.php?recetaid=<?php echo $row[0] ?>"
                            style="text-decoration: none">
                            <div class="tarjeta-img">
                                <img class="tarjeta-img tam-img"
                                    src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $row['imagen'] ) ?>">
                            </div>
                            <div class="tarjeta-info">
                                <h3 class="card-title"><?php echo $row[2] ?></h3>
                                <p class="card-text">Por: <?php echo $row[3]?></p>
                                <p class="card-text"> Puntaje: <?= $puntaje; ?>
                                    <?php
                                        for ($i=1; $i <= $puntaje; $i++) { 
                                            echo "★";
                                        }
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    <?php	
                        }
                        $conn->close();

                    ?>
                </div>
            </div>
        </div>
    </main>

    
   <?php include 'includes/footer.php' ?>

    <?php
    if(isset($estado)){
    ?>

    <script>
        Swal.fire({
            title: '¡Bienvenido de nuevo!',
            text: 'Disfruta de más recetas',
            icon: 'success',
            confirmButtonText: 'OK'
        })
    </script>

    <?php
    }
    ?>

<?php
        if(isset($_SESSION['msg']) && $_SESSION['msg'] == '1') :
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Observación!',
                text: 'No hubo resultados',
                confirmButtonText: "Aceptar",
                
            })
            .then(resultado => {
                    if (resultado.value) {
                    
                    } 
            });
        </script>

        <?php $_SESSION['msg'] = null; ?>

    <?php endif; ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        function buscarSuegerencia(sugerencia){
            $(".buscar").val(sugerencia);
            $("#frm-buscar").submit();
        }
        
        $(function() {
            $(".buscar").keyup(function (e) { 
                $(".palabras-busqueda").empty();
                var palabrasBuscar = $(".buscar").val().split(" ");
                palabrasBuscar.map((item, i) => {
                    $(".palabras-busqueda").append("<span class='palabras-buscar'>"+item+'<a onclick="eliminarPalabra('+i+')" class="eliminar"></a></span>');
                })
            });
            $(".eliminar").click(function (e) { 
                palabrasBuscar.splice(indice, 1);
                $(".palabras-busqueda").empty();
                var palabrasBuscar = $(".buscar").val().split(" ");
                palabrasBuscar.map((item, i) => {
                    $(".palabras-busqueda").append("<span class='palabras-buscar'>"+item+'<a onclick="eliminarPalabra('+i+')" class="eliminar"></a></span>');
                })
            });
        });

    
        
    </script>

</body>

</html>
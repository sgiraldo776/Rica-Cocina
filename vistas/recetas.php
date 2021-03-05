<?php 
session_start(); 
include '../admin/conexion.php';
include '../admin/util/validar_premium.php';
if(isset($_SESSION['cuentaid'])){
    $id = $_SESSION['cuentaid'];
    $premium=validarPremium($id,$conn);
}else{
    $premium= false;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../admin/css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="admin/css/styles1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta name="description" content="Aquí se halla la magia de RicaCocina, donde encontrarás el cambio gastronómico en tu vida, con diferentes herramientas que permitirán una experiencia atrevida.">
    
    <!-- Facebook Card -->
    <meta property="og:site_name" content="Rica Cocina" />
    <meta property="og:url" content="<?php echo $URL ?>/vistas/recetas.php" />
    <meta property="og:type" content="article:Receta" />
    <meta property="og:title" content="Filtros De Recetas" />
    <meta property="og:description" content="Aquí se halla la magia de RicaCocina, donde encontrarás el cambio gastronómico en tu vida, con diferentes herramientas que permitirán una experiencia atrevida." />
    <meta property="og:image" content="<?php echo $URL."img/meta-img-general.png" ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Filtros De Recetasa">
    <meta name="twitter:description" content="Aquí se halla la magia de RicaCocina, donde encontrarás el cambio gastronómico en tu vida, con diferentes herramientas que permitirán una experiencia atrevida.">
    <meta name="twitter:creator" content="@andercc2880">
    <meta name="twitter:image" content="<?php echo $URL."img/meta-img-general.png" ?>" >

    <!-- Schema.org para Google+ -->
    <meta itemprop="name" content="Filtros De Recetasa">
    <meta itemprop="description" content="Aquí se halla la magia de RicaCocina, donde encontrarás el cambio gastronómico en tu vida, con diferentes herramientas que permitirán una experiencia atrevida.">
    <meta itemprop="image" content="<?php echo $URL."img/meta-img-general.png" ?>" >

    <title>Rica Cocina</title>
</head>

<body onresize="FuntionResize()">

<?php 

include('../admin/util/funciones.php');

if($premium == false){
    $disabled = "disabled='true' title='Paga una suscripción para usar este filtro'";
}else{
    $disabled = "";
}
if(!isset($_SESSION['rol'])){
    include '../includes/header-idx.php';
}else{
    if($_SESSION['rol'] !=1 ){
        if($_SESSION['rol'] =2 ){
            include '../includes/header-user.php';
        }else {
            include '../includes/header-idx.php';
        }
    }else {
        include '../includes/header-admin.php';
    }            
}
?>
    <section class="sldier contendor-slider caja-blanca">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="row text-center filtros">
                <h1 class="mx-auto">Buscador de recetas</h1>
                <nav class="col-md-12 nav-recetas" id="nav-recetas">
                    <form action="filtrar_recetas.php" id="form-filtros" name="add_form" method="POST">
                        <fieldset class="linea-filtros">
                            <div class="mb-3 col-lg-2 filtro">
                                <label for="" class="lbl-form-receta">Tipo Comida: </label>
                                <select name="tipocomida" id="tipocomida" class="form-control">
                                    <option value="0">-Seleccione-</option>
                                    <?php 
                                        $sel = $conn ->query("SELECT * FROM tbltipocomida");
                                    
                                        while ($row=$sel->fetch_array()) {
                                        ?>
                                        <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                        <?php	
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-2 filtro">
                                <label for="" class="lbl-form-receta">Tipo de Dieta: </label>
                                <select name="tipodieta" id="tipodieta" class="form-control" <?php echo $disabled; ?>>
                                    <option value="0">-Seleccione-</option>
                                    <?php 
                                                    $sel = $conn ->query("SELECT * FROM tbltipodieta");
                                    
                                                    while ($row=$sel->fetch_array()) {
                                                    ?>
                                                    <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                                    <?php	
                                                    }
                                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-2 filtro">
                                <label for="" class="lbl-form-receta">Tipo Receta: </label>
                                <select name="tiporeceta" id="tiporeceta" class="form-control">
                                    <option value="0">-Seleccione-</option>
                                    <option value="Indefinido">Indefinido</option>
                                    <option value="Plato">Plato</option>
                                    <option value="Postre">Postre</option>
                                    <option value="Bebida">Bebida</option>
                                    <option value="Snack">Snack</option>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-2 filtro">
                                <label for="" class="lbl-form-receta">Padecimiento: </label>
                                <select name="padecimiento" id="padecimiento" class="form-control" <?php echo $disabled; ?>>
                                <option value="0">-Seleccione-</option>
                                        <?php 
                                            $sel = $conn ->query("SELECT * FROM tblpadecimiento");
                                    
                                            while ($row=$sel->fetch_array()) {
                                            ?>
                                            <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                            <?php	
                                            }
                                            ?>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-2 filtro">
                                <label for="" class="lbl-form-receta">Ocación: </label>
                                <select name="ocacion" id="ocacion" class="form-control">
                                    <option value="0">-Seleccione-</option>
                                    <option value="cualquiera">Cualquiera</option>
                                    <option value="desayuno">Desayuno</option>
                                    <option value="almuerzo">Almuerzo</option>
                                    <option value="cena">Cena</option>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-2 filtro">
                                <label for="" class="lbl-form-receta">País: </label>
                                <select name="pais" id="pais" class="form-control">
                                    <option value="0">-Seleccione-</option>
                                        <?php 
                                        $sel = $conn ->query("SELECT * FROM tblpais");
                                    
                                        while ($row=$sel->fetch_array()) {
                                        ?>
                                        <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                        <?php	
                                        }
                                        ?>
                                </select>
                            </div>

                            
                        </fieldset>
                        <div class="row caja-ingredientes">
                            <div class="col-lg-6 col-md-12 filtro">
                                <label for="" class="">Ingredientes</label>
                                <input type="text" onkeypress="pulsar(event)" name="tags" id="ingresar-ingredientes" class="form-control" placeholder="ingresar ingredientes" <?php echo $disabled; ?>>
                                <input type="hidden" name="ingrecientes-agregados" id="ingredientes-buscar">                                            
                            </div>
                            <div class="col-lg-6 col-md-12 contenedor-ingredientes" >
                                <label for="">Ingredientes a buscar</label>
                                <div class="col-lg-12 ingredientes-agregados form-control" id="ingredientes-agregados">
                                    
                                </div>  
                            </div>
                            
                        </div>
                        <button type="button" id="boton-enviar" class="boton boton-rojo btn-filtro">Filtrar</button>
                        <!-- <input type="submit" class="boton boton-rojo btn-filtro" value="Filtrar" /> -->
                    </form>
                        <button type="button" class="boton boton-rojo btn-filtro btn-filtro-ocultar" id="ocultar-filtros"><span aria-hidden="true">&times;</span></button>
                </nav><!-- Nav -->
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 sli-img" src="../img/slider-06.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sli-img" src="../img/slider-07.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sli-img" src="../img/slider-08.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sli-img" src="../img/slider-01.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sli-img" src="../img/slider-02.jpg" alt="Third slide">
                </div>
            </div>
               
        </div>    
         
    </section>

        <div class="row recetas" id="resultado-recetas"> 
            <button type="button" class="boton boton-rojo mostrar-filtro">
                Mostrar Filtros
            </button>
                                        
            <h1>Resultados</h1>
            <div class="row recetas-resultados">
                <?php
                    require_once "../vendor/stefangabos/zebra_pagination/Zebra_Pagination.php";
                    @$buscar = $_POST['buscar'];

                    // Hallamos el número total de elementos en la consualta:
                    if($buscar == "" ){
                        $numero_elementos = mysqli_num_rows(mysqli_query($conn,"SELECT re.recetaid FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid WHERE re.validar='2' LIMIT 25;"));
                        // echo "SELECT re.recetaid FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid WHERE re.validar='2' LIMIT 25;";
                    }else{
                        $numero_elementos = mysqli_num_rows(mysqli_query($conn,"SELECT re.recetaid FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid WHERE re.ocacion LIKE '%" . $buscar . "%' or re.validar='2' AND  MATCH(re.ingrediente,re.titulo,re.tags) AGAINST ('$buscar') LIMIT 25;"));
                        // echo "SELECT re.recetaid FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid WHERE re.ocacion LIKE '%" . $buscar . "%' or re.validar='2' AND  MATCH(re.ingrediente,re.titulo,re.tags) AGAINST ('$buscar') LIMIT 25;";
                    }

                    $renderizar = false;

                    if($numero_elementos > 0){
                        // Determinamos la cantidad de elementos a mostrar en la página
                        $numero_elementos_pagina = 4;
                        // Hacer paginación
                        $paginacion = new zebra_pagination();
                        // Numero total de elementos a paginar
                        $paginacion->records($numero_elementos);    
                        // Numero de elementos por página:
                        $paginacion->records_per_page($numero_elementos_pagina);
                        $page = $paginacion->get_page();  // Toma el número de la páginación por GET.
                        $empieza_aqui = (($page - 1) * $numero_elementos_pagina);

                        // $read = "SELECT re.recetaid, re.imagen,re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid WHERE validar='2' AND titulo LIKE '%" . $buscar . "%' LIMIT 25";
                        if($buscar == "" ){
                            $read = "SELECT re.recetaid, re.imagen, re.titulo, us.nombres, re.votacionacomulada, re.numeroVotaciones FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid WHERE re.validar='2' ORDER BY (re.votacionacomulada) DESC LIMIT $empieza_aqui, $numero_elementos_pagina;";
                        }else{
                            $read = "SELECT re.recetaid, re.imagen, re.titulo, re.ingrediente, re.tags, us.nombres, re.votacionacomulada, re.numeroVotaciones FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid WHERE re.ocacion LIKE '%" . $buscar . "%' or re.validar='2' AND MATCH(re.ingrediente,re.titulo,re.tags) AGAINST ('$buscar') ORDER BY (re.votacionacomulada) DESC LIMIT $empieza_aqui, $numero_elementos_pagina;";
                            // echo $read;
                        }

                        $sql_query= mysqli_query($conn,$read);
                        // echo $read;
                        $renderizar = true;
                    }else{
                        echo "No hay resultados";
                    }

                ?>
                <div class="col-12">
                    <div class="contenedor-recetas">
                        <?php
                            while ($receta = $sql_query->fetch_object()) :

                                if($receta->numeroVotaciones != null and $receta->numeroVotaciones != 0){
                                    $puntaje = bcdiv($receta->votacionacomulada/$receta->numeroVotaciones, '1', 1);
                                }else{
                                    $puntaje = 0;
                                }

                                $urlReceta = "../receta/".get_url_valid_text($receta->titulo."-".$receta->recetaid)."/";
                                
                        ?>
                        <div class="tarjetas">
                            <a href="<?php echo $urlReceta?>"
                                style="text-decoration: none">
                                <div class="tarjeta-img">
                                    <img class="tarjeta-img tam-img"
                                        src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $receta->imagen ) ?>">

                                </div>
                                <div class="tarjeta-info">
                                    <h3 class="card-title"><?= $receta->titulo; ?></h3>
                                    <p class="card-text">Por: <?= $receta->nombres; ?></p>
                                    <p class="card-text"> Puntaje: <?= $puntaje ?>
                                    <?php
                                        for ($i=1; $i <= $puntaje; $i++) { 
                                            echo "★";
                                        }
                                    ?>
                                
                                    </p>
                                    <p>
                                        <?php
                                            if(isset($receta->tags)){
                                                $buscar2 = explode(" ", $buscar);
                                                $palabras = "";
                                                $countPalabras = 0;
                                                for ($i=0; $i < count($buscar2); $i++) {
                                                    $boTitulo = stristr($receta->titulo, $buscar2[$i]);
                                                    $boTags = stristr($receta->tags, $buscar2[$i]);
                                                    $boIngrediente = stristr($receta->ingrediente, $buscar2[$i]);
                                                    $ocacion = "cualquiera desayuno almuerzo cena";
                                                    $boOcacion = stristr($ocacion, $buscar2[$i]);

                                                    if($boTags === false and $boTitulo === false and $boIngrediente === false and $boOcacion === false){
                                                        if($countPalabras == 0){
                                                            $palabras = $palabras." ".$buscar2[$i];
                                                        }else{
                                                            $palabras = $palabras.", ".$buscar2[$i];
                                                        }
                                                        $countPalabras = $countPalabras + 1;
                                                    }
                                                }
                                                if($countPalabras > 0 ){
                                                    echo $countPalabras > 1 ? "No contiene las palabras ":"No contiene la palabra ";echo"<u>".$palabras."</u>";
                                                }
                                                $palabras = "";
                                                $countPalabras = 0;
                                            }
                                            
                                        ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                        <?php endwhile; ?>
    
                    </div>
                </div>
            </div>
            <?php if(isset($renderizar) && $renderizar == true) : ?>
                        <div><?php $paginacion->render(); ?></div>
            <?php endif; ?>
                    
                    
        <!-- </div> -->
    </div>

    <?php include '../includes/footer.php' ?>

    <?php
        if(isset($_GET['msg']) && $_GET['msg'] == '1') :
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
                        // Hicieron click en "Sí"
                        //console.log("se elimina la venta");
                        // window.location.href="mis_recetas.php"
                    } 
            });
        </script>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"crossorigin="anonymous"></script>
    <!-- <script src="js/paginacion.js"></script> -->
    <!-- <script src="js/filtros.js"></script> -->

    <script>
        var cantPalabras = 0;
        var palabras = [];
        $("#ocultar-filtros").hide();
        $(".mostrar-filtro").hide();
        function FuntionResize() {
            var widthBrowser = window.outerWidth;
            var heightBrowser = window.outerHeight;
            if(widthBrowser < 1024){
                $(".mostrar-filtro").hide();
                $(".caja-blanca").show();
                $(".recetas").hide();
                $(".footer").hide();
                $("#ocultar-filtros").show();
            }else{
                $(".recetas").show();
                $(".footer").show();
                $("#ocultar-filtros").hide();
                $(".mostrar-filtro").hide();

            }

        }
        
        
        $(document).ready(function () {
           

            

            $("#ingresar-tags").keyup(function (e) { 
                if(e.keycode===13){
                    alert("presiono enter")
                    e.preventDefault();
                }
            });
            $(".mostrar-filtro").click(function (e) { 
                e.preventDefault();
                $(".caja-blanca").show();
                $(".mostrar-filtro").hide();
                $(".recetas").hide();
                $(".footer").hide();
            });

            $("#ocultar-filtros").click(function (e) { 
                e.preventDefault();
                $(".mostrar-filtro").show();
                $(".caja-blanca").hide();
                $(".recetas").show();
                $(".footer").show();
            });

            $("#boton-enviar").click(function (e) { 
                e.preventDefault();
                let tagsEnviar = "";
                for (let index = 0; index < palabras.length; index++) {
                    tagsEnviar += palabras[index];
                    if(index < palabras.length - 1){
                        tagsEnviar += ",";
                    }
                }
                $("#ingredientes-buscar").val(tagsEnviar);
                

                $.ajax({
                    type: "POST",
                    url: "recetas-filtro.php",
                    data: $("#form-filtros").serialize(),
                    success: function (response) {
                        // alert(response);
                        $('#resultado-recetas').html(response);
                        // $('#resultado-recetas').load('recetas-filtro.php');
                    }
                });
                return true;


            });
        });

        function pulsar(e) {
            if (e.keyCode === 13 && e.target.value !="") {
                e.preventDefault();
                let palabra = cantPalabras + " , " +"'"+e.target.value+"'";
                $("#ingredientes-agregados").append("<span class='tag' id='"+cantPalabras+"'>"+e.target.value+'<a onclick="eliminarPalabra('+palabra+')" class="eliminar text-dark"></a></span>');
                cantPalabras+=1;
                palabras.push(e.target.value);
                $("#ingresar-ingredientes").val("");
            }
        }

        function eliminarPalabra(e,palabra){
            for (let index = 0; index < palabras.length; index++) {
                if(palabras[index] === palabra){
                    palabras.splice(index, 1);
                }
            }
            $("#"+e).remove();
        }


    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../../admin/css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../../admin/css/style.css">
    <title>Rica Cocina</title>
</head>

<body>
    <header class="site-header" id="nav">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="../../index.php">
                    <img src="../../img/logo-rica-cociona3.png" class="logo" alt="Logotipo de Rica Cocina">
                </a>
                <nav class="navegacion">
                    <a href="vistas/recetas.php">Recetas</a>
                    <a href="admin/Usuario/form_usuario.php">Registrar</a>
                    <a href="#">Inicia Sesión</a>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="contenedor ingredientes">
            <div class="col-12 tit-receta">
                <h1> Titulo receta </h1>
            </div>
            <div class="row">

                <div class="col-4 iconos">
                    <ul>
                        <li><img src="../../img/num-per.png" alt=""></li>
                        <li><img src="../../img/paises.png" alt=""></li>
                        <li><img src="../../img/tipo-comida.png" alt=""></li>
                        <li><img src="../../img/tipo-receta.png" alt=""></li>
                        <li><img src="../../img/tipo-dieta.png" alt=""></li>
                        <li><img src="../../img/ocasion.png" alt=""></li>
                        <li><img src="../../img/tiempo.png" alt=""></li>
                    </ul>
                </div>
                <div class="col-4">

                    <?php 
                        $sel = $conn ->query("mostrar_info_recetas");
                                
                        while ($row=$sel->fetch_array()) {
                    ?> 
                    <h1>Ingredientes</h1>
                    <p> <?php echo $sel ?> </p>
                    
                    <?php	
                        }
                    ?>
                </div>
                <div>
                    <img src="" alt="">
                </div>
            </div>
        </div>

        <div class="contenedor">
            <div class="row">
                <h2>Preparacion</h2>
                <p> Sed sit amet eleifend ligula. Aenean sit amet tincidunt lacus. Etiam scelerisque, diam in tristique blandit, velit ipsum tempor nibh, sed posuere purus tellus vel mi. Praesent et metus metus. Quisque blandit, libero a faucibus varius,
                    mauris sapien venenatis libero, quis dapibus dolor diam vitae libero. Aliquam nec dapibus sapien, scelerisque tristique massa. Cras mattis augue et malesuada vestibulum. Fusce nec lectus enim. Suspendisse vel tellus sodales, finibus
                    lectus ac, gravida diam. Quisque at velit lorem. Quisque tincidunt orci quis mi varius lobortis. Vivamus tristique libero ut iaculis efficitur. In hendrerit sodales mollis. Donec nunc dolor, sollicitudin in urna quis, venenatis placerat
                    felis. Pellentesque lobortis magna in diam ullamcorper dignissim eget et libero. Sed molestie nec orci a pharetra. Fusce consequat velit vel lacus laoreet semper. Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                    per inceptos himenaeos. Quisque et eros eu ex tincidunt egestas. </p>
            </div>
            <div class="row">
                <h2>Receta echa por:</h2>
            </div>
        </div>
        <br><br>
    </main>

    <footer class="bgcolor">
        <div class="contenedor contenedor-footer">
            <div class="row footer-centrar py-4 d-flex align-items-center">
                <div class="col-2">
                    <h4 class="copy">Todos los Derechos Reservador 2020 &copy;</h4>
                </div>

                <div class="col-8 footer-img align-items-center">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#"><img class="mx-auto" src="../../img/twitter.svg" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><img class="mx-auto" src="../../img/facebook.svg" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><img class="mx-auto" src="../../img/instagram.svg" alt=""></a>
                        </li>
                    </ul>

                </div>
                <div class="col-2">
                    <a style="text-decoration: none" href="vistas/contacto/contacto.php">
                        <h2>Contáctenos</h2>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
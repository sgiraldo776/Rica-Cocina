<?php 
    session_start();
    include '../admin/conexion.php'; 
    include '../admin/util/funciones.php';
    include '../admin/util/validar_premium.php';

   
    if(isset($_SESSION['cuentaid'])){
        $id = $_SESSION['cuentaid'];
        $premium=validarPremium($id,$conn);
        // echo "<script>alert('true')</script>";

    }elseif($_SESSION['rol'] == 1 ){
        $premium= true;
        // echo "<script>alert('true')</script>";
    }
    else{
        $premium= false;
        // echo "<script>alert('False')</script>";
    }
    
    if(!$premium){
        $_SESSION['error'] = 1;
        header('location:'.$URL);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Importacion css bootstrap-->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/style-blog.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta name="description" content="Aquí se halla la magia de RicaCocina, donde encontrarás el cambio gastronómico en tu vida, con diferentes herramientas que permitirán una experiencia atrevida.">

    <!-- Facebook Card -->  
    <meta property="og:site_name" content="Rica Cocina" />
    <meta property="og:url" content="<?php echo $URL.$_SERVER["REQUEST_URI"];?>" />
    <meta property="og:type" content="article:Blog" />
    <meta property="og:title" content="Blog - Rica Cocina" />
    <meta property="og:description" content="He aquí una creación más de nuestros usuarios! ¿Deseas ver más creaciones? Ve a la sección de recetas y busca la indicada." />
    <meta property="og:image" content="<?php echo $URL."img/meta-img-recetas.png" ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Blog - Rica Cocina">
    <meta name="twitter:description" content="He aquí una creación más de nuestros usuarios! ¿Deseas ver más creaciones? Ve a la sección de recetas y busca la indicada.">
    <meta name="twitter:creator" content="@andercc2880">
    <meta name="twitter:image" content="<?php echo $URL."img/meta-img-recetas.png" ?>" >

    <!-- Schema.org para Google+ -->
    <meta itemprop="name" content="Blog - Rica Cocina">
    <meta itemprop="description" content="He aquí una creación más de nuestros usuarios! ¿Deseas ver más creaciones? Ve a la sección de recetas y busca la indicada.">
    <meta itemprop="image" content="<?php echo $URL."img/meta-img-recetas.png" ?>" >
    <title>Blog - Rica Cocina</title>
</head>
<body>
    <?php 
        if($_SESSION['rol'] == 1){
            include '../includes/header-admin.php';
        }else{
            include '../includes/header-user.php';
        }

    ?>

    <!-- <div id="carrusel-blog" class="carrusel-blog carousel contendor-slider slide" data-ride="carousel">
        <ol class="carousel-indicators ">
            <li data-target="#carrusel-blog" data-slide-to="0" class="active"></li>
            <li data-target="#carrusel-blog" data-slide-to="1"></li>
        <li data-target="#carrusel-blog" data-slide-to="2"></li> 
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="col-md-12 pt-4 pb-4 bg-image" style=" background-image:url(<?php echo $URL ?>img/slider-01.jpg);">
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <div class="card flex-md-row box-shadow h-md-250">
                                <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">World 1</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">Featured post</a>
                                </h3>
                                <div class="mb-1 text-muted">Nov 12</div>
                                <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">Continue reading</a>
                                </div>
                                <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="https://picsum.photos/200/250" data-holder-rendered="true">
                            </div>
                        </div>
                        <div class="col-md-6 mb-5">
                            <div class="card flex-md-row box-shadow h-md-250">
                                <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">World 1</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">Featured post</a>
                                </h3>
                                <div class="mb-1 text-muted">Nov 12</div>
                                <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">Continue reading</a>
                                </div>
                                <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="https://picsum.photos/200/250" data-holder-rendered="true">
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-md-12 pt-4 pb-4 bg-image" style=" background-image:url(<?php echo $URL ?>img/slider-02.jpg); height: 312px;">
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <div class="card flex-md-row box-shadow h-md-250">
                                <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">World 1</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">Featured post</a>
                                </h3>
                                <div class="mb-1 text-muted">Nov 12</div>
                                <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">Continue reading</a>
                                </div>
                                <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="https://picsum.photos/200/250" data-holder-rendered="true">
                             </div>
                        </div>
                        <div class="col-md-6 mb-5">
                            <div class="card flex-md-row box-shadow h-md-250">
                                <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">World 1</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">Featured post</a>
                                </h3>
                                <div class="mb-1 text-muted">Nov 12</div>
                                    <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                    <a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">Continue reading</a>
                                </div>
                                <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="https://picsum.photos/200/250" data-holder-rendered="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="container mt-5">
        <h1 class="display-1">Blog Rica Cocina</h1>
        <h2 class="display-4 mb-5">Nuevas publicaciones</h2>
        <div class="row mb-2">
            <div class="text-white rounded border border-dark">
                <div class="row">
                    
                    <div class="col-md-6 px-0 bg-red p-3 p-md-5">
                        <h1 class="display-4 font-italic text-white ">Title of a longer featured blog post</h1>
                        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
                        <p class="lead mb-0"><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/" class="text-white font-weight-bold">Continue reading...</a></p>
                    </div>
                    <div class="col-md-6 px-0">
                        <img src="https://picsum.photos/600/300" alt="">
                    </div>
                </div>
            </div>
            <div class="text-white rounded border border-dark mt-5">
                <div class="row">
                    <div class="col-md-6 px-0">
                            <img src="https://picsum.photos/600/300" alt="">
                    </div>
                    <div class="col-md-6 px-0 bg-red p-3 p-md-5">
                        <h1 class="display-4 font-italic text-white ">Title of a longer featured blog post</h1>
                        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
                        <p class="lead mb-0"><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/" class="text-white font-weight-bold">Continue reading...</a></p>
                    </div>
                </div>
            </div>
        </div> -->
        <main role="main" class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <h1 class="display-1">Blog Rica Cocina</h1>
                    <h2 class="pb-3 mb-4 display-3 font-italic border-bottom">
                        Mas publicaciones
                    </h2>
                    <?php 
                        $sql = "SELECT * From tblpublicacion where estado = 1";
                        if($resultadoSql = $conn->query($sql)){
                            while($publicacion = $resultadoSql->fetch_row()){
                                $titulo_publicacion = get_url_valid_text($publicacion[1]);
                                $titulo_publicacion = $titulo_publicacion."-".$publicacion[0];
                                ?>
                                <div class="text-white rounded border border-dark mt-5">
                                    <div class="row">
                                        <div class="col-md-6 px-0">
                                                <!-- <img src="https://picsum.photos/400/400" alt=""> -->
                                                <img class="img-previo" src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $publicacion[5] ) ?>">

                                        </div>
                                        <div class="col-md-6 px-0 bg-red p-3 p-md-5">
                                            <h3 class="display-4 font-italic text-white "><?= $publicacion[1] ?></h3>
                                            <p class="lead my-3"><?= substr(urldecode($publicacion[2]), 0, 100);  ?></p>
                                            <p class="lead mb-0"><a href="<?php echo $URL."blog/publicaciones/".$titulo_publicacion ?>" class="text-white font-weight-bold">Continuar leyendo</a></p>
                                        </div>
                                    </div>
                                </div>
                            
                            <?php
                            }
                        }

                        
                    
                    ?>
                    
                    
                </div><!-- /.blog-main -->

                <aside class="col-md-4 blog-sidebar">
                    <?php include '../includes/aside-blog.php'; ?>
                </aside><!-- /.blog-sidebar -->
            </div><!-- /.row -->
        </main><!-- /.container -->
    </div>
    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>
</html>
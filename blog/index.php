<?php 
    session_start();
    include '../admin/conexion.php'; 
    
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
    <?php include '../includes/header-admin.php' ?>

    <div id="carrusel-blog" class="carrusel-blog carousel contendor-slider slide" data-ride="carousel">
        <ol class="carousel-indicators ">
            <li data-target="#carrusel-blog" data-slide-to="0" class="active"></li>
            <li data-target="#carrusel-blog" data-slide-to="1"></li>
            <!-- <li data-target="#carrusel-blog" data-slide-to="2"></li> -->
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
        </div>
        <main role="main" class="container mt-5">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <h2 class="pb-3 mb-4 display-3 font-italic border-bottom">
                        Mas publicaciones
                    </h2>

                    <div class="text-white rounded border border-dark mt-5">
                        <div class="row">
                            <div class="col-md-6 px-0">
                                    <img src="https://picsum.photos/400/400" alt="">
                            </div>
                            <div class="col-md-6 px-0 bg-red p-3 p-md-5">
                                <h3 class="display-4 font-italic text-white ">Title of a longer featured blog post</h3>
                                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
                                <p class="lead mb-0"><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/" class="text-white font-weight-bold">Continue reading...</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-white rounded border border-dark mt-5">
                        <div class="row">
                            <div class="col-md-6 px-0">
                                    <img src="https://picsum.photos/400/400" alt="">
                            </div>
                            <div class="col-md-6 px-0 bg-red p-3 p-md-5">
                                <h3 class="display-4 font-italic text-white ">Title of a longer featured blog post</h3>
                                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
                                <p class="lead mb-0"><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/" class="text-white font-weight-bold">Continue reading...</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-white rounded border border-dark mt-5">
                        <div class="row">
                            <div class="col-md-6 px-0">
                                    <img src="https://picsum.photos/400/400" alt="">
                            </div>
                            <div class="col-md-6 px-0 bg-red p-3 p-md-5">
                                <h3 class="display-4 font-italic text-white ">Title of a longer featured blog post</h3>
                                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
                                <p class="lead mb-0"><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/" class="text-white font-weight-bold">Continue reading...</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-white rounded border border-dark mt-5">
                        <div class="row">
                            <div class="col-md-6 px-0">
                                    <img src="https://picsum.photos/400/400" alt="">
                            </div>
                            <div class="col-md-6 px-0 bg-red p-3 p-md-5">
                                <h1 class="display-4 font-italic text-white ">Title of a longer featured blog post</h1>
                                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
                                <p class="lead mb-0"><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/" class="text-white font-weight-bold">Continue reading...</a></p>
                            </div>
                        </div>
                    </div>

                </div><!-- /.blog-main -->

                <aside class="col-md-4 blog-sidebar">
                    <div class="p-3 mb-3 bg-yellow text-white rounded ">
                        <img src="https://picsum.photos/300/200" alt="">
                        <h4 class="font-italic text-white">About</h4>
                        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                    </div>

                    <div class="p-3 bg-red text-white last-entries">
                        <h4 class="font-italic text-white">Archives</h4>
                        <ol class="list-unstyled mb-0">
                            <li><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">March 2014</a></li>
                            <li><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">February 2014</a></li>
                            <li><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">January 2014</a></li>
                            <li><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">December 2013</a></li>
                            <li><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">November 2013</a></li>
                            <li><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">October 2013</a></li>
                            <li><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">September 2013</a></li>
                            <li><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">August 2013</a></li>
                            <li><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">July 2013</a></li>
                            <li><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">June 2013</a></li>
                            <li><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">May 2013</a></li>
                            <li><a href="<?php echo $URL ?>blog/publicaciones/primera-entrada/">April 2013</a></li>
                        </ol>
                    </div>
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
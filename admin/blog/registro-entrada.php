<?php 
    session_start();
    include '../conexion.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/summernote-bs4.min.css">
    
    <!--Importacion css bootstrap-->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/favicon.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta name="description" content="Crear una nueva publicacion para el blog ">

    <!-- Facebook Card -->  
    <meta property="og:site_name" content="Rica Cocina" />
    <meta property="og:url" content="<?php echo $URL.$_SERVER["REQUEST_URI"];?>" />
    <meta property="og:type" content="article:Blog" />
    <meta property="og:title" content="Crear publicacion - Rica Cocina" />
    <meta property="og:description" content="Crear una nueva publicacion para el blog " />
    <meta property="og:image" content="<?php echo $URL."img/meta-img-general.png" ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Crear publicacion - Rica Cocina">
    <meta name="twitter:description" content="Crear una nueva publicacion para el blog ">
    <meta name="twitter:creator" content="@andercc2880">
    <meta name="twitter:image" content="<?php echo $URL."img/meta-img-general.png" ?>" >

    <!-- Schema.org para Google+ -->
    <meta itemprop="name" content="Crear publicacion - Rica Cocina">
    <meta itemprop="description" content="Crear una nueva publicacion para el blog ">
    <meta itemprop="image" content="<?php echo $URL."img/meta-img-general.png" ?>" >
    <title>Crear publicacion - Rica Cocina</title>
    
</head>
<body>
    <?php include '../../includes/header-admin.php' ?>
    <div class="container mt-5">
        <h1 class="display-1">Crear Entrada Blog </h1>
        <div class="col-md-12">
            <form action="guardar-entrada.php" id="form-guardar" method="post" enctype="multipart/form-data">  
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="entry-title">Titulo</label>
                        <input type="text" name="entry-titulo" id="entry-title" class="form-control" placeholder="Titulo de la publicación">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="contenido">Contenido</label>
                        <div id="summernote" class="form-control"></div>
                        <input type="hidden" name="entry-contenido" id="entry-contenido">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="entry-img">Imagen</label>
                        <input type="file" name="entry-img" id="entry-img">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12 mt-5">
                        <input type="button" value="Guardar" class="boton boton-rojo btn-block" id="btn-guardar">
                    </div>
                </div>
            </form>
        </div>       
    </div>
    <?php include '../../includes/footer.php'; ?>

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

    <script src="../js/summernote-bs4.min.js"></script>

    <script>

         $('#summernote').summernote({
            placeholder: 'Agrega el contenido de la publicación',
            tabsize: 2,
            height: 400,
            width:1080,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
        });

        $(document).ready(function () {
            $("#btn-guardar").click(function (e) { 
                e.preventDefault();
                var isEmpty = $('#summernote').summernote('isEmpty');
                console.log(isEmpty);
                var html = $("#summernote").summernote("code");
                if($("#entry-title").val() != null && $("#entry-title").val() != ""){
                    if(!isEmpty){
                        if(validaImg("entry-img")){
                            // console.log(encodeURIComponent(html));
                            $("#entry-contenido").val(encodeURIComponent(html));
                            $("#form-guardar").submit();
                        }
                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: 'Ups...',
                            text: 'Falta contenido',
                        });
                        $("#summernote").focus().addClass("is-invalid");
                    }
                }else{
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        text: 'El titulo esta vacio',
                    });
                    $("#entry-title").focus().addClass("is-invalid");
                }
            });
        });

    </script>
    <script>
        function validaImg(id){
            if($(id).val() !=""){
                var uploadFile = document.getElementById(id).files[0];
                if (!window.FileReader) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        text: 'El navegador no soporta la lectura de archivos',
                    });
                    $(id).focus().addClass("is-invalid");
                    return false;
                }
                if (!(/\.(jpg|png|gif)$/i).test(uploadFile.name)) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        text: 'El archivo a adjunto no es una imagen',
                    });
                    $(id).focus().addClass("is-invalid");
                    return false;
                }
                else {
                    if (uploadFile.size > 200000){
                        console.log(uploadFile.size);
                        Swal.fire({
                            icon: 'warning',
                            title: 'Ups...',
                            text: 'La imagen supera 200 kb',
                        });
                        $(id).focus().addClass("is-invalid");
                        return false;
                    }
                    return true;
                }  

            }else {
                return false;
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    text: 'No ha Seleccionado la Imagen para la publicación',
                });
                $(id).focus().addClass("is-invalid");
            }
        }
    </script>
</body>
</html>
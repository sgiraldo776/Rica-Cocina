<?php 
    session_start();
    include '../conexion.php'; 
    include "../../includes/open-graph.php";
    if(!isset($_SESSION['rol'])){
        header('location: ../../vistas/login/iniciar_sesion.php');
    }else{
        if($_SESSION['rol'] !=1 ){
            header('location: ../../vistas/login/iniciar_sesion.php');
        }
    }
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

    <?php echo og("Editar publicacion - Rica Cocina","img/meta-img-general.png","Editar una publicacion para el blog"); ?>
    
</head>
<body>
    <?php include '../../includes/header-admin.php' ?>
    <?php
        $id = $_GET['id'];
        $sqlConsultaPublicacion = "SELECT * FROM tblpublicacion where id = $id";
        $resultConsultaPublicacion = $conn->query($sqlConsultaPublicacion);
        $fila = $resultConsultaPublicacion->fetch_row();
        
    
    ?>
    <div class="container mt-5">
        <h1 class="display-1">Crear Entrada Blog </h1>
        <div class="col-md-12">
            <form action="guardar-entrada.php?id=<?php echo $id ?>" id="form-guardar" method="post" enctype="multipart/form-data">  
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="entry-title">Titulo</label>
                        <input type="text" name="entry-titulo" id="entry-title" class="form-control" value="<?php echo $fila[1] ?>" placeholder="Titulo de la publicación">
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
                        <img class="receta-img" src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $fila[5] ) ?>">
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
            var contenido = decodeURIComponent("<?php echo $fila[2] ?>");
            $("#summernote").summernote("code",contenido);
            $("#btn-guardar").click(function (e) { 
                e.preventDefault();
                var isEmpty = $('#summernote').summernote('isEmpty');
                var html = $("#summernote").summernote("code");
                if($("#entry-title").val() != null && $("#entry-title").val() != ""){
                    if(!isEmpty){
                        if(document.getElementById("entry-img").files.length > 0){
                            if(validaImg("entry-img")){
                                $("#entry-contenido").val(encodeURIComponent(html));
                                $("#form-guardar").submit();
                            }
                        }else{
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
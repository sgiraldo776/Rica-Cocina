<?php
        $id = 2;
        session_start();
    ?>
    

    <?php 
    include '../../../admin/conexion.php'; 
    include "../../../includes/open-graph.php";

    $sel = $conn ->query("SELECT * FROM tblpublicacion where id = $id");
    $row=$sel->fetch_array();

    if($row[6] == 0 and !isset($_SESSION['cuentaid']) and !$_SESSION['rol'] == 1){
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
    <link rel="icon" type="image/png" href="../../../img/favicon.png">
    <link rel="stylesheet" href="../../../admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../admin/css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../../../admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/style-blog.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php echo og($row[1],"img/meta-img-general.png","Es una publicación de nuestro blog esperamos que lo disfruten"); ?>
</head>
<body>
    <?php include '../../../includes/header-admin.php' ?>
    <div class="container mt-5">
        <main role="main" class="container mt-5">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <div class="blog-post">
                        <h1 class="blog-post-title"><?php echo $row[1] ?></h1>
                        <p class="blog-post-meta small ">January 1, 2014 by <a href="#">Mark</a></p>
                        <div class="contenido-blog">
                            <?php
                                echo urldecode($row[2]);
                            ?>
                        </div>
                    </div><!-- /.blog-post -->
                </div><!-- /.blog-main -->

                <aside class="col-md-4 blog-sidebar">
                    <?php include '../../../includes/aside-blog.php' ?>
                </aside><!-- /.blog-sidebar -->
            </div><!-- /.row -->
        </main><!-- /.container -->
    </div>
    <?php include '../../../includes/footer.php'; ?>

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
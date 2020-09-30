<?php
        include('../../admin/conexion.php');
        session_start();
        if(!isset($_SESSION['rol'])){
            include '../includes/header-idx.php';
        }else{
            if($_SESSION['rol'] !=1 ){
                if($_SESSION['rol'] =2 ){
                    include '../../includes/header-user.php';
                }else {
                    include '../../includes/header-idx.php';
                }
            }else {
                include '../../includes/header-admin.php';
            }            
        }
        $id=$_GET['recetaid'];
        
        $sel = $conn ->query("SELECT re.titulo as 'Nombre', re.imagen as 'Imagen', re.ingrediente as 'Ingredientes', re.pasos as 'Pasos', re.cantidadpersonas as '#personas', re.tiempopreparacion as 'Tiempo', re.ocacion as 'Ocasion', re.tiporeceta as 'Tipo Receta', tc.nombre as 'Tipo Comida', pad.nombre as 'Padecimiento', td.nombre as 'Tipo Dieta', re.validar as 'Validar', concat_ws(' ', us.nombres, us.apellidos) as 'Usuario', pa.nombre as 'Pais', re.votacionacomulada as 'Votacion' FROM tblreceta as re INNER JOIN tbltipocomida as tc ON re.tipocomidaid=tc.tipocomidaid INNER JOIN tbltipodieta as td ON re.tipodietaid=td.tipodietaid INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid INNER JOIN tblpais as pa ON re.paisid = pa.paisid INNER JOIN tblpadecimiento as pad ON re.padecimientoid = pad.padecimientoid where recetaid='$id'");
                
        $row=$sel->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../../img/favicon.png">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../../admin/css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../../admin/css/style.css">
    <title>Rica Cocina</title>
</head>

<body>
    <main>
        <div class="contenedor ingredientes">
            <div class="col-12 tit-receta">
                <h1> <?php echo $row[0] ?>  </h1>                
            </div>
            <div class="row">

                <div class="col-4 iconos">
                    <ul>
                        <li><img src="../../img/num-per.png" alt=""><?php echo $row[4] ?> </li>
                        <li><img src="../../img/paises.png" alt=""><?php echo $row[13] ?></li>
                        <li><img src="../../img/tipo-comida.png" alt=""><?php echo $row[8] ?></li>
                        <li><img src="../../img/tipo-receta.png" alt=""><?php echo $row[7] ?></li>
                        <li><img src="../../img/tipo-dieta.png" alt=""><?php echo $row[10] ?></li>
                        <li><img src="../../img/ocasion.png" alt=""><?php echo $row[6] ?></li>
                        <li><img src="../../img/tiempo.png" alt=""><?php echo $row[5] ?></li>
                    </ul>
                </div>
                <div class="col-4">

                    <h1>Ingredientes</h1>
                    <p> <?php echo $row[2] ?> </p>
                    
                </div>
                <div class="col-4">
                <img class="" src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $row[1] ) ?>">
                </div>
            </div>
        </div>

        <div class="contenedor">
            <div class="row">
                <h1>Preparacion</h1>
                <p> <?php echo $row[3] ?></p>
            </div>
            <div class="row">
                <h1>Receta echa por:</h1>
                <p> <?php echo $row[12] ?></p>
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
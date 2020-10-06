<?php
        include('../../admin/conexion.php');
        session_start();
        if(!isset($_SESSION['rol'])){
            include '../../includes/header-idx.php';
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
<html lang="es">

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
            <div class="col-lg-12 col-md-12 col-sm-6 tit-receta">
                <h1> <?php echo $row[0] ?>  </h1>                
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 receta-img">
                <img class="receta-img" src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $row[1] ) ?>">
                </div>

                <div class="col-lg-4 col-md-6 col-sm-2 iconos">
                    <ul>
                        <li><img class="icon" src="../../img/num-per.png" alt=""><?php echo $row[4] ?> </li>
                        <li><img class="icon" src="../../img/paises.png" alt=""><?php echo $row[13] ?></li>
                        <li><img class="icon" src="../../img/tipo-comida.png" alt=""><?php echo $row[8] ?></li>
                        <li><img class="icon" src="../../img/tipo-receta.png" alt=""><?php echo $row[7] ?></li>
                        <li><img class="icon" src="../../img/tipo-dieta.png" alt=""><?php echo $row[10] ?></li>
                        <li><img class="icon" src="../../img/ocasion.png" alt=""><?php echo $row[6] ?></li>
                        <li><img class="icon" src="../../img/tiempo.png" alt=""><?php echo $row[5] ?></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-2">
                    <h2 class="titulo">Ingredientes</h2>
                    <p>
                        <?php
                        $ingrediente = $row[2];
                        ?>
                        <script type="text/javascript">
                            var guion = /-/gi;
                            var bd = <?php echo json_encode($ingrediente);?>;
                            var remp = bd.replace(guion,'<br>-');
                            document.write(remp); 
                        </script>
                    </p>
                </div>
            </div>
        </div>

        <div class="contenedor">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-4">
                    <h2 class="titulo">Preparación</h2>
                    <p>
                    <?php
                        $ingrediente = $row[3];
                        ?>
                        <script type="text/javascript">
                            var punto = /-/gi;
                            var bd = <?php echo json_encode($ingrediente);?>;
                            var remp = bd.replace(punto,'<br>');
                            document.write(remp); 
                        </script>
                    </p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-2">
                    <h2 class="titulo">Utensilios</h2>
                    <?php
                        $sel2 = $conn ->query("SELECT u.nombre FROM tblutensilios as u inner join tblrecetautensilio as ru ON ru.utensilioid = u.utensilioid where ru.recetaid='$id'");
                        while ($row2=$sel2->fetch_array()) {
                    ?>
                    <p> <?php echo $row2[0] ?></p>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <h2 class="titulo">Receta echa por: </h2>
                <h3 class="Persona"><?php echo $row[12]?></h3>
            </div>
        </div>
        <br><br>
    </main>

    <footer class="footer py-4 bgcolor">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 text-lg-left text-center">Copyright © Rica 2020</div>
                <div class="col-lg-6 my-3 my-lg-0 text-lg-center text-center">
                    <a class="btn btn-social mx-3" href="#!"><i class="fab fa-twitter"><img class="mx-auto" src="../../img/twitter.svg" style="max-width: 75%"></i></a>
                    <a class="btn btn-social mx-3" href="#!"><i class="fab fa-facebook-f"><img class="mx-auto" src="../../img/facebook.svg" style="max-width: 75%"></i></a>
                    <a class="btn btn-social mx-3" href="#!"><i class="fab fa-linkedin-in"><img class="mx-auto" src="../../img/instagram.svg" style="max-width: 75%"></i></a>
                </div>
                <div class="col-lg-3 text-lg-center text-center contac">
                    <h3><a href="vistas/contacto/contacto.php">Contáctenos</a></h3>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"crossorigin="anonymous"></script>
</body>

</html>
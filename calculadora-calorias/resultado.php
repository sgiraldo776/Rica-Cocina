<?php 
    session_start();    
    include '../admin/conexion.php'; 
    include "../includes/open-graph.php";
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
    <link rel="stylesheet" type="text/css" href="./calculadora.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php echo og("Calculadora De Calorias","img/meta-img-general.png","Calculadora de calorias"); ?>
</head>
<body>
    <?php include '../includes/header-user.php' ?>
    <div class="container mt-5 container-page">
       <?php
            switch ($_POST['genero']) {
                case '0':
                    $calorias = 66 + (13.7*$_POST['peso']) + (5 * $_POST['estatura']) - (6.75 * $_POST['years']);
                    break;
                
                case 1:
                    $calorias = 655  + (9.6*$_POST['peso']) + (1.8 * $_POST['estatura']) - (4.7 * $_POST['years']);
                    break;
            }
        
            switch ($_POST['actividad']) {
                case '0':
                    $actividad = 1.2;
                    break;
                case '1':
                    $actividad = 1.375;
                    break;
                case '2':
                    $actividad = 1.55;
                    break;
                case '3':
                    $actividad = 1.72;
                    break;    
                case '4':
                    $actividad = 1.9;
                    break; 
            }
        
            $mantener = $calorias*$actividad;
            $subir = $mantener+600;
            $bajar = $mantener-500;
       ?>
        <div class="col-lg-12 text-center">
            <h1>Tu resultado personal</h1>
        </div>
        <div class="row container-result">
            <div class="card-result">
                <h3>Bajar de peso</h3> 
                <div class="card-result-body">
                    <img src="../img/iconos-01.svg" alt="">
                    <p><?php echo $bajar ?> calorías</p>
                    <p>Para adelgazar 0.5kg en una semana</p>
                </div>
            </div>
            <div class="card-result">
                <h3>Mantener el peso</h3> 
                <div class="card-result-body">
                    <img src="../img/iconos-01.svg" alt="">
                    <p><?php echo $mantener ?> calorías</p>
                    <p>Al resultado del cálculo, restar 500. El resultado se da en calorías.</p>
                </div>
            </div>
            <div class="card-result">
                <h3>Subir de peso</h3> 
                <div class="card-result-body">
                    <img src="../img/iconos-01.svg" alt="">
                    <p><?php echo $subir ?> calorías</p>
                    <p>Para aumentar 0.5 kg en una semana</p>
                </div>
            </div>
            
        </div>
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
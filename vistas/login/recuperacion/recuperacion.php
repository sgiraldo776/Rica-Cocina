<?php
include('../../../admin/conexion.php');
$crr = $_GET['crr'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Contraseña</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../../../admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../admin/css/styles1.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../../img/favicon.png">
</head>

<body class="bgimg">
    <main class="col-12">                
        <div class="contenedor col-12 text-center">
            <div class="row col-12">
                <a class="navbar-brand" href="<?php echo $URL ?>">
                    <img src="<?php echo $URL ?>img/logo-rica-cociona3.png" class="logo" alt="Logotipo de Rica Cocina">
                </a>
                <div class="col-12">
                    <form action="cambio.php?crr=<?php echo $crr?>" method="POST" class="formulario">
                        <h1>Cambiar Contraseña</h1>
                        <h5 class="cond-cont">La contraseña debe tener como mínimo un caracter especial, una mayúscula y un número. Tambien debe ser mayor a cinco digitos. Los caracteres especiales permitidos son @ / * = ? $ #</h5>
                        <div class="row">
                            <?php
                            if(!empty($_GET['error'])){
                            $error =  $_GET['error'];    
                            switch($error){
                            case 1:
                            echo '<strong style="color:red">'.'La longitud del Password debe ser Superior a 5'.'</strong>';
                            break;                     
                            case 2:
                            echo '<strong style="color:red">'.'El Password debe contener minimo una letra en Mayuscula'.'</strong>';
                            break;
                            case 3:
                            echo '<strong style="color:red">'.'El Password debe contener minimo un Numero'.'</strong>';
                            break;    
                            case 4:   
                            echo '<strong style="color:red">'.'El Password debe contener minimo un caracter Especial'.'</strong>';
                            break;                                                                        
                            default:
                            break;                          
                                }  
                            }
                            ?>
                            <div class="col">
                                <label>Contraseña</label>
                                <input type="password" name="contrasena" class="form-control" placeholder="Ingrese la contraseña nueva contraseña" id="con1" onkeypress="return validarPassword(event);" required="required" pattern=".{6,20}">
                            </div>
                            <div class="col">
                                <label>Confirmar Contraseña</label>
                                <input type="password" name="contrasena2" class="form-control" placeholder="Confirme la contraseña" id="con2">
                            </div>
                            <span id="error2"></span>
                        </div>
                        <button type="submit" class="boton boton-amarillo" id="ingresar">CONFIRMAR CAMBIO </button>
                    </form>
                </div>
            </div>
        </div>

    </main>


    <!--JS de bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../admin/js/alerts.js"></script>

</body>

</html>
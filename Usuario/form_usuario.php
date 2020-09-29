<?php
 include "../admin/conexion.php";

    if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
            crossorigin="anonymous">
        <!--Importacion css bootstrap-->
        <link rel="stylesheet" type="text/css" href="../admin/css/style.css">
        <link rel="stylesheet" type="text/css" href="../admin/css/styles1.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap"
            rel="stylesheet">
        <link rel="icon" type="image/png" href="../img/favicon.png">
        <title>Registrarse</title>
    </head>
    <body>
        <header class="navbar navbar-expand-md navbar-dark" id="nav">
            <a href="../index.php"><img src="../img/LOGO-03.png" alt=""></a>
        </header>
        <div class="row">

            <main class="col-12">
                <div class="container text-center mt-4">
                    <div>
                        <h1>Registrarse</h1>
                    </div>
                    <!-- Div Nav-->
                    <div>
                        <form action="insertar_usuario.php" name="add_form" method="post">
                            <div class="card-body">
                                <fieldset class="fieldset">
                                    <legend class="legend">
                                        Información Personal</legend>
                                    <div class="row">
                                        <div class="col">
                                            <label>Nombre</label>
                                            <input
                                                type="text"
                                                name="nombre"
                                                class="form-control"
                                                placeholder="Ingrese el nombre"
                                                id="nombre"
                                                value="<?= !empty($_GET['error']) && !empty($_SESSION['datosIngUsuario']) ? 
                                                            $_SESSION['datosIngUsuario']['nombre'] : ''
                                                       ?>"
                                            >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Apellido</label>
                                            <input
                                                type="text"
                                                name="apellidos"
                                                class="form-control"
                                                placeholder="Ingrese los apellidos"
                                                id="apellido"
                                                value="<?= !empty($_GET['error']) && !empty($_SESSION['datosIngUsuario']) ? 
                                                            $_SESSION['datosIngUsuario']['apellidos'] : ''
                                                       ?>"                                                
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label>Fecha de Nacimiento</label>
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    name="fechanacimiento"
                                                    placeholder="Ingrese Fecha de Nacimiento"
                                                    id="fechanacimiento"
                                                    onblur="myFunction()"
                                                    value="<?= !empty($_GET['error']) && !empty($_SESSION['datosIngUsuario']) ? 
                                                            $_SESSION['datosIngUsuario']['fechanacimiento'] : ''
                                                            ?>"                                                     
                                                >
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <fieldset class="fieldset">
                                    <legend class="legend1">
                                        Usuario</legend>
                                    <div class="row">
                                        <div class="col">
                                            <label>Correo</label>
                                            <input
                                                type="email"
                                                class="form-control"
                                                name="correo"
                                                placeholder="Ingrese el correo"
                                                id="correo"
                                                value="<?= !empty($_GET['error']) && !empty($_SESSION['datosIngUsuario']) ? 
                                                            $_SESSION['datosIngUsuario']['correo'] : ''
                                                        ?>"                                                
                                            >
                                        </div>
                                    </div>
                                    
                                    <h5 class="cond-cont">La contraseña debe tener como mínimo un caracter especial, una mayúscula y un número. Tambien debe ser mayor a cinco digitos. Los caracteres especiales permitidos son @ / * = ? $ #
                                    </h5>

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
                                    <div class="row">
                                        <div class="col">

                                            <label>Contraseña</label>
                                            <input
                                                type="password"
                                                name="contrasena"
                                                class="form-control"
                                                placeholder="Ingrese una contraseña"
                                                id="con1"
                                                onkeypress="return validarPassword(event);"
                                                required="required"
                                                pattern=".{6,20}">
                                        </div>
                                        <div class="col">
                                            <label>Confirmar Contraseña</label>
                                            <input
                                                type="password"
                                                name="contrasena2"
                                                class="form-control"
                                                placeholder="Confirme la contraseña"
                                                id="con2">
                                        </div>
                                        <span id="error2"></span>
                                    </div>
                                    <div class="row terminos">
                                        <div class="col-md-12">
                                            <input type="checkbox" require="require" id="Terminos">
                                            <span>
                                                <a href="Terminos.html" target="blank_">He Leído y Acepto los Términos y Condiciones</a>
                                            </span>
                                        </div>
                                    </div>
                                </fieldset>
                                <button type="button" class="boton boton-amarillo">Registrarse</button>
                            </div>

                            <?php 
                                if(isset($_SESSION['datosIngUsuario'])){
                                    $_SESSION['datosIngUsuario'] = null;
                                }
                            ?>

                        </form>
                    </div>
                    <!-- Div Form -->
                </div>
                    <!-- Div Conetenedor -->
            </main>
        </div>

            <footer class="bgcolor">
                <div class="contenedor contenedor-footer">
                    <div class="row footer-centrar py-4 d-flex align-items-center">
                        <div class="col-2">
                            <h4>Todos los Derechos Reservador 2020 &copy;</h4>
                        </div>

                        <div class="col-8 footer-img align-items-center">
                            <ul class="list-inline text-center">
                                <li class="list-inline-item">
                                    <a href="#"><img class="mx-auto" src="../img/twitter.svg" alt=""></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img class="mx-auto" src="../img/facebook.svg" alt=""></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><img class="mx-auto" src="../img/instagram.svg" alt=""></a>
                                </li>
                            </ul>

                        </div>
                        <div class="col-2">
                        <a style="text-decoration: none" href="../vistas/contacto/contacto.php"><h2>Contáctenos</h2></a>
                        </div>
                    </div>
                </div>
            </footer>

            <!--JS de bootstrap-->
            <script
                src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
            <script
                src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                crossorigin="anonymous"></script>
            <script
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
                crossorigin="anonymous"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <!--validacion de capos vacios-->
            <script type="text/javascript" src="js/ValidarUsuario.js"></script>
            <!--validacion de capos vacios-->

            <script type="text/javascript" src="js/validarPass.js"></script>
    </body>
</html>
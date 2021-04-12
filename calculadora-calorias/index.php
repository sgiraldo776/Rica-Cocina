<?php 
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
    <div class="container mt-5">
        <main role="main" class="container container-page mt-5">
            <div class="col-lg-12 text-center">
                <h1>Calculadora de calorias</h1>
                <p>Para un cálculo correcto necesitamos algo de información básica sobre ti</p>
            </div>
            <form action="resultado.php" method="post">
                <div class="row calculadora-calorias">
                    <div class="col-md-6">
                        <fieldset class="opcion-calculadora">
                            <legend class="opcion-calculadora-paso">1</legend>
                            <p class="opcion-calculadora-paso-pregunta">¿Cuál es tu genero?</p>
                            <div class="row" id="padre-genero">
                                <div class="col-lg-6 col-md-12 opcion-calculadora-paso-checkbox">
                                    <img src="../img/iconos-02.svg" alt="" class="opcion-calculadora-icono">
                                    <!-- <button class="opcion-calculadora-btn" type="button" onClick="selectCheck('genero','1','btn-genero-hombre','padre-genero')" id="btn-genero-hombre">Hombre</button> -->
                                    <div class="opcion-calculadora-btn-container">
                                        <input type="radio" name="genero" id="genero-hombre" value="1" required>
                                        <label for="genero-hombre" class="opcion-calculadora-btn">Hombre</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 opcion-calculadora-paso-checkbox">
                                    <img src="../img/iconos-01.svg" alt="" class="opcion-calculadora-icono">
                                    <!-- <button class="opcion-calculadora-btn" type="button" onClick="selectCheck('genero','0','btn-genero-mujer','padre-genero)" id="btn-genero-mujer">Mujer</button> -->
                                    <div class="opcion-calculadora-btn-container">
                                        <input type="radio" name="genero" id="genero-mujer" value="0" required>
                                        <label for="genero-mujer" class="opcion-calculadora-btn">Mujer</label>
                                    </div>  
                                </div>
                            </div>
                            <!-- <input type="hidden" name="genero" id="genero"> -->
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="opcion-calculadora">
                            <legend class="opcion-calculadora-paso">2</legend>
                            <p class="opcion-calculadora-paso-pregunta">¿Cuál es tu edad?</p>
                            <div class="opcion-calculadora-paso-contenedor-input">
                                <input type="number" placeholder="21" name="years" class="opcion-calculadora-paso-input" required>
                                <p>Años</p>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset class="opcion-calculadora">
                            <legend class="opcion-calculadora-paso">3</legend>
                            <p class="opcion-calculadora-paso-pregunta">¿Cuánto mides?</p>
                            <div class="opcion-calculadora-paso-contenedor-input">
                                <input type="number" placeholder="170" name="estatura" class="opcion-calculadora-paso-input" required>
                                <p>cm</p>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="opcion-calculadora">
                            <legend class="opcion-calculadora-paso">4</legend>
                            <p class="opcion-calculadora-paso-pregunta">¿Cuánto pesas?</p>
                            <div class="opcion-calculadora-paso-contenedor-input">
                                <input type="number" placeholder="70" class="opcion-calculadora-paso-input" name="peso" required>
                                <p>kg</p>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <fieldset class="opcion-calculadora">
                            <legend class="opcion-calculadora-paso">5</legend>
                            <p class="opcion-calculadora-paso-pregunta">¿Cómo de activo eres a diario?</p>
                            <div class="row opcion-calculadora-paso-checkbox-container">
                                <div class="opcion-calculadora-paso-checkbox">
                                    <img src="../img/iconos-03.svg" alt="" class="opcion-calculadora-icono">
                                    <!-- <button class="opcion-calculadora-btn">No muy activo</button> -->
                                    <div class="opcion-calculadora-btn-container">
                                        <input type="radio" name="actividad" id="actividad-poco-activo" value="0" required>
                                        <label for="actividad-poco-activo" class="opcion-calculadora-btn">Poco o ningún ejercicio</label>
                                    </div> 
                                    <p>1 día a la semana o ningún día</p> 
                                </div>
                                <div class="opcion-calculadora-paso-checkbox">
                                    <img src="../img/iconos-04.svg" alt="" class="opcion-calculadora-icono">
                                    <!-- <button class="opcion-calculadora-btn">Medianamente activo</button> -->
                                    <div class="opcion-calculadora-btn-container">
                                        <input type="radio" name="actividad" id="actividad-medianamente-ejercicio-ligero" value="1" required>
                                        <label for="actividad-ejercicio-ligero" class="opcion-calculadora-btn">Ejercicio ligero</label>
                                    </div>  
                                    <p>1 a 3 días a la semana</p>
                                </div>
                                <div class="opcion-calculadora-paso-checkbox">
                                    <img src="../img/iconos-05.svg" alt="" class="opcion-calculadora-icono">
                                    <!-- <button class="opcion-calculadora-btn">Activo</button> -->
                                    <div class="opcion-calculadora-btn-container">
                                        <input type="radio" name="actividad" id="actividad-ejercicio-moderado" value="2"required>
                                        <label for="actividad-ejercicio-moderado" class="opcion-calculadora-btn">Ejercicio moderado</label>
                                    </div>  
                                    <p>3 a 5 días a la semana</p>
                                </div>
                                <div class="opcion-calculadora-paso-checkbox">
                                    <img src="../img/iconos-06.svg" alt="" class="opcion-calculadora-icono">
                                    <!-- <button class="opcion-calculadora-btn">Muy activo</button> -->
                                    <div class="opcion-calculadora-btn-container">
                                        <input type="radio" name="actividad" id="actividad-deportista" value="3" required>
                                        <label for="actividad-deportista" class="opcion-calculadora-btn">Deportista </label>
                                    </div> 
                                    <p>6 -7 días a la semana</p>
                                </div>
                                <div class="opcion-calculadora-paso-checkbox">
                                    <img src="../img/paises.png" alt="" class="opcion-calculadora-icono">
                                    <!-- <button class="opcion-calculadora-btn">Muy activo</button> -->
                                    <div class="opcion-calculadora-btn-container">
                                        <input type="radio" name="actividad" id="actividad-Atleta" value="4" required>
                                        <label for="actividad-Atleta" class="opcion-calculadora-btn">Atleta</label>
                                    </div>  
                                    <p>Entrenamientos mañana y tarde</p>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="row submit-btn">
                        <button type="submit" class="boton boton-rojo centrate-gonorrea">Calcular tus calorías diarias recomendas</button>
                    </div>  
                </div>
                
            </form>

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
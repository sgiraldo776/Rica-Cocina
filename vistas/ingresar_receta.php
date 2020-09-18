<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../admin/css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../admin/css/style.css">
    <title>Rica Cocina</title>
</head>

<body>
    <header class="site-header" id="nav">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.html">
                    <img src="../img/logo-rica-cociona3.png" class="logo" alt="Logotipo de Rica Cocina">
                </a>
                <nav class="navegacion">
                    <a href="vistas/recetas.php">Recetas</a>
                    <a href="#">Registrate</a>
                    <a href="#">Recetas</a>
                    <a href="admin/Usuario/form_usuario.php">Registrar</a>
                    <a href="#">Inicia Sesión</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="col-md-12">

        <div class="contenedor">
            <div class="row">
                <div class="container text-center">
                    <div>
                        <h1>Registra una receta</h1>
                    </div>
                    <!-- Div Nav-->

                    <div class="card-body">
                        <form action="">

                            <fieldset>
                                <label for="">Nombre de la receta</label>
                                <input type="text" class="form-control" placeholder="Ingrese el nombre de la receta">

                                <label for="Ingredientes">Ingredientes</label>
                                <textarea name="" id="" cols="30" rows="10" class="form-control"> </textarea>

                                <label for="">Preparación</label>
                                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>



                                <div class="row">
                                    <div class="col">
                                        <label for="">Tiempo de preparación</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="">Cantidad de personas</label>
                                        <input class="form-control" type="number" min="1" max="30">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">Ocación</label>
                                        <select name="" id="" class="form-control">
                                            <option value="" select-hidden disabled>-Seleccione-</option>
                                            <option value="desayuno">Desayuno</option>
                                            <option value="almuerzo">Almuerzo</option>
                                            <option value="cena">Cena</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">Tipo comida</label>
                                        <select name="" id="" class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">Tipo dieta</label>
                                        <select name="" id="" class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">País</label>
                                        <select name="" id="" class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">Tipo de receta</label>
                                        <select name="" id="" class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">Agregue una imágen</label>
                                        <input type="file" class="file" style="color: transparent">
                                    </div>
                                </div>

                            </fieldset>
                            <input type="submit" value="Enviar" class="boton boton-amarillo">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
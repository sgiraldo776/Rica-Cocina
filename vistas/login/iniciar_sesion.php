<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../../admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../admin/css/styles1.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/favicon.png">
</head>

<body>
    <main>

        <div class="contenedor col-12 text-center">
            <div class="row col-12">
                <div class="col-12">
                    <form action="config/login.php" method="POST">
                        <label for=""> Correo Electronico</label>
                        <input type="text" class="form-control" name ="usuario" placeholder="Digita tu Correo aqui">
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Tu contraseña">
                        <a href=""><span>¿Olvidaste tu contraseña?</span></a>
                        <br>
                        <button type="submit">INGRESAR </button>
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


    <!--validacion de capos vacios-->
    <script type="text/javascript" src="js/ValidarUsuario.js"></script>
    <!--validacion de capos vacios-->

</body>

</html>
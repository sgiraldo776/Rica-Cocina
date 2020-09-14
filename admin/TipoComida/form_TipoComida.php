<?php
 include "../conexion.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"><!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet"> 
    <title>Formulario Ingresar Tipo Comida</title>
</head>
<body>
    <header class="navbar navbar-expand-md navbar-dark" id="nav">
    <img src="../../img/LOGO-03.png" alt="">   
    </header>
    <div class="row">
        <nav class="col-2" id="nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-light" href="../Utensilios/form-utensilios.php">Utensilios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="../tipodieta/form_tipodieta.php">Tipo Dieta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="form_TipoComida.php">Tipo Comida</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="../Padecimiento/form_padecimiento.php">Padecimientos</a>
                </li>
            </ul><!-- UL -->
        </nav><!-- Nav -->
        <main class="col-10">
            <div class="container text-center mt-4">
                <div>
                    <h1>Ingresar Tipo Comida</h1>
                </div><!-- Div Nav-->
                <div>
                    <form action="insertar_tipocomida.php" name="add_form" method="post">
                        <label>Nombre:</label><br>
                        <input type="text" name="nombre" id="txt_tipocomida"placeholder="Ingresar Tipo Comida"><br><br>
                        <button type="button" onclick="validarformulario1();" class="boton boton-amarillo">Guardar</button> 
                    </form>
                </div><!-- Div Form -->
                <div class="mt-4">
                    <table class="table table-hover">
                        <thead class="thead">
                            <th>id</th>
                            <th>nombre</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <?php 
                        $sel = $conn ->query("SELECT * FROM tbltipocomida");
                        while ($fila = $sel -> fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $fila['tipocomidaid'] ?></td>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><a href="frm_actu_tipocomida.php?tipocomidaid=<?php echo $fila['tipocomidaid'] ?>">EDITAR</a></td>
                            <td><a href="eliminar_tipocomida.php?tipocomidaid=<?php echo $fila['tipocomidaid'] ?>">ELIMINAR</a></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div><!-- Div Lista -->
            </div><!-- Div Conetenedor -->
        </main>
    </div>
    <!--JS de bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!--validacion de capos vacios-->
    <script type="text/javascript" src="../js/camposvacios.js"></script>
     <!--validacion de capos vacios-->
</body>
</html>
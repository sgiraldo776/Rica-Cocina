<?php
    include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"><!--Importacion css bootstrap-->
    <title>Formulario Ingresar Utencilios</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <h1 style="color:white;">Rica Cocina</h1>
    </nav>
    <main>
        <div class="container text-center mt-4">
            <div>
                <h2>Ingresar Utencilios</h2>
            </div><!-- Div Nav-->
            <div>
                <form action="insertar-utencilio.php" method="post">
                    <label>Nombre:</label><br>
                    <input type="text" name="nombre"><br><br>
                    <input type="submit" name="Enviar" class="btn btn-primary">
                </form>
            </div><!-- Div Form -->
            <div class="mt-4">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <th>id</th>
                        <th>nombre</th>
                    </thead>
                    <?php 
                    $sel = $conn ->query("SELECT * FROM tblutensilios ");
                    while ($fila = $sel -> fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $fila['utensilioid'] ?></td>
                        <td><?php echo $fila['nombre'] ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div><!-- Div Lista -->
        </div><!-- Div Conetenedor -->
    </main>
    <!--JS de bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
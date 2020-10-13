<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="<?php echo $URL ?>admin/css/styles1.css">
    <link rel="icon" type="image/png" href="<?php echo $URL ?>img/favicon.png">
    <title>Rica Cocina</title>
</head>

<body>
<header class="site-header" id="nav">
        <div class="container contenido-header">
            <nav class="navbar navbar-expand-lg navbar-light navegacion">
                <div class="col-sm-4">
                    <a class="navbar-brand" href="<?php echo $URL ?>">
                        <img src="<?php echo $URL ?>img/logo-rica-cociona3.png" class="logo" alt="Logotipo de Rica Cocina">
                    </a>
                </div>
                <button class="navbar-toggler bt-color" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-sm-8">
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a href="<?php echo $URL ?>vistas/recetas.php">Recetas</a>
                            </li>
                            <li class="nav-item active">
                                <a href="<?php echo $URL ?>admin/recetas/receta_val.php">Admistracion Recetas</a>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tablas Maestras
                                </a>
                                <div class="dropdown-menu" style="background-color: #813531;" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?php echo $URL ?>admin/Utensilios/form-utensilios.php">Utensilios</a>
                                    <a class="dropdown-item" href="<?php echo $URL ?>admin/tipodieta/form_tipodieta.php">Tipo Dieta</a>
                                    <a class="dropdown-item" href="<?php echo $URL ?>admin/TipoComida/form_TipoComida.php">Tipo Comida</a>
                                    <a class="dropdown-item" href="<?php echo $URL ?>admin/Padecimiento/form_padecimiento.php">Padecimientos</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL ?>vistas/login/config/cerrar_sesion.php">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</body>

</html>
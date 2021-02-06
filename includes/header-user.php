
<!DOCTYPE html>
<html lang="es">

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
                            <li class="nav-item">
                                <a href="<?php echo $URL ?>vistas/mis_recetas.php">Mis Recetas</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL ?>vistas/ingresar_receta.php">Ingresar Receta</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Estado cuenta
                                </a>
                                <div class="dropdown-menu" style="background-color: #813531;" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?php echo $URL ?>vistas/perfil/perfil.php">Perfil</a>
                                    <a class="dropdown-item" href="<?php echo $URL ?>vistas/login/config/cerrar_sesion.php">Cerrar Sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</body>

</html>
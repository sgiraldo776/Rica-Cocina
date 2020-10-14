<?php
    include('../../admin/conexion.php');
    session_start();
    if(!isset($_SESSION['rol'])){
        header('location: ../login/iniciar_sesion.php');
    }else{
        if($_SESSION['rol'] !=2 ){
            header('location: ../login/iniciar_sesion.php');
        }
    }

    $id=$_GET['recetaid'];
        
    $sel = $conn ->query("SELECT re.titulo as 'Nombre', re.imagen as 'Imagen', re.ingrediente as 'Ingredientes', re.pasos as 'Pasos', re.cantidadpersonas as '#personas', re.tiempopreparacion as 'Tiempo', re.ocacion as 'Ocasion', re.tiporeceta as 'Tipo Receta', tc.nombre as 'Tipo Comida', pad.nombre as 'Padecimiento', td.nombre as 'Tipo Dieta', re.validar as 'Validar', pa.nombre as 'Pais', re.votacionacomulada as 'Votacion', us.usuarioid as 'usuario' FROM tblreceta as re INNER JOIN tbltipocomida as tc ON re.tipocomidaid=tc.tipocomidaid INNER JOIN tbltipodieta as td ON re.tipodietaid=td.tipodietaid INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid INNER JOIN tblpais as pa ON re.paisid = pa.paisid INNER JOIN tblpadecimiento as pad ON re.padecimientoid = pad.padecimientoid where recetaid='$id'");

    $fila=$sel->fetch_array();

    if($fila[14]  !=  $_SESSION['usuarioid']){
        header('location:'.$URL);
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="<?php echo $URL ?>img/favicon.png">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../../admin/css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../../admin/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                <button class="navbar-toggler bt-color" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-sm-8">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                        <a href="<?php echo $URL ?>vistas/login/config/cerrar_sesion.php">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="col-md-12">

        <div class="contenedor">
            <div class="row">
                <div class="container text-center">
                    <div>
                        <h1>Actualizar receta</h1>
                    </div>
                    <!-- Div Nav-->

                    <div class="card-body">
                        <form action="actualizar-receta.php" name="add_form" method="post" enctype="multipart/form-data">

                            <fieldset>
                                <input type="text" class="form-control" id="recetaid" name="recetaid" value="<?php echo $_GET['recetaid'] ?>" hidden>
                                <label for="">Nombre de la receta</label>
                                <input type="text" class="form-control" placeholder="Ingrese el nombre de la receta" id="nomreceta" name="nomreceta" value="<?php echo $fila[0] ?>">

                                <label for="Ingredientes">Ingredientes</label>
                                <textarea name="ingrediente" id="ingrediente" cols="30" rows="10" class="form-control" placeholder="-ingrediente1 -ingrediente2 -ingrediente3 ..."><?php echo $fila[2] ?></textarea>

                                <label for="">Preparación</label>
                                <textarea name="preparacion" id="preparacion" cols="30" rows="10" class="form-control" placeholder="-1.Paso1 -2.Paso2 -3.Paso3 ..."><?php echo $fila[3] ?></textarea>



                                <div class="row">
                                    <div class="col">
                                        <label for="">Tiempo de preparación</label>
                                        <input type="text" name="tiempo" class="form-control" id="tiempo" value="<?php echo $fila[5] ?>">
                                    </div>
                                    <div class="col">
                                        <label for="">Cantidad de personas</label>
                                        <input class="form-control" type="number" min="1" max="30" id="cantidadpersona" name="cantidadpersona" value="<?php echo $fila[4] ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">Ocación</label>
                                        <select name="ocacion" id="ocacion" class="form-control">
                                            <option value="0" select-hidden disabled>-Seleccione-</option>
                                            <?php 
                                            if ($fila[6]=='desayuno'){
                                            ?>
                                            <option value="desayuno" selected>Desayuno</option>
                                            <option value="almuerzo">Almuerzo</option>
                                            <option value="cena">Cena</option>
                                            <?php 
                                            }else{
                                                if ($fila[6]=='almuerzo'){
                                            ?>
                                            <option value="desayuno">Desayuno</option>
                                            <option value="almuerzo" selected>Almuerzo</option>
                                            <option value="cena">Cena</option>
                                            <?php 
                                            }else{
                                            ?>
                                            <option value="desayuno">Desayuno</option>
                                            <option value="almuerzo">Almuerzo</option>
                                            <option value="cena" selected>Cena</option>
                                            <?php 
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">Tipo comida</label>
                                        <select name="tipocomida" id="tipocomida" class="form-control">
                                            <option value="0" select-hidden disabled>-Seleccione el Tipo de Comida-</option>
                                            <?php 
                                             $sel = $conn ->query("SELECT * FROM tbltipocomida");
                            
                      		                while ($row=$sel->fetch_array()) {
                                                if ($fila[8] == $row[1]){
                                            ?>
                                            <option value="<?php echo $row[0] ?>" selected> <?php echo $row[1] ?></option>
                                            <?php
                                            }else{
                                            ?>
                                            <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                            <?php
                                            }	
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">Tipo dieta</label>
                                        <select name="tipodieta" id="tipodieta" class="form-control">
                                            <option value="0" select-hidden disabled>-Seleccione el Tipo de Dieta-</option>
                                            <?php 
                                             $sel = $conn ->query("SELECT * FROM tbltipodieta");
                            
                                             while ($row=$sel->fetch_array()) {
                                                if ($fila[10] == $row[1]){
                                            ?>
                                            <option value="<?php echo $row[0] ?>" selected> <?php echo $row[1] ?></option>
                                            <?php
                                            }else{
                                            ?>
                                            <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                            <?php
                                            }	
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">País</label>
                                        <select name="pais" id="pais" class="form-control">
                                            <option value="0" select-hidden disabled>-Seleccione el Pais-</option>
                                            <?php 
                                             $sel = $conn ->query("SELECT * FROM tblpais");
                            
                                             while ($row=$sel->fetch_array()) {
                                                if ($fila[12] == $row[1]){
                                            ?>
                                            <option value="<?php echo $row[0] ?>" selected> <?php echo $row[1] ?></option>
                                            <?php
                                            }else{
                                            ?>
                                            <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                            <?php
                                            }	
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">Tipo de receta</label>
                                        <select name="tiporeceta" id="tiporeceta" class="form-control">
                                            <option value="0" select-hidden disabled>-Seleccione-</option>
                                            <?php 
                                            if ($fila[7]=='Plato'){
                                            ?>
                                            <option value="Plato" selected>Plato</option>
                                            <option value="Postre">Postre</option>
                                            <option value="Bebida">Bebida</option>
                                            <option value="Snack">Snack</option>
                                            <?php 
                                            }else{
                                                if ($fila[7]=='Postre'){
                                            ?>
                                            <option value="Plato">Plato</option>
                                            <option value="Postre" selected>Postre</option>
                                            <option value="Bebida">Bebida</option>
                                            <option value="Snack">Snack</option>
                                            <?php 
                                            }else{
                                                if ($fila[7]=='Bebida'){
                                            ?>
                                            <option value="Plato">Plato</option>
                                            <option value="Postre">Postre</option>
                                            <option value="Bebida" selected>Bebida</option>
                                            <option value="Snack">Snack</option>
                                            <?php 
                                            }else{
                                            ?>
                                            <option value="Plato">Plato</option>
                                            <option value="Postre">Postre</option>
                                            <option value="Bebida">Bebida</option>
                                            <option value="Snack" selected>Snack</option>
                                            <?php
                                            }
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">Padecimiento</label>
                                        <select name="padecimiento" id="padecimiento" class="form-control">
                                            <option value="0" select-hidden disabled>-Seleccione el Padecimiento-</option>
                                            <?php 
                                             $sel = $conn ->query("SELECT * FROM tblpadecimiento");
                            
                                            while ($row=$sel->fetch_array()) {
                                                if ($fila[9] == $row[1]){
                                            ?>
                                            <option value="<?php echo $row[0] ?>" selected> <?php echo $row[1] ?></option>
                                            <?php
                                            }else{
                                            ?>
                                            <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                            <?php
                                            }	
                                            }
                                            ?>
                                        </select>
                                    </div>                                  
                                </div>
                                <div id="div_file" class="col">
                                    <p id="texto"> Imagen de receta</p>
                                    <input type="file" name="imagen" id="btn_enviar">
                                </div>
                                <div class="col">
                                    <label for="">Utensilios</label>
                                    <h5 class="cond-cont">Para seleccionar varios utensilios haga click sobre los utensilios deseados mientras presiona la tecla "Ctrl" o "Control" de su teclado o deje presionado el click del mouse mientras lo arrastra.
                                    </h5>
                                    <select multiple="yes" size="10" name="utensilios[]" id="utensilios" class="form-control">
                                        <?php 
                                        $sel2 = $conn ->query("SELECT * FROM tblrecetautensilio where recetaid='$id'");
                                        $array = [];
                                        $cont = 0;
                                        while ($row2=$sel2->fetch_array()) {
                                            $array[$cont]=$row2[0];
                                            $cont++;
                                        }
                                        print_r($array);
                                        $sel = $conn ->query("SELECT * FROM tblutensilios");
                                        $switch = false;
                                        while ($row=$sel->fetch_array()) {
                                            for ($i=0; $i < count($array); $i++) {
                                                if ($array[$i] == $row[0]){
                                                    $switch =true;
                                                    break;
                                                }
                                            }
                                            if($switch){
                                                echo "<option value=".$row[0]." selected>".$row[1]."</option>";
                                                
                                            }else{
                                                echo "<option value=".$row[0].">".$row[1]."</option>";
                                            }
                                            $switch = false;
                                        }?>
                                    </select>
                                </div>
                            </fieldset>
                            <input type="button" value="Enviar" class="boton boton-amarillo">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    if(isset($_GET['msg'])){
    ?>

    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Hecho!',
            text: 'Tu Receta ha sido actualizada correctamente',
            confirmButtonText: "Ver Mis Recetas",
            
        })
        .then(resultado => {
                if (resultado.value) {
                    // Hicieron click en "Sí"
                    //console.log("se elimina la venta");
                    window.location.href="../mis_recetas.php"
                } 
        });
    </script>

    <?php
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- Validacion Formulario Receta -->
    <script type="text/javascript" src="<?php echo $URL ?>admin/js/Validacion_actu_receta.js"></script>
</body>

</html>
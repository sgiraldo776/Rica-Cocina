<?php
    include('../admin/conexion.php');
    session_start();
        if(!isset($_SESSION['rol'])){
            header('location: login/iniciar_sesion.php');
        }else{
            if($_SESSION['rol'] !=2 ){
                header('location: login/iniciar_sesion.php');
            }else{
                include '../includes/header-user.php';
            }
        }
        
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css" >
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../admin/css/styles1.css">
    <link rel="stylesheet" type="text/css" href="../admin/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Rica Cocina</title>
</head>

<body>
    <main class="col-md-12">

        <div class="contenedor">
            <div class="row">
                <div class="container text-center">
                    <div>
                        <h1>Registra una receta</h1>
                    </div>
                    <!-- Div Nav-->

                    <div class="card-body">
                        <form action="ingreso/insertar_receta.php" name="add_form" method="post" enctype="multipart/form-data">

                            <fieldset>
                                <label for="">Nombre de la receta</label>
                                <input type="text" class="form-control" placeholder="Ingrese el nombre de la receta" id="nomreceta" name="nomreceta">

                                <label for="Ingredientes">Ingredientes</label>
                                <textarea name="ingrediente" id="ingrediente" cols="30" rows="10" class="form-control" placeholder="-ingrediente1 -ingrediente2 -ingrediente3 ..."></textarea>

                                <label for="">Preparación</label>
                                <textarea name="preparacion" id="preparacion" cols="30" rows="10" class="form-control" placeholder="-1.Paso1 -2.Paso2 -3.Paso3 ..."></textarea>

                                <div class="row">
                                    <div class="col">
                                        <label for="">Tiempo de preparación</label>
                                        <input type="text" name="tiempo" class="form-control" id="tiempo">
                                    </div>
                                    <div class="col">
                                        <label for="">Cantidad de personas</label>
                                        <input class="form-control" type="number" min="1" max="30" id="cantidadpersona" name="cantidadpersona">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">Ocación</label>
                                        <select name="ocacion" id="ocacion" class="form-control">
                                            <option value="0">-Seleccione-</option>
                                            <option value="cualquiera">Cualquiera</option>
                                            <option value="desayuno">Desayuno</option>
                                            <option value="almuerzo">Almuerzo</option>
                                            <option value="cena">Cena</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">Tipo comida</label>
                                        <select name="tipocomida" id="tipocomida" class="form-control">
                                            <option value="0">-Seleccione el Tipo de Comida-</option>
                                            <?php 
                                             $sel = $conn ->query("SELECT * FROM tbltipocomida");
                            
                      		                while ($row=$sel->fetch_array()) {
                                            ?>
                                            <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                            <?php	
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">Tipo dieta</label>
                                        <select name="tipodieta" id="tipodieta" class="form-control">
                                            <option value="0">-Seleccione el Tipo de Dieta-</option>
                                            <?php 
                                             $sel = $conn ->query("SELECT * FROM tbltipodieta");
                            
                      		                while ($row=$sel->fetch_array()) {
                                            ?>
                                            <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                            <?php	
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">País</label>
                                        <select name="pais" id="pais" class="form-control">
                                            <option value="0">-Seleccione el Pais-</option>
                                            <?php 
                                             $sel = $conn ->query("SELECT * FROM tblpais");
                            
                      		                while ($row=$sel->fetch_array()) {
                                            ?>
                                            <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                            <?php	
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">Tipo de receta</label>
                                        <select name="tiporeceta" id="tiporeceta" class="form-control">
                                            <option value="0">-Seleccione el Tipo de Receta-</option>
                                            <option value="Indefinido">Indefinido</option>
                                            <option value="Plato">Plato</option>
                                            <option value="Postre">Postre</option>
                                            <option value="Bebida">Bebida</option>
                                            <option value="Snack">Snack</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">Padecimiento</label>
                                        <select name="padecimiento" id="padecimiento" class="form-control">
                                            <option value="0">-Seleccione el Padecimiento-</option>
                                            <?php 
                                             $sel = $conn ->query("SELECT * FROM tblpadecimiento");
                            
                      		                while ($row=$sel->fetch_array()) {
                                            ?>
                                            <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                            <?php	
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
                                        $sel = $conn ->query("SELECT * FROM tblutensilios");
                      		            while ($row=$sel->fetch_array()) {
                                        ?>
                                        <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                        <?php	
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="">Agregar tags para una mejor busqueda</label>
                                            <input type="text" onkeypress="pulsar(event)" name="tags" id="ingresar-tags" class="form-control" placeholder="ingresar las tags">
                                            <input type="hidden" name="tags-agregadas" id="tags-enviar">                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="">Tags Agregadas</label>
                                        <div class="col-lg-12" id="tags-agregadas">
                                            
                                        </div>  
                                    </div>
                                </div>
                            </fieldset>
                            <input type="button" value="Enviar" class="boton boton-amarillo" id="boton-enviar">
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
            text: 'Tu Receta ha sido registrada correctamente',
            confirmButtonText: "Ver Mis Recetas",
            
        })
        .then(resultado => {
                if (resultado.value) {
                    // Hicieron click en "Sí"
                    window.location.href="mis_recetas.php"
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

    <script>
        var cantPalabras = 0;
        var palabras = [];

        $(document).ready(function () {
            $("#ingresar-tags").keyup(function (e) { 
                if(e.keycode===13){
                    alert("presiono enter")
                }
            });
            $("#boton-enviar").click(function (e) { 
                e.preventDefault();
                let tagsEnviar = "";
                for (let index = 0; index < palabras.length; index++) {
                    tagsEnviar += palabras[index];
                    if(index < palabras.length - 1){
                        tagsEnviar += ",";
                    }
                }
                $("#tags-enviar").val(tagsEnviar);
                return true;
            });
        });

        function pulsar(e) {
            if (e.keyCode === 13 && e.target.value !="") {
                let palabra = cantPalabras + "," +"'"+e.target.value+"'";
                $("#tags-agregadas").append("<span class='tag' id='"+cantPalabras+"'>"+e.target.value+'<a onclick="eliminarPalabra('+palabra+')" class="eliminar text-dark"></a></span>');
                cantPalabras+=1;
                palabras.push(e.target.value);
                console.log(palabras);
                $("#ingresar-tags").val("");
            }
        }

        function eliminarPalabra(e,palabra){
            for (let index = 0; index < palabras.length; index++) {
                if(palabras[index] === palabra){
                    palabras.splice(index, 1);
                }
            }
            $("#"+e).remove();
        }
    </script>
    <script type="text/javascript" src="../admin/js/Validacionreceta.js"></script>
</body>

</html>
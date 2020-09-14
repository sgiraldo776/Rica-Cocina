<?php
 include "../conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"><!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Registrarse</title>
</head>
<body>
    <header class="navbar navbar-expand-md navbar-dark" id="nav">
        <h1 class="text-light">Rica Cocina</h1>
    </header>
    <div class="row">
       <!-- <nav class="bg-dark col-2">
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
            </ul> UL 
        </nav> Nav -->
        <main class="col-12">
            <div class="container text-center mt-4">
                <div>
                    <h2 class="text">Registrarse</h2>
                </div><!-- Div Nav-->
                <div>
                    <form action="insertar_usuario.php" name="add_form" method="post">
                    <div class="card-body">
                     <fieldset>
                         <legend> Información Básica 
                    <div class="row">
                     <div class="col">
                     	<label>Nombre</label>
                       <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre" id="nombre" >
                     </div>
                     </div>
                     <div class="row">
                     <div class="col">
                      <label>Apellido</label>
                      <input type="text" name="apellidos" class="form-control" placeholder="Ingrese los apellidos" id="apellido">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col">
                      	<label>Correo</label>
                      	<input type="email" class="form-control" name="correo" placeholder="Ingrese el correo" id="correo">
                      </div>
                      </div>
                      <div class="row">
                      <div class="col">
                      	<label>Fecha de Nacimiento</label>
                          <input type="date" class="form-control" name="Fchanacimiento" placeholder="Ingrese Fecha de Nacimiento" id="fechanacimiento">
                      </div>
                    </div>
                  </div>
                         </legend>
                     </fieldset>
                  <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12">

                    <label>Municipio</label>
                      	<select class="form-control" name="municipio" id="municipio">
                      		<option value="0" selected>Seleccione Municipio</option>
                              <?php 
                              $sel = $conn ->query("SELECT * FROM tblmunicipio");
                            
                      		 while ($row=$sel->fetch_array()) {
                            ?>
                            <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                            <?php	
                          }
                          ?>
                        </select>
                   </div>
                 </div>
               </div>
               <div class="row">
                   <div class="col">
                    <label>Contraseña</label>
                    <input type="password" name="contrasena" class="form-control" placeholder="Ingrese una contraseña" id="con1" >
                  </div>
                  <div class="col">
                    <label>Confirmar Contraseña</label>
                    <input type="password" class="form-control" placeholder="Confirme la contraseña" id="con2">
                  </div>
                  <span id="error2"></span>
                </div>
                  <br><br>
                        <button type="submit" onclick="validarformulario()" class="boton boton-amarillo">Registrarse</button> 
                    </form>
                </div><!-- Div Form -->
            
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





   <!--  <script>
  $(document).ready(function(){
    $(":input").inputmask();
    or
    Inputmask().mask(document.querySelectorAll("input"));
  });
</script>


     <script>
$(document).ready(function(){
  $("#con2").keyup(function () {
    validar("con2","con1");
  })
  $("#con1").keyup(function () {
    validar("con2","con1");
  })
$("#frmcliente").on('submit', function(evt) {
  evt.preventDefault();
  if($('#nombre').val()!=""){
    if($('#apellido').val()!=""){
        if($('#correo').val()!=""){
          if($('#fechanacimiento').val()!=0){
            if($('#municipio').val()!=0){
              if($('#con1').val()!=""){
                if($('#con2').val()!=""){
                  validar("con2","con1");
                  
                    this.submit();
                }else{
                alerta("error","No ha confirmado la contraseña");
                $('#con2').focus().addClass("is-invalid");
              }
              }else{
                alerta("error","No ha ingresado la contraseña");
                $('#con1').focus().addClass("is-invalid");
              }
            
            }else{
              alerta("error","No ha seleccionado ningun municipio");
              $('#municipio').focus().addClass("is-invalid");
            }
          
          }else{
          alerta("error","No ha ingresado la fecha de nacimiento");
          $('#fechanacimiento').focus().addClass("is-invalid");
        }
        }else{
        alerta("error","No ha ingresado el correo");
        $('#correo').focus().addClass("is-invalid");
        }

    }else{
      alerta("error","No ha ingresado los apellidos");
      $('#apellido').focus().addClass("is-invalid");

    }
  
  }else{
    alerta("error","No ha ingresado el nombre");
    $('#nombre').focus().addClass("is-invalid");
  }
  
})
$('#file-input').attr('disabled','disabled');
$('#salud').change(function(){
  if ($('#salud').is(':checked')){
    $('#file-input').removeAttr('disabled');
  }else{
    $('#file-input').attr('disabled','disabled');
  }
});
});


</script>-->

</body>
</html>
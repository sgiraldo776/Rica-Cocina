<?php
    require "../admin/conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$fechanaci=$_POST['fechanacimiento'];
$correo=$_POST['correo'];
$municipio=$_POST['municipio'];
$password=$_POST['contrasena'];
$password=hash("sha256", $password);


if(isset($_POST['contrasena'])){
  $validador = 0;
  $passw = $_POST['contrasena'];

  $arrPass = str_split($passw);


if(strlen($passw) < 6){
$validador = 1;			
  }

if($validador == 0){
for($i = 0; $i < count($arrPass); $i++) {
  if (ctype_upper($arrPass[$i])) {
              $validador = 0;
          break;
          } else {
              $validador = 2;                
          }
}   
}
         
  if($validador == 0){
      for($i = 0; $i < count($arrPass); $i++) {
          $caracter = $arrPass[$i];
          switch($caracter){
              case '0':
                  $validador = 0;
              break;                     
              case '1':
                  $validador = 0;
              break;
              case '2':
                  $validador = 0;
              break;    
              case '3':
                  $validador = 0;
              break;      
              case '4':
                  $validador = 0;
              break;   
              case '5':
                  $validador = 0;
              break; 
              case '6':
                  $validador = 0;
              break;
              case '7':
                  $validador = 0;
              break;    
              case '8':
                  $validador = 0;
              break;  
              case '9':
                  $validador = 0;
              break;                                                                              
              default:
              $validador = 3;
              break;                          
          }
          if($validador == 0){
          break;
          }
      }                
  }

  if($validador == 0){
      for($i = 0; $i < count($arrPass); $i++) {
          switch($arrPass[$i]){
              case '@':
                  $validador = 0;
              break;                     
              case '/':
                  $validador = 0;
              break;
              case '*':
                  $validador = 0;
              break;    
              case '=':
                  $validador = 0;
              break;      
              case '?':
                  $validador = 0; 
              break;
              case '$':
                $validador = 0; 
              break;
              case '#':
                $validador = 0; 
              break;                                                                           
              default:
              $validador = 4;
              break;                          
          } 
          if($validador == 0){
          break;
          }
      }            
  }

  if($validador == 0){

    $sql="INSERT INTO tblusuario (Nombres, apellidos, fechanacimiento, municipioid)
VALUES ('$nombre', '$apellidos', '$fechanaci', '$municipio' )";


    if ($conn->query($sql)) {
      // Ingresando la cuenta del último usuarioid registrado en la tabla tblusuario:
      $sql2="INSERT INTO tblcuenta (correoelectronico,password,tiporolid,estado,usuarioid)
      VALUES ('$correo', '$password', 2, 1, (SELECT usuarioid FROM tblusuario ORDER BY usuarioid DESC LIMIT 1))";
  
      if ($conn->query($sql2)) {
        echo "<script>     location.href='form_usuario.php'; </script>";
      } else {
        $sql3="DELETE FROM tblusuario ORDER BY usuarioid DESC LIMIT 1";
        if ($conn->query($sql3)){
          echo "Error: " . $sql2 . "<br>". $conn->error;       
        } else {
          echo "Error: " . $sql3 . "<br>". $conn->error;
        } 
      }
  } else {
    echo "Error: " . $sql . "<br>". $conn->error;
  }
  
  $conn->close();

   }
  else {
      header("location:form_usuario.php?error=$validador"); // <= Redireccionamos la salida a la página index.php
      $conn->close();
  }
}


?>
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
              case '.':
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
    
    $sql1= $conn ->query("SELECT MAX(usuarioid) AS id FROM tblusuario");
     if ($row = $sql1->fetch_array()){
       $id = $row[0]+1;
       
     }
    
     
    $sql2="INSERT INTO tblcuenta (correoelectronico,password,tiporolid,estado,usuarioid)
    VALUES ('$correo','$password',2,1,'$id')";
    
    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
        echo "<script>     location.href='form_usuario.php'; </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $sql2 . "<br>". $conn->error;
    }
    $conn->close();
    
  }
  else {
      header("location:form_usuario.php?error=$validador"); // <= Redireccionamos la salida a la página index.php
      $conn->close();
  }
}


?>
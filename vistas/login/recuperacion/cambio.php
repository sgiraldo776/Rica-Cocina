<?php
    require "../../../admin/conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$crr = $_GET['crr'];
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
  }else {
    header("location:recuperacion.php?error=$validador&crr=$crr"); // <= Redireccionamos la salida a la página index.php
    $conn->close();
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
  }else {
    header("location:recuperacion.php?error=$validador&crr=$crr"); // <= Redireccionamos la salida a la página index.php
    $conn->close();
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
  }else {
    header("location:recuperacion.php?error=$validador&crr=$crr"); // <= Redireccionamos la salida a la página index.php
    $conn->close();
  }

  if($validador == 0){
    $sql2="UPDATE tblcuenta SET password='$password' where correoelectronico='$crr'";

    if ($conn->query($sql2)) {
      // Ingresando la cuenta del último usuarioid registrado en la tabla tblusuario:
        echo "<script> alert('La contraseña se cambio correctamente') </script>";
        header("location:../iniciar_sesion.php?crr=$crr");
    } else {
        #header("location:recuperacion.php?crr=$crr"); // <= Redireccionamos la salida a la página index.php
        $conn->close();
        echo "<script> alert('No se pudo actualizar la contraseña') </script>";
    }
  
    $conn->close();

  }else {
    header("location:recuperacion.php?error=$validador&crr=$crr"); // <= Redireccionamos la salida a la página index.php
    $conn->close();
  }
}

?>
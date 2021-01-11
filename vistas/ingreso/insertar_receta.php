<?php 
include "../../admin/conexion.php";
session_start();

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$nombre=$_POST['nomreceta'];
$ingrediente=$_POST['ingrediente'];
$preparacion=$_POST['preparacion'];
$tiempo=$_POST['tiempo'];
$cantidadpersona=$_POST['cantidadpersona'];
$ocacion=$_POST['ocacion'];
$tipocomida=$_POST['tipocomida'];
$tipodieta=$_POST['tipodieta'];
$pais=$_POST['pais'];
$tiporeceta=$_POST['tiporeceta'];
$padecimiento=$_POST['padecimiento'];
$imagen=$_FILES['imagen']['tmp_name'];
$tags=$_POST['tags-agregadas'];
if($imagen !=""){
  $imagen=addslashes(file_get_contents($imagen));
}
$utensilios=$_POST['utensilios'];


/*$sql="INSERT INTO tblreceta (titulo, imagen, ingrediente, pasos, cantidadpersonas, tiempopreparacion, ocacion, tiporeceta, tipocomidaid, padecimientoid, tipodietaid, validar, usuarioid, paisid, votacionacomulada) VALUES ('$nombre', $imagen , '$ingrediente', '$preparacion', '$cantidadpersona' , '$tiempo', '$ocacion', '$tiporeceta', '$tipocomida', 1 , '$tipodieta', '1', 7, '$pais', null)";*/


$sql="INSERT INTO tblreceta VALUES (null,'$nombre', '$imagen' , '$ingrediente', '$preparacion', '$cantidadpersona' , '$tiempo', '$ocacion', '$tiporeceta', '$tipocomida', '$padecimiento' , '$tipodieta', '1', '$_SESSION[usuarioid]', '$pais', 0,'$tags')";

if ($conn->query($sql) === TRUE) {
  for ($i=0;$i<count($utensilios);$i++){     
    $sql2="INSERT INTO tblrecetautensilio (utensilioid, recetaid) VALUES ('$utensilios[$i]',(SELECT recetaid FROM tblreceta ORDER BY recetaid DESC LIMIT 1))";
    if ($conn->query($sql2) === TRUE) {
    } else {
      $sql3="DELETE FROM tblreceta ORDER BY recetaid DESC LIMIT 1";
      if ($conn->query($sql3)){
        echo "Error: " . $sql2 . "<br>". $conn->error;       
      } else {
        echo "Error: " . $sql3 . "<br>". $conn->error;
      }
      $i = count($utensilios);
    }
  }
  echo "<script> location.href='../ingresar_receta.php?msg=1'; </script>";
} else {
  echo "Error: " . $sql . "<br>". $conn->error;
}

/* nota al momento de insertar la id del usuario, se tiene que insertar la sesion iniciada, osea que nos faltan las variables de sesiones :v */

/* "INSERT INTO `tblreceta` (`titulo`, `imagen`, `ingrediente`, `pasos`, `cantidadpersonas`, `tiempopreparacion`, `ocacion`, `tiporeceta`, `tipocomidaid`, `padecimientoid`, `tipodietaid`, `validar`, `usuarioid`, `paisid`, `votacionacomulada`) VALUES ('$nombre',  '$imagen', '$ingrediente', '$preparacion', '$cantidadpersona', '$tiempo', '$ocacion', '$tiporeceta', '$tipocomida', 1, '$tipodieta', '1', 77, '$pais', 5)" */

?>
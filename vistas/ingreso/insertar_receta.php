<?php 
include "../../admin/conexion.php";

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
$imagen=$_FILES['imagen']['tmp_name'];
$imagen=addslashes(file_get_contents($imagen));


$sql="INSERT INTO tblreceta (titulo, imagen, ingrediente, pasos, cantidadpersonas, tiempopreparacion, ocacion, tiporeceta, tipocomidaid, padecimientoid, tipodietaid, validar, usuarioid, paisid, votacionacomulada) VALUES ('$nombre', '$imagen' , '$ingrediente', '$preparacion', '$cantidadpersona' , '$tiempo', '$ocacion', '$tiporeceta', '$tipocomida', 1 , '$tipodieta', '1', 4, '$pais', null)";

/* nota al momento de insertar la id del usuario, se tiene que insertar la sesion iniciada, osea que nos faltan las variables de sesiones :v */

if ($conn->query($sql) === TRUE) {
    echo "<script>     location.href='../ingresar_receta.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>". $conn->error;
}

/* "INSERT INTO `tblreceta` (`titulo`, `imagen`, `ingrediente`, `pasos`, `cantidadpersonas`, `tiempopreparacion`, `ocacion`, `tiporeceta`, `tipocomidaid`, `padecimientoid`, `tipodietaid`, `validar`, `usuarioid`, `paisid`, `votacionacomulada`) VALUES ('$nombre',  '$imagen', '$ingrediente', '$preparacion', '$cantidadpersona', '$tiempo', '$ocacion', '$tiporeceta', '$tipocomida', 1, '$tipodieta', '1', 77, '$pais', 5)" */

?>


<?php
require "../../admin/conexion.php";
session_start();
if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$nombre=$_POST['nombre'];
$apellido=$_POST['apellidos'];
$fecha=$_POST['fechanacimiento'];

$sql = $conn ->query("UPDATE tblusuario SET nombres='$nombre', apellidos='$apellido', fechanacimiento='$fecha' WHERE usuarioid='$_SESSION[usuarioid]'");

if ($sql) {
    echo "<script> 	location.href='perfil.php?ntf=1'; </script>";
}else{
    echo "<script> 	location.href='perfil.php'; </script>";
	echo "<script> 	alert('pailas socio') </script>";
}
?>
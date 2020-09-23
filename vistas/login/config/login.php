<?php

require '../../../admin/conexion.php';

session_start();

$usuario = $_POST['usuario'];
$clave = $_POST['password'];

$sql = "SELECT COUNT(*) as contar from tblcuenta where correoelectronico='$usuario' and password='$clave'";

$consulta = $conn ->query($sql);

$array = mysqli_fetch_array($consulta);


if($array['contar']>0){
    echo "<script>     location.href='../../../index.html'; </script>";

}else{
    echo "<script> 	alert('datos incorrectos'); </script>";
    echo "<script>  location.href='../iniciar_sesion.php'; </script>";
}

?>
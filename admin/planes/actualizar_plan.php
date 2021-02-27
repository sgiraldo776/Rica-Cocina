<?php 
require "../conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$id=$_GET['id'];
$plan=$_POST['plan'];
$tiempo=$_POST['tiempo'];
$precio=$_POST['precio'];


$sql = $conn ->query("UPDATE tblplan SET descripcion='$plan', tiempo=$tiempo, precio=$precio WHERE id=$id");

if ($sql==true){
    echo "<script> alert ('Actualizado correctamente') </script>";
    echo "<script> 	location.href='form_plan.php'; </script>";
}else{
echo "<script> alert ('Error') </script>";
//echo "<script> 	location.href='form_plan.php'; </script>";
}

$conn->close();
?>
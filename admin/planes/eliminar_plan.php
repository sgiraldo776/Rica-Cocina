<?php 
require "../conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$id=$_GET['id'];


$del = $conn -> query(" DELETE FROM tblplan WHERE id='$id'");

if ($del==true){
    echo "<script> alert ('Eliminado correctamente') </script>";
    echo "<script> 	location.href='form_plan.php'; </script>";
}else{
echo "<script> alert ('Error') </script>";
echo "<script> 	location.href='form_plan.php'; </script>";
}

$conn->close();
?>
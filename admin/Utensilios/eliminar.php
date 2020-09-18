<?php 
include '../conexion.php';

$id =$_REQUEST['utensilioid'];

$del = $conn -> query("DELETE FROM tblutensilios WHERE utensilioid = '$id' ");

if ($del) {
	echo "<script> 	location.href='form-utensilios.php'; </script>";
}else{
	echo "<script> alert('El registro no pudo ser eliminado'); 	location.href='form-utensilios.php'; </script>";
}
?>
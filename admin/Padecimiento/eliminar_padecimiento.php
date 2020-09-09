<?php 
include '../conexion.php';

$id =$_REQUEST['padecimientoid'];

$del = $conn -> query("DELETE FROM tblpadecimiento WHERE padecimientoid = '$id' ");
if ($del) 


{
	echo "<script> 	location.href='form_padecimiento.php'; </script>";
}

else{
echo "<script> alert('El registro no pudo ser eliminado'); 	location.href='form_padecimiento.php'; </script>";
}



?>
<?php 
include '../conexion.php';

$id =$_REQUEST['tipodietaid'];

$del = $conn -> query("DELETE FROM tbltipodieta WHERE tipodietaid = '$id' ");
if ($del) 


{
	echo "<script> 	location.href='form_tipodieta.php'; </script>";
}

else{
echo "<script> alert('El registro no pudo ser eliminado'); 	location.href='form_tipodieta.php'; </script>";
}



?>
<?php 
include '../conexion.php';

$id =$_REQUEST['tipocomidaid'];

$del = $conn -> query("DELETE FROM tbltipocomida WHERE tipocomidaid = '$id' ");
if ($del) 


{
	echo "<script> 	location.href='form_tipocomida.php'; </script>";
}

else{
echo "<script> alert('El registro no pudo ser eliminado'); 	location.href='form_tipocomida.php'; </script>";
}

?>
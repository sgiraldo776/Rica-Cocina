<?php include '../conexion.php';

$id = $_POST['padecimientoid'];
$nombre = $_POST['nombre'];


$up = $conn -> query("UPDATE tblpadecimiento SET nombre='$nombre' WHERE padecimientoid='$id' ");
if ($up) {
	echo "<script> 	location.href='form_padecimiento.php'; </script>";
}
else{
	echo "<script> 	location.href='frm_actu_padecimiento.php?id=".$id."'; 	</script>";
}

?>
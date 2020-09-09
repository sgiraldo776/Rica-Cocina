<?php include '../conexion.php';

$id = $_POST['tipocomidaid'];
$nombre = $_POST['nombre'];


$up = $conn -> query("UPDATE tbltipocomida SET nombre='$nombre' WHERE tipocomidaid='$id' ");
if ($up) {
	echo "<script> 	location.href='form_TipoComida.php'; </script>";
}
else{
	echo "<script> 	location.href='frm_actu_tipocomida.php?id=".$id."'; 	</script>";
}

?>
<?php include '../conexion.php';

$id = $_POST['tipodietaid'];
$nombre = $_POST['nombre'];


$up = $conn -> query("UPDATE tbltipodieta SET nombre='$nombre' WHERE tipodietaid='$id' ");
if ($up) {
	echo "<script> 	location.href='form_tipodieta.php'; </script>";
}
else{
	echo "<script> 	location.href='form_tipodieta.php?id=".$id."'; 	</script>";
}

?>
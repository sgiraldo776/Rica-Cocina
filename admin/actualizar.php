<?php include 'conexion.php';

$id = $_POST['utensilioid'];
$nombre = $_POST['nombre'];

$up = $conn -> query("UPDATE tblutensilios SET nombre='$nombre' WHERE utensilioid='$id' ");
if ($up) {
	echo "<script> 	location.href='form-utensilios.php'; </script>";
}
else{
	echo "<script> 	location.href='frm-actu-utensilio.php?id=".$id."'; 	</script>";
}

?>
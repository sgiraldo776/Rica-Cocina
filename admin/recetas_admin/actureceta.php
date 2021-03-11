<?php include '../conexion.php';

$id = $_GET['id'];

$estado=$conn->query("SELECT tblreceta.validar FROM tblreceta WHERE recetaid=$id ");
$fila = $estado ->fetch_assoc();
$estado=$fila['validar'];

if ($estado==2){
    $validar = $conn -> query("UPDATE tblreceta SET validar=1 WHERE recetaid='$id' ");
    echo "<script> 	location.href='recetas.php'; </script>";
}elseif($estado==1){

    $validar = $conn -> query("UPDATE tblreceta SET validar=2 WHERE recetaid='$id' ");
    echo "<script> 	location.href='recetas.php'; </script>";

}
$conn->close();

?>
<?php
include "../../admin/conexion.php";
session_start();

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$recetaid=$_GET['recetaid'];

$sql="UPDATE tblreceta SET validar='3'  WHERE recetaid=$recetaid";

if ($conn->query($sql) === TRUE) {

    echo "<script> location.href=' receta_val.php'; </script>";
} else {
    echo "Error: No se pudo denegar la receta" . $sql . "<br>". $conn->error;
}
?>
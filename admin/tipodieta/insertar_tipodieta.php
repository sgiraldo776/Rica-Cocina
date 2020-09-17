<?php 
require "../conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$nombre=$_POST['nombre'];

try {
    $sql="INSERT INTO tbltipodieta (nombre)
    VALUES ('$nombre')";

    if ($conn->query($sql) === FALSE) {
        throw new Exception("Ya hay un Tipo de Dieta con ese nombre", 1);
    } else {
        echo "<script> 	location.href='form_tipodieta.php'; </script>";
    }
} catch (Exception $e) {
    echo "<br>".$e->getMessage();
}

$conn->close();
?>
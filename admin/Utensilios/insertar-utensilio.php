<?php 
require "../conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$nombre=$_POST['nombre'];

try {
    $sql="INSERT INTO tblutensilios (nombre)
    VALUES ('$nombre')";

    if ($conn->query($sql) === FALSE) {
        throw new Exception("Ya hay un utensilio con ese nombre", 1);
    } else {
        echo "<script> 	location.href='form-utensilios.php'; </script>";
    }
} catch (Exception $e) {
    echo "<br>".$e->getMessage();
}


$conn->close();
?>
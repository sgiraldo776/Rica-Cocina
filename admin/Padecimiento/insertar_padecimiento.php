<?php 
require "../conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$nombre=$_POST['nombre'];

try {
    $sql="INSERT INTO tblpadecimiento (nombre)
    VALUES ('$nombre')";

    if ($conn->query($sql) === FALSE) {
        throw new Exception("Ya hay un Padecimiento con ese nombre", 1);
    } else {
        echo "<script> 	location.href='form_padecimiento.php'; </script>";
    }
} catch (Exception $e) {
    echo "<br>".$e->getMessage();
}
$conn->close();
?>
<?php 
require "../conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$plan=$_POST['plan'];





$conn->close();
?>
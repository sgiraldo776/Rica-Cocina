<?php
    require "../../admin/conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}
?>
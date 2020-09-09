<?php
    require "../conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}


$nombre=$_POST['nombre'];

$sql="INSERT INTO tbltipocomida (nombre)
VALUES ('$nombre')";

if ($conn->query($sql) === TRUE) {
    echo "<script> 	location.href='form_tipocomida.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

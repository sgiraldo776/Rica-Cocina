<?php
    require "../conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}


$sql="INSERT INTO 'tblusuario' (Nombres,apellidos,fechanacimiento)
VALUES ('$nombre')";

if ($conn->query($sql) === TRUE) {
    echo "<script> 	location.href='form_usuario.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

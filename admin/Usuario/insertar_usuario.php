<?php
    require "../conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$fechanaci=$_POST['Fechanacimiento'];
//$correo=$_POST['correo'];
$municipio=$_POST['municipio'];

$sql="INSERT INTO tblusuario (Nombres, apellidos, fechanacimiento, municipioid)
VALUES ('$nombre', '$apellidos', '$fechanaci', '$municipio' )";

if ($conn->query($sql) === TRUE) {
    echo "<script>     location.href='form_usuario.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
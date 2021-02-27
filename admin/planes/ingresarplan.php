<?php 
require "../conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$plan=$_POST['plan'];
$tiempo=$_POST['tiempo'];
$precio=$_POST['precio'];


$sql="INSERT INTO tblplan (descripcion, tiempo, precio) VALUES ('$plan', $tiempo, $precio)";

if ($conn->query($sql)){
    
    echo "<script> alert('Correcto');</script>";
    echo "<script> location.href='form_plan.php'; </script>";
}else{
    echo "Error: " . $sql . "<br>". $conn->error;
    echo "<script> location.href='form_plan'; </script>";
}

$conn->close();
?>
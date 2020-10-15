<?php
    require "admin/conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

if(!isset($_POST['buscar'])){
    $_POST['buscar'] = "";

    $buscar = $_POST['buscar'];
}


$buscar = $_POST['buscar'];

$read = "SELECT re.recetaid, re.imagen,re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid WHERE titulo LIKE '%" . $buscar . "%' ";

$sql_query= mysqli_query($conn,$read);



?>
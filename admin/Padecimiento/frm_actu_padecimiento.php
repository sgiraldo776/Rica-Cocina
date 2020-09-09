<?php include '../conexion.php';
$id = $_REQUEST['padecimientoid'];

// $_REQUEST Un array asociativo que por defecto contiene el contenido de $_GET, $_POST y $_COOKIE

$sel = $conn -> query("SELECT * FROM tblpadecimiento WHERE padecimientoid='$id' ");
if ($fila = $sel -> fetch_assoc()) {
}
 ?>
 <!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form action="actualizar_padecimiento.php" method="post">
    <input type="hidden" name="padecimientoid" value="<?php echo $id ?>">
    <input type="text" name="nombre" placeholder="Nombre Padecimiento" value="<?php echo $fila['nombre'] ?>"><br>
    <input type="submit" value="Actualizar">
</form>
</body>
</html>
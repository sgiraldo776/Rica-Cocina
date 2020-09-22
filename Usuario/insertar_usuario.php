<?php
    require "../admin/conexion.php";

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$fechanaci=$_POST['Fechanacimiento'];
$correo=$_POST['correo'];
$municipio=$_POST['municipio'];
$password=$_POST['contrasena'];

$sql="INSERT INTO tblusuario (Nombres, apellidos, fechanacimiento, municipioid)
VALUES ('$nombre', '$apellidos', '$fechanaci', '$municipio' )";

///////////////////////// Intentos de obtener el ultimo id registrado en el select anterior 



/*$sql1="SELECT usuarioid from tblusuario order by usuarioid desc limit 1";
if ($conn->query($sql1) === TRUE) {
  $lastid = $conn;
}*/

$sql1= $conn ->query("SELECT MAX(usuarioid) AS id FROM tblusuario");
 if ($row = $sql1->fetch_array()){
   $id = $row[0]+1;
   
 }

 //$sql1="SELECT TOP 1 usuarioid from tblusuario order by usuarioid desc";

/* mysqli_query($conn,$sql); 

 // Obtener el último id de inserción
 $lastid = mysqli_insert_id($conn);*/
 
$sql2="INSERT INTO tblcuenta (correoelectronico,password,tiporolid,estado,usuarioid)
VALUES ('$correo','$password',2,1,'$id')";

if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
    echo "<script>     location.href='form_usuario.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . $sql2 . "<br>". $conn->error;
}

$conn->close();
?>
<?php 
include "../../admin/conexion.php";
session_start();

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$idreceta = $_POST['recetaid'];
$nombre=$_POST['nomreceta'];
$ingrediente=$_POST['ingrediente'];
$preparacion=$_POST['preparacion'];
$tiempo=$_POST['tiempo'];
$cantidadpersona=$_POST['cantidadpersona'];
$ocacion=$_POST['ocacion'];
$tipocomida=$_POST['tipocomida'];
$tipodieta=$_POST['tipodieta'];
$pais=$_POST['pais'];
$tiporeceta=$_POST['tiporeceta'];
$padecimiento=$_POST['padecimiento'];
$imagen=$_FILES['imagen']['tmp_name'];
$imagen=addslashes(file_get_contents($imagen));
$utensilios=$_POST['utensilios'];


/*$sql="INSERT INTO tblreceta (titulo, imagen, ingrediente, pasos, cantidadpersonas, tiempopreparacion, ocacion, tiporeceta, tipocomidaid, padecimientoid, tipodietaid, validar, usuarioid, paisid, votacionacomulada) VALUES ('$nombre', $imagen , '$ingrediente', '$preparacion', '$cantidadpersona' , '$tiempo', '$ocacion', '$tiporeceta', '$tipocomida', 1 , '$tipodieta', '1', 7, '$pais', null)";*/


#$sql="INSERT INTO tblreceta VALUES (null,'$nombre', '$imagen' , '$ingrediente', '$preparacion', '$cantidadpersona' , '$tiempo', '$ocacion', '$tiporeceta', '$tipocomida', '$padecimiento' , '$tipodieta', '1', '$_SESSION[usuarioid]', '$pais', null)";

if($imagen != ""){
    $sql="UPDATE tblreceta SET titulo='$nombre', imagen='$imagen' , ingrediente='$ingrediente', pasos='$preparacion', cantidadpersonas='$cantidadpersona' , tiempopreparacion='$tiempo', ocacion='$ocacion', tiporeceta='$tiporeceta', tipocomidaid='$tipocomida', padecimientoid='$padecimiento' , tipodietaid='$tipodieta', validar='1', paisid='$pais' WHERE recetaid='$idreceta'";
}else{    
    $sql="UPDATE tblreceta SET titulo='$nombre', ingrediente='$ingrediente', pasos='$preparacion', cantidadpersonas='$cantidadpersona' , tiempopreparacion='$tiempo', ocacion='$ocacion', tiporeceta='$tiporeceta', tipocomidaid='$tipocomida', padecimientoid='$padecimiento' , tipodietaid='$tipodieta', validar='1', paisid='$pais' WHERE recetaid='$idreceta'";
}

$sql3="DELETE FROM tblrecetautensilio WHERE recetaid='$idreceta'";

if ($conn->query($sql) === TRUE) {
    if ($conn->query($sql3) === TRUE) {
        for ($i=0;$i<count($utensilios);$i++){     
            $sql2="INSERT INTO tblrecetautensilio (utensilioid, recetaid) VALUES ('$utensilios[$i]','$idreceta')";
            if ($conn->query($sql2) === TRUE) {
            } else {
                echo "Error: No se actualizaron los utensilios" . $sql2 . "<br>". $conn->error;
                $i = count($utensilios);
            }
        }
        echo "<script> location.href=' ../mis_recetas.php'; </script>";
    } else {
        echo "Error: Se actualizo la receta pero no los utensilios" . $sql3 . "<br>". $conn->error;
    }
} else {
    echo "Error: No se pudo Actualizar la receta" . $sql . "<br>". $conn->error;
}

/* nota al momento de insertar la id del usuario, se tiene que insertar la sesion iniciada, osea que nos faltan las variables de sesiones :v */

/* "INSERT INTO `tblreceta` (`titulo`, `imagen`, `ingrediente`, `pasos`, `cantidadpersonas`, `tiempopreparacion`, `ocacion`, `tiporeceta`, `tipocomidaid`, `padecimientoid`, `tipodietaid`, `validar`, `usuarioid`, `paisid`, `votacionacomulada`) VALUES ('$nombre',  '$imagen', '$ingrediente', '$preparacion', '$cantidadpersona', '$tiempo', '$ocacion', '$tiporeceta', '$tipocomida', 1, '$tipodieta', '1', 77, '$pais', 5)" */

?>
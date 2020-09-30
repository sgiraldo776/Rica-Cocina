<?php

require '../../../admin/conexion.php';

session_start();

$usuario = $_POST['usuario'];
$clave = $_POST['password'];
$clave=hash("sha256", $clave);

$sql = "SELECT * from tblcuenta where correoelectronico='$usuario' and password='$clave'";

$consulta = $conn ->query($sql);

//$array = mysqli_fetch_array($consulta);

$row=mysqli_fetch_array($consulta);


if($row == TRUE){

    $cuentaid=$row[0];
    $_SESSION['cuentaid']=$cuentaid;
    $usuarioid=$row[5];
    $_SESSION['usuarioid']=$usuarioid;
    $rol=$row[3];
    $_SESSION['rol']=$rol;
    switch($_SESSION['rol']){
        case 1:
            echo "<script>     location.href='../../../index.php'; </script>";
        break;
        case 2:
            echo "<script>     location.href='../../../index.php'; </script>";
        break;

        default:
    }

}else{
    echo "<script> 	alert('datos incorrectos'); </script>";
    echo "<script>  location.href='../iniciar_sesion.php'; </script>";
}



/*if($array['contar']>0){
    $_SESSION['username']= $usuario;
    $rol= $row[1];
    $_SESSION['rol']=$rol;
    switch($_SESSION['rol']){
        case 1:
            echo "<script>     location.href='../../../index.php'; </script>";
        break;
        case 2:
        break;

        default:
    }
    echo "<script>     location.href='../../../index.php'; </script>";
}else{
    echo "<script> 	alert('datos incorrectos'); </script>";
    echo "<script>  location.href='../iniciar_sesion.php'; </script>";
}*/

?>
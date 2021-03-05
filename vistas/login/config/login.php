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
    if($row[4] != 0){
        $hoy = date('Y-m-d');

        $cuentaid=$row[0];
        $_SESSION['cuentaid']=$cuentaid;
        $_SESSION['correoelectronico']=$usuario;
        $usuarioid=$row[5];
        $_SESSION['usuarioid']=$usuarioid;
        $rol=$row[3];
        $_SESSION['rol']=$rol;
        $_SESSION['premium'] = false;
        if($row[6] >= $hoy){
            $_SESSION['premium'] = true;
        }
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
        $sql1= "UPDATE tblcuenta SET estado=1 WHERE cuentaid='$row[0]'";

        if($conn->query($sql1) === TRUE){
            $cuentaid=$row[0];
            $_SESSION['cuentaid']=$cuentaid;
            $usuarioid=$row[5];
            $_SESSION['usuarioid']=$usuarioid;
            $rol=$row[3];
            $_SESSION['rol']=$rol;
            $hoy = date("Y-m-d"); 
            $_SESSION['premium'] = false;
            if($row[6] >= $hoy){
                $_SESSION['premium'] = true;
            }
            switch($_SESSION['rol']){
                case 1:
                    echo "<script>     location.href='../../../index.php'; </script>";
                break;
                case 2:
                    echo "<script>     location.href='../../../index.php?estado=1'; </script>";
                break;
        
                default:
            }
        }else{
            echo "<script>     alert('No se pudo cambiar el estado'); </script>";
        }

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

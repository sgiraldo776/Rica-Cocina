<?php 
session_start();
include '../conexion.php';
if($_SESSION['rol'] == 1){
    $premium=true;
}
if(isset($_SESSION['cuentaid']) and $_SESSION['rol'] == 1){
    if(empty($_GET['id'])){
        $usuario = $_SESSION['cuentaid'];
        $titulo = $_POST['entry-titulo'];
        $contenido = $_POST['entry-contenido'];
        $fecha = date('Y-m-d-h:i:s');
        $imagen=$_FILES['entry-img']['tmp_name'];
        if($imagen !=""){
            $imagen=addslashes(file_get_contents($imagen));
        }
        $sqlInsertEntrada = "INSERT INTO `tblpublicacion`(`titulo`, `contenido`, `fecha`, `usuario`, `img`, `Estado`) VALUES ('$titulo','$contenido','$fecha',$usuario,'$imagen',0)";
        if($conn->query($sqlInsertEntrada)){
            header('location: ver-publicaciones.php');
        }else{
            $_SESSION['error']="Ocucrrio un error en la base de datos intentelo mas tarde";
            header('location: ver-publicaciones.php');
        }
    }else{
        $id = $_GET['id'];
        $usuario = $_SESSION['cuentaid'];
        $titulo = $_POST['entry-titulo'];
        $contenido = $_POST['entry-contenido'];
        $fecha = date('Y-m-d-h:i:s');
        $imagen=$_FILES['entry-img']['tmp_name'];
        $sqlInsertEntrada = "UPDATE `tblpublicacion` SET `titulo` = '$titulo', `contenido` = '$contenido'  WHERE `id` = $id";
        if($imagen !=""){
            $imagen=addslashes(file_get_contents($imagen));
            $sqlInsertEntrada = "UPDATE `tblpublicacion` SET `titulo` = '$titulo', `contenido` = '$contenido',img='$imagen'  WHERE `id` = $id";
        }
        if($conn->query($sqlInsertEntrada)){
            header('location: ver-publicaciones.php');
        }else{
            $_SESSION['error']="Ocucrrio un error en la base de datos intentelo mas tarde";
            header('location: ver-publicaciones.php');
        }
    }
    
}



?>
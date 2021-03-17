<?php 
session_start();
include '../conexion.php';
if($_SESSION['rol'] == 1){
    $premium=true;
}
if(isset($_SESSION['cuentaid']) and $_SESSION['rol'] == 1){
    $usuario = $_SESSION['cuentaid'];
    $titulo = $_POST['entry-titulo'];
    $contenido = $_POST['entry-contenido'];
    $fecha = date('Y-m-d-h:i:s');
    $imagen=$_FILES['entry-img']['tmp_name'];
    if($imagen !=""){
        $imagen=addslashes(file_get_contents($imagen));
    }
    $sqlInsertEntrada = "INSERT INTO `tblpublicacion`(`titulo`, `contenido`, `fecha`, `usuario`, `img`, `Estado`) VALUES ('$titulo','$contenido','$fecha',$usuario,'$imagen',1)";
    if($conn->query($sqlInsertEntrada)){
        echo "True";
    }else{
        echo "False";
    }
    
}



?>
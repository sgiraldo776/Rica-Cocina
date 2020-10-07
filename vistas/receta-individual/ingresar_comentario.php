<?php 
    include '../../admin/conexion.php';
    session_start();
    if(!isset($_SESSION['rol'])){
        header('location: ../../vistas/login/iniciar_sesion.php');
    }else{
        if($_SESSION['rol'] !=2 ){
            header('location: ../../vistas/login/iniciar_sesion.php');
        }
    }

    $comentario=$_POST['comentario'];
    $recetaid=$_GET['recetaid'];
    $fecha=date("Y/m/d");

    $sql="INSERT INTO tblretroalimentacion VALUES (null,'$comentario','$recetaid','$fecha','$_SESSION[usuarioid]')";

    if($conn->query($sql) === TRUE){
        echo "<script> location.href='mostrar-receta.php?recetaid=$recetaid'; </script>";
    }else{
        echo "Error: " . $sql . "<br>". $conn->error;
    }
?>
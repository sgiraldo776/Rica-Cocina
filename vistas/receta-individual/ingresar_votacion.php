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

    $voto=$_POST['estrellas'];
    $recetaid=$_GET['recetaid'];

    $sql = $conn ->query("SELECT votacionacomulada FROM tblreceta where recetaid=$recetaid");
    $row=$sql->fetch_array();
    
    if($sql){
        $vototot=$row[0]+$voto;
        echo $vototot;
        $sql2 = $conn ->query("UPDATE tblreceta SET votacionacomulada='$vototot' where recetaid=$recetaid");
        if($sql2){
            echo "<script> location.href='mostrar-receta.php?recetaid=$recetaid'; </script>";
        }else{
            echo "Error: " . $sql2 . "<br>". $conn->error;
        }
    }else{
        echo "Error: " . $sql . "<br>". $conn->error;
    }
?>
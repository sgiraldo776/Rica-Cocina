<?php 
    include '../../admin/conexion.php';
    include '../../admin/util/funciones.php';
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

    $sql = $conn ->query("SELECT votacionacomulada, numeroVotaciones,titulo FROM tblreceta where recetaid=$recetaid");
    $row=$sql->fetch_array();
    
    if($sql){
        $vototot=$row[0]+$voto;
        $numVotacion = $row[1]+1;
        $sql2 = $conn ->query("UPDATE tblreceta SET votacionacomulada='$vototot' ,numeroVotaciones='$numVotacion' where recetaid=$recetaid");
        if($sql2){
            $urlReceta = "../../receta/".get_url_valid_text($row[2]."-".$recetaid)."/";
            echo "<script> location.href='$urlReceta'; </script>";
        }else{
            echo "Error: " . $sql2 . "<br>". $conn->error;
        }
    }else{
        echo "Error: " . $sql . "<br>". $conn->error;
    }
?>
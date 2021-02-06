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

    $comentario=$_POST['comentario'];
    $recetaid=$_GET['recetaid'];
    $fecha=date("Y/m/d");

    $sql="INSERT INTO tblretroalimentacion VALUES (null,'$comentario','$recetaid','$fecha','$_SESSION[usuarioid]')";
    $sqlConsultaReceta = "SELECT * from tblreceta where recetaid=$recetaid";
    $resultadoConsulta = $conn->query($sqlConsultaReceta);
    $resultadoConsulta = $resultadoConsulta->fetch_array();
    if($conn->query($sql) === TRUE and $resultadoConsulta){
        $urlReceta = "../../receta/".get_url_valid_text($resultadoConsulta[1]."-".$resultadoConsulta[0])."/";
        echo "<script> location.href='$urlReceta'; </script>";
    }else{
        echo "Error: " . $sql . "<br>". $conn->error;
    }
?>
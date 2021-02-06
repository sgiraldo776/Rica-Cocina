<?php 
include '../../admin/conexion.php';
include '../../admin/util/funciones.php';

session_start();
$id =$_REQUEST['recetaid'];

$del1 = $conn -> query("DELETE FROM tblrecetautensilio WHERE recetaid ='$id'");


if($del1 === TRUE){
    $del2= $conn -> query("DELETE FROM tblretroalimentacion WHERE recetaid='$id'");
    if($del2 === TRUE){
        $sqlReceta= $conn -> query("SELECT * FROM tblreceta where recetaid=$id");
        $row = $sqlReceta->fetch_array();
        $urlReceta = "../../receta/".get_url_valid_text($row[1]."-".$id."/");
        deleteDirectory($urlReceta);
        $del = $conn -> query("DELETE FROM tblreceta WHERE recetaid = '$id' ");
        if ($del === TRUE) {
            echo "<script> 	location.href='../mis_recetas.php'; </script>";
        }else{
            echo "Error: " . $del . "<br>". $conn->error;
            $_SESSION['error'] = 1;
            echo "<script> 	location.href='../mis_recetas.php'; </script>";
            //echo "<script> alert('El registro no pudo ser eliminado'); 	location.href='../mis_recetas.php'; </script>";
        }
    }else{
        echo "Error: " . $del . "<br>". $conn->error;
            $_SESSION['error'] = 1;
            echo "<script> 	location.href='../mis_recetas.php'; </script>";
            //echo "<script> alert('El registro no pudo ser eliminado'); 	location.href='../mis_recetas.php'; </script>";
    }
    
}else{
    echo "Error: " . $del1 . "<br>". $conn->error;
            $_SESSION['error'] = 1;
            echo "<script> 	location.href='../mis_recetas.php'; </script>";
            //echo "<script> alert('El registro no pudo ser eliminado'); 	location.href='../mis_recetas.php'; </script>";
}

?>
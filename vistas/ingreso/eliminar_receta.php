<?php 
include '../../admin/conexion.php';

$id =$_REQUEST['recetaid'];

$del1 = $conn -> query("DELETE FROM tblrecetautensilio WHERE recetaid ='$id'");

if($del1 === TRUE){
    $del = $conn -> query("DELETE FROM tblreceta WHERE recetaid = '$id' ");
    if ($del === TRUE) {
        echo "<script> 	location.href='../mis_recetas.php'; </script>";
    }else{
        //echo "Error: " . $del . "<br>". $conn->error;
        echo "<script> alert('El registro no pudo ser eliminado'); 	location.href='../mis_recetas.php'; </script>";
    }
}else{
    //echo "Error: " . $del1 . "<br>". $conn->error;
    echo "<script> alert('El registro no pudo ser eliminado'); 	location.href='../mis_recetas.php'; </script>";
}

?>
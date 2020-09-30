<?php
    require ('../../../admin/conexion.php');

    session_start();

    $sql="UPDATE tblcuenta SET estado=0 WHERE cuentaid='$_SESSION[cuentaid]'";

    if($conn->query($sql) === TRUE){
        session_destroy();

        header ('location:'. $URL);        
    }else{
        echo "Error: " . $sql . "<br>". $conn->error;
    }

?>
<?php
    include '../conexion.php';

    session_start();


    $estado=$_POST['state_pol'];
    $respuesta=$_POST['response_code_pol'];
    $metodo_pago=$_POST['payment_method_type'];
    $moneda=$_POST['currency'];
    $identificador=$_POST['payment_method_id'];
    $respuesta=$_POST['response_message_pol'];

    if ($respuesta==4){

        $insert=$conn->query("INSERT INTO tblrol (nombre) VALUES ('APROBADA')");
        http_response_code(200);

    }else{
        $insert2=$conn->query("INSERT INTO tblrol (nombre) VALUES ('RECHAZADA')");
        http_response_code(200);
    }


?>
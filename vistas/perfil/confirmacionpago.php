<?php
    include '../../admin/conexion.php';

    session_start();

    $estado=$_POST['state_pol'];
    $respuesta=$_POST['response_code_pol'];
    $metodo_pago=$_POST['payment_method_type'];
    $moneda=$_POST['currency'];
    $identificador=$_POST['payment_method_id'];
    $reference_sale=$_POST['reference_sale'];
    $hoy = date('Y-m-d');


    if ($estado==4 or $_POST['api']==1){
        $insert=$conn->query("UPDATE `tbltransacciones` SET `estado`=$estado,`respuesta`=$respuesta,`fechainicio`='$hoy',`fechafinal`='2021-09-12' WHERE referencia=$reference_sale");       
        http_response_code(200);
    }else{
        $insert=$conn->query("UPDATE `tbltransacciones` SET `estado`=$estado,`respuesta`=$respuesta,`fechainicio`='$hoy',`fechafinal`='2021-09-12' WHERE referencia=$reference_sale");
        http_response_code(200);
    }

?>
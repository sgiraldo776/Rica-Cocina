<?php
    include '../../admin/conexion.php';

    session_start();

    $estado=$_POST['state_pol'];
    $respuesta=$_POST['response_code_pol'];
    $metodo_pago=$_POST['payment_method_type'];
    $moneda=$_POST['currency'];
    $identificador=$_POST['payment_method_id'];
    $extra2=$_POST['extra2'];
    $reference_sale=$_POST['reference_sale'];
    $hoy = date('Y-m-d');

    if ($estado==4){

        $sqlConsultaPlan = "SELECT * FROM tblplan where id = $extra2";
        $resultConsultaPlan = $conn->query($sqlConsultaPlan);
        $plan = $resultConsultaPlan->fetch_row();

        $numeroMeses = $plan[2];

        $fechaFinal = date("Y-m-d",strtotime($hoy."+ ".$numeroMeses." month")); 

        $insert=$conn->query("UPDATE `tbltransacciones` SET `estado`=$estado,`respuesta`=$respuesta,`fechainicio`='$hoy',`fechafinal`='$fechaFinal' WHERE referencia=$reference_sale");  

        http_response_code(200);
    }else{
        $insert=$conn->query("UPDATE `tbltransacciones` SET `estado`=$estado,`respuesta`=$respuesta,`fechainicio`=null,`fechafinal`=null WHERE referencia=$reference_sale");
        http_response_code(200);
    }

?>
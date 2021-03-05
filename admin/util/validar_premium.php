<?php 
function validarPremium($id,$conn){
    $hoy = date('Y-m-d');
    $sqlConsultaTransacciones = "SELECT fechafinal from tbltransacciones WHERE usuario = $id and fechafinal >= '$hoy' and estado = 4 and respuesta=1 limit 1";
    $resultConsultaTransacciones = $conn->query($sqlConsultaTransacciones);
    if($resultConsultaTransacciones = $resultConsultaTransacciones->fetch_row()){
        if(!empty($resultConsultaTransacciones[0])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

?>
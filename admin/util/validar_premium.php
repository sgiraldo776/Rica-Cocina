<?php 
function validarPremium($id,$conn){
    $hoy = date('Y-m-d');
    $sqlConsultaTransacciones = "SELECT * from tbltransacciones WHERE usuario = $id and fechafinal >= $hoy"; 
    $resultConsultaTransacciones = $conn->query($sqlConsultaTransacciones);
    if($resultConsultaTransacciones = $resultConsultaTransacciones->fetch_row() != null){
        if($resultConsultaTransacciones[7]){
            return true;
        }else{
            return false;
        }
    }
}

?>
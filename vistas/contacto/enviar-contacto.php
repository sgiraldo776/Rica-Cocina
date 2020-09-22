<?php
    $destinatario = '<Correo>';

    $nombre = $_POST['nombres'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $asunto = $_POST['asunto'];
    $comentario = $_POST['comentario'];

    $header = "Enviado desde la pagina de Rica Cocina";
    $mensaje = $comentario ."\nAtentamente: ". $nombre;

    $send = mail($destinatario, $asunto, $mensaje, $header);
    if($send === TRUE){
        echo "<script>alert('correo enviado exitosamente')</script>";
        echo "<script> setTimeout(\"location.href='contacto.php'\",1000)</script>";
    }else{
        echo "<script>alert('No se pudo enviar el correo')</script>";
        echo "<script> setTimeout(\"location.href='contacto.php'\",1000)</script>";
    }
?>
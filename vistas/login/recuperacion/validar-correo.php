<?php
include('../../../admin/conexion.php');

$usuario = $_POST['usuario'];
$sql = "SELECT correoelectronico from tblcuenta where correoelectronico='$usuario'";

$consulta = $conn ->query($sql);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
//$array = mysqli_fetch_array($consulta);


if($consulta == TRUE){

    $asunto = 'Recuperación de contraseña Rica Cocina';
    $comentario = 'Haga click sobre el siguiente link para ir al formulario de cambio de contraseña;<br><strong>Este link es completamente personal e intransferible, No lo comparta con nadie; Si lo hace, Rica Cocina no se hace responsable por manejos incorrectos de su cuenta.</strong> <br><br><br> '.$URL.'vistas/login/recuperacion/recuperacion.php?crr='.$usuario.'<br><br><br> Gracias por usar Rica Cocina.<br>Atentamente: El equipo de desarrollo de Rica Cocina.';
    $body = $comentario;


    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // SMTP::DEBUG_SERVER Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'ricacocinaweb@gmail.com';                     // SMTP username
        $mail->Password   = 'sPS2jv6p8cKs86r';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($usuario);
        $mail->addAddress($usuario);     // Add a recipient

        /*     $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com'); */

        /*     // Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    */

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $body;
        
        $mail->CharSet = 'UTF-8';
        
        $mail->send();
        echo "<script> location.href='frm-correo.php?msg=1'</script>";
    } catch (Exception $e) {
        echo "<script> location.href='frm-correo.php?msg=2'</script>";
    }

}else{
    echo "<script> 	alert('El correo igresado no existe'); </script>";
    echo "<script>  location.href='frm-correo.php'; </script>";
}
?>
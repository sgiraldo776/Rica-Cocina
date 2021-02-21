<?php

include('../../admin/conexion.php');
session_start();
    if(!isset($_SESSION['rol'])){
        header('location: ../login/iniciar_sesion.php');
    }

        $membresia=$_POST['membresia'];

        if ($membresia==1){
            $precio=10000;
            $plan='Rica Cocina premium 1';
            $tiempo='3 meses';
        }else 
            if ($membresia==2){
                $precio=20000;
                $plan='Rica Cocina premium 2';
                $tiempo='6 meses';
        }else
            if($membresia==3){
                $precio=30000;
                $plan='Rica Cocina premium 3';
                $tiempo='12 meses';

        }


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Cuenta Premium</title>

    <link rel="stylesheet" href="../../admin/css/bootstrap.min.css" >
    <!--Importacion css bootstrap-->
    <link rel="stylesheet" type="text/css" href="../../admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../admin/css/styles1.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="bgimg-perfil">

        <?php

        if($_SESSION['rol'] ==2 ){
            include '../../includes/header-user.php';
        }else if($_SESSION['rol'] ==1){
            include '../../includes/header-admin.php';
        }  
        ?>
                <div class="text-center">
                    <h1 class="mt-4">Conviertete en Premium</h1><br>
                </div>
    <div class="container">
        <div class="row perfilcss">
                
        <div class="mt-4" style="margin: 0 auto;">
            <table class="table table-hover">
                <thead class="thead">
                    <th>Membresia</th>
                    <th>Tiempo</th>
                    <th>Precio</th>
                </thead>
                <tr>
                    <td><?php echo $plan; ?></td>
                    <td><?php echo $tiempo; ?></td>
                    <td><?php echo $precio; ?></td>
                </tr>
            </table>

            <?php

                $merchantId="508029";
                $ApiKey="4Vj8eK4rloUd272L48hsrarnUA";
                $referenceCode=$plan;
                $amount=$precio;
                $currency="COP";
                //$correo=$_SESSION['correoelectronico'];

                $acum=$ApiKey."~".$merchantId."~".$referenceCode."~".$amount."~".$currency;

                $j=md5($acum);

                ?>


            <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu">
                <input name="merchantId" type="hidden" value="<?php echo $merchantId ?>">
                <input name="ApiKey" type="hidden" value="<?php echo $ApiKey ?>">
                <input name="accountId" type="hidden" value="512321">
                <input name="description" type="hidden" value="Plan Premium seleccionado">
                <input name="referenceCode" type="hidden" value="<?php echo $referenceCode ?>">
                <input name="amount" type="hidden" value="<?php echo $amount ?>">
                <input name="tax" type="hidden" value="0">
                <input name="taxReturnBase" type="hidden" value="0">
                <input name="currency" type="hidden" value="<?php echo $currency ?>">
                <input name="signature" type="hidden" value="<?php echo $j ?>">
                <input name="test" type="hidden" value="1">
                <input name="buyerEmail" type="hidden" value="<?php echo $_SESSION['correoelectronico'] ?>">
                <input name="responseUrl" type="hidden" value="https://develop.ricacocina.co/">
                <input name="confirmationUrl" type="hidden" value="https://develop.ricacocina.co/">
                
                <div class="text-center">
                    <input name="Submit" class="boton boton-amarillo" type="submit" value="Enviar">
                </div>
            </form>
            <!-- <a class="btn btn-color" href="enviar_pedido.php">Confirmar pedido</a> -->
        </div>
        
        </div>

    </div>
    </main>
    <br>
    <br>
    <?php include '../../includes/footer.php' ?>
    <!--JS de bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/validacion-perfil.js"></script>
    <!--<script src="../../admin/js/alerts.js"></script>-->

</body>

</html>
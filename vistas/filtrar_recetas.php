<?php
    include "../admin/conexion.php";
    // Llamada al autoload de la libreria stefangabos/zebra_pagination
    require_once '../vendor/stefangabos/zebra_pagination/Zebra_Pagination.php';

    // session_start();
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }
    
    $numero_elementos = 0;

    if(isset($_POST['tipocomida']) OR isset($_POST['tipodieta']) OR isset($_POST['tiporeceta']) OR isset($_POST['padecimiento']) OR isset($_POST['ocacion']) OR isset($_POST['pais'])){
        ////////////////////////////////// VALIDACION POR T_COMIDA //////////////////////////////////
        if($_POST['tipocomida'] != 0){
            if($_POST['tipodieta'] != 0){
                if($_POST['tiporeceta'] != "0"){
                    if($_POST['padecimiento'] != 0){
                        if($_POST['ocacion'] != "0"){
                            if($_POST['pais'] != 0){
                                $tipocomida=$_POST['tipocomida'];
                                $tipodieta=$_POST['tipodieta'];
                                $tiporeceta=$_POST['tiporeceta'];
                                $padecimiento=$_POST['padecimiento'];
                                $ocacion=$_POST['ocacion'];
                                $pais=$_POST['pais'];
                                $filtro="AND tipocomidaid='$tipocomida' AND tipodietaid='$tipodieta' AND tiporeceta='$tiporeceta' AND padecimientoid='$padecimiento' AND ocacion='$ocacion' AND paisid='$pais'";
                            }
                            else{
                                $tipocomida=$_POST['tipocomida'];
                                $tipodieta=$_POST['tipodieta'];
                                $tiporeceta=$_POST['tiporeceta'];
                                $padecimiento=$_POST['padecimiento'];
                                $ocacion=$_POST['ocacion'];
                                $filtro="AND tipocomidaid='$tipocomida' AND tipodietaid='$tipodieta' AND tiporeceta='$tiporeceta' AND padecimientoid='$padecimiento' AND ocacion='$ocacion'";
                            }
                        }
                        elseif($_POST['pais'] != 0){
                            $tipocomida=$_POST['tipocomida'];
                            $tipodieta=$_POST['tipodieta'];
                            $tiporeceta=$_POST['tiporeceta'];
                            $padecimiento=$_POST['padecimiento'];
                            $pais=$_POST['pais'];
                            $filtro="AND tipocomidaid='$tipocomida' AND tipodietaid='$tipodieta' AND tiporeceta='$tiporeceta' AND padecimientoid='$padecimiento' AND paisid='$pais'";
                        }
                        else{
                            $tipocomida=$_POST['tipocomida'];
                            $tipodieta=$_POST['tipodieta'];
                            $tiporeceta=$_POST['tiporeceta'];
                            $padecimiento=$_POST['padecimiento'];
                            $filtro="AND tipocomidaid='$tipocomida' AND tipodietaid='$tipodieta' AND tiporeceta='$tiporeceta' AND padecimientoid='$padecimiento'";
                        }
                    }
                    elseif($_POST['ocacion'] != "0"){
                        $tipocomida=$_POST['tipocomida'];
                        $tipodieta=$_POST['tipodieta'];
                        $tiporeceta=$_POST['tiporeceta'];
                        $ocacion=$_POST['ocacion'];
                        $filtro="AND tipocomidaid='$tipocomida' AND tipodietaid='$tipodieta' AND tiporeceta='$tiporeceta' AND ocacion='$ocacion'";
                    }
                    elseif($_POST['pais'] != 0){
                        $tipocomida=$_POST['tipocomida'];
                        $tipodieta=$_POST['tipodieta'];
                        $tiporeceta=$_POST['tiporeceta'];
                        $pais=$_POST['pais'];
                        $filtro="AND tipocomidaid='$tipocomida' AND tipodietaid='$tipodieta' AND tiporeceta='$tiporeceta' AND paisid='$pais'";
                    }
                    else{
                        $tipocomida=$_POST['tipocomida'];
                        $tipodieta=$_POST['tipodieta'];
                        $tiporeceta=$_POST['tiporeceta'];
                        $filtro="AND tipocomidaid='$tipocomida' AND tipodietaid='$tipodieta' AND tiporeceta='$tiporeceta'";
                    }
                }
                elseif($_POST['padecimiento'] != 0){
                    $tipocomida=$_POST['tipocomida'];
                    $tipodieta=$_POST['tipodieta'];
                    $padecimiento=$_POST['padecimiento'];
                    $filtro="AND tipocomidaid='$tipocomida' AND tipodietaid='$tipodieta' AND padecimientoid='$padecimiento'";
                }
                elseif($_POST['ocacion'] != "0"){
                    $tipocomida=$_POST['tipocomida'];
                    $tipodieta=$_POST['tipodieta'];
                    $ocacion=$_POST['ocacion'];
                    $filtro="AND tipocomidaid='$tipocomida' AND tipodietaid='$tipodieta' AND ocacion='$ocacion'";
                }
                elseif($_POST['pais'] != 0){
                    $tipocomida=$_POST['tipocomida'];
                    $tipodieta=$_POST['tipodieta'];
                    $pais=$_POST['pais'];
                    $filtro="AND tipocomidaid='$tipocomida' AND tipodietaid='$tipodieta' AND paisid='$pais'";
                }
                else{
                    $tipocomida=$_POST['tipocomida'];
                    $tipodieta=$_POST['tipodieta'];
                    $filtro="AND tipocomidaid='$tipocomida' AND tipodietaid='$tipodieta'";
                }
            }
            elseif($_POST['tiporeceta'] != "0"){
                $tipocomida=$_POST['tipocomida'];
                $tiporeceta=$_POST['tiporeceta'];
                $filtro="AND tipocomidaid='$tipocomida' AND tiporeceta='$tiporeceta'";
            }
            elseif($_POST['padecimiento'] != 0){
                $tipocomida=$_POST['tipocomida'];
                $padecimiento=$_POST['padecimiento'];
                $filtro="AND tipocomidaid='$tipocomida' AND padecimientoid='$padecimiento'";
            }
            elseif($_POST['ocacion'] != "0"){
                $tipocomida=$_POST['tipocomida'];
                $ocacion=$_POST['ocacion'];
                $filtro="AND tipocomidaid='$tipocomida' AND ocacion='$ocacion'";
            }
            elseif($_POST['pais'] != 0){
                $tipocomida=$_POST['tipocomida'];
                $pais=$_POST['pais'];
                $filtro="AND tipocomidaid='$tipocomida' AND paisid='$pais'";
            }
            else{
                $tipocomida=$_POST['tipocomida'];
                $filtro="AND tipocomidaid='$tipocomida'";
            }
        }
        ////////////////////////////////// VALIDACION POR T_DIETA //////////////////////////////////
        if($_POST['tipodieta'] != 0){
            $tipodieta=$_POST['tipodieta'];
            $filtro="AND tipodietaid='$tipodieta'";
        }
        ////////////////////////////////// VALIDACION POR T_RECETA //////////////////////////////////
        if($_POST['tiporeceta'] != "0"){
            $tiporeceta=$_POST['tiporeceta'];
            $filtro="AND tiporeceta='$tiporeceta'";
        }
        ////////////////////////////////// VALIDACION POR T_PADECIMIENTO //////////////////////////////////
        if($_POST['padecimiento'] != 0){
            $padecimiento=$_POST['padecimiento'];
            $filtro="AND padecimientoid='$padecimiento'";
        }
        ////////////////////////////////// VALIDACION POR OCACION //////////////////////////////////
        if($_POST['ocacion'] != "0"){
            $ocacion=$_POST['ocacion'];
            $filtro="AND ocacion='$ocacion'";
        }
        ////////////////////////////////// VALIDACION POR PAIS //////////////////////////////////
        if($_POST['pais'] != 0){
            $pais=$_POST['pais'];
            $filtro="AND paisid='$pais'";
        }

        if(isset($filtro)){
            // Consulta para contar el número total de elementos que trae la consulta:
            $numero_elementos = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tblreceta where validar='2' $filtro"));
        }

        if($numero_elementos == 0){
            echo "<script>alert('No hubo resultados')</script>";
        }
    }else{
        $numero_elementos = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tblreceta where validar='2'"));
        if($numero_elementos == 0){
            echo "<script>alert('No hubo resultados')</script>";
        }
    } 

    $renderizar = false;
    if($numero_elementos > 0){
    // Determinamos la cantidad de elementos a mostrar en la página
    $numero_elementos_pagina = 2;
    // Hacer paginación
    $paginacion = new zebra_pagination();
    // Numero total de elementos a paginar
    $paginacion->records($numero_elementos);    

    // Numero de elementos por página:
    $paginacion->records_per_page($numero_elementos_pagina);
    $page = $paginacion->get_page();  // Toma el número de la páginación por GET.
    $empieza_aqui = (($page - 1) * $numero_elementos_pagina);

    $sql = '';
    if(!empty($filtro)){
        $sql = "SELECT R.recetaid, R.titulo, concat_ws(' ', Nombres, apellidos) as Nombre, R.votacionacomulada, R.imagen FROM tblreceta AS R INNER JOIN tblusuario AS U ON R.usuarioid = U.usuarioid where validar='2' $filtro ORDER BY (R.votacionacomulada) DESC LIMIT $empieza_aqui, $numero_elementos_pagina;";
    }else{
        $sql = "SELECT R.recetaid, R.titulo, concat_ws(' ', Nombres, apellidos) as Nombre, R.votacionacomulada, R.imagen FROM tblreceta AS R INNER JOIN tblusuario AS U ON R.usuarioid = U.usuarioid where validar='2' ORDER BY (R.votacionacomulada) DESC LIMIT $empieza_aqui, $numero_elementos_pagina;";
    }
    $recetas = $conn->query($sql);

    $renderizar = true;

    require_once '../vistas/recetas.php';
    // header("location:recetas.php");
    $conn->close();
    
}

 





    // var_dump($_POST['opTipoComida']);
    // die();

    // if(isset($_POST['opcTipoComida'])){
    /* if(isset($data->opTipoComida)){
        
        var_dump($data->opTipoComida);
        die();


        $tipoComida =  $_POST['opcTipoComida'];
        $tipoComida = (INT)$tipoComida;

        $sql = "SELECT * FROM tblreceta WHERE tipocomidaid = $tipoComida AND validar = 2;";
        $recetas = $conn->query($sql);

        if($recetas->num_rows > 0){
            $respuesta = $recetas->fetch_object();
            echo json_encode($respuesta);
            exit;            
        }

    } else {
        echo json_encode(array('errror' => TRUE, 'message' => 'El parametro de busqueda llego vacio'));
        exit;
    }
    */






?>
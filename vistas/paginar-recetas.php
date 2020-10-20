<?php
include('../admin/conexion.php');
$paginaActual = 1;

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
            elseif(($_POST['padecimiento'] != 0){
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
        elseif(($_POST['padecimiento'] != 0){
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
    if(($_POST['padecimiento'] != 0){
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

    $nroRecetas = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tblreceta where validar='2' $filtro"));

    if($nroRecetas != 0){
        $nroLotes = 5;
        $nroPaginas = ceil($nroRecetas/$nroLotes);
        $lista = '';
        $tabla = '';

        #Crear navegacion de paginacion
        if($paginaActual > 1){
            $lista = $lista.'<li class="page-item"><a class="page-link text-warning" href="javascript:paginacion('.($paginaActual-1).');"><span aria-hidden="true">&laquo;</span></a></li>';
        }
        for($i=1; $i<=$nroPaginas; $i++){
            if($i == $paginaActual){
                $lista = $lista.'<li class="page-item activo bg-warning"><a class="page-link" href="javascript:paginacion('.$i.');">'.$i.'</a></li>';
            }else{
                $lista = $lista.'<li class="page-item"><a class="page-link text-warning" href="javascript:paginacion('.$i.');">'.$i.'</a></li>';
            }
        }
        if($paginaActual < $nroPaginas){
            $lista = $lista.'<li class="page-item"><a class="page-link text-warning" href="javascript:paginacion('.($paginaActual+1).');"><span aria-hidden="true">&raquo;</span></a></li>';
        }

        if($paginaActual <= 1){
            $limit = 0;
        }else{
            $limit = $nroLotes*($paginaActual-1);
        }
        
        $sql = $conn ->query("SELECT re.recetaid,re.imagen,re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid where validar='2' $filtro LIMIT $limit, $nroLotes ");
        
        while ($row = $sql->fetch_array()) {
            $tabla=$tabla.'<div class="tarjetas">
                <a href="receta-individual/mostrar-receta.php?recetaid='. $row['recetaid'] .'" style="text-decoration: none">
                    <div class="tarjeta-img">
                        <img class="tarjeta-img tam-img" src="data:image/jpeg;base64,'. base64_encode( $row['imagen'] ).'">
                    </div>
                    <div class="tarjeta-info">
                        <h3 class="card-title">'. $row['titulo'] .'</h3>
                        <p class="card-text">Por:'.  $row['nombres'] .'</p>
                        <p class="card-text"> Puntaje:'. $row['votacionacomulada'] .'</p>
                    </div>
                </a>
            </div>';	
        }
        
        $array=array(0 => $tabla,
                1 => $lista);
        echo json_encode($array);
    }else{
        echo "<script>alert('No hubo resultados')</script>";
    }
}else{
    $nroRecetas = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tblreceta where validar='2'"));
    $nroLotes = 6;
    $nroPaginas = ceil($nroRecetas/$nroLotes);
    $lista = '';
    $tabla = '';

    #Crear navegacion de paginacion
    if($paginaActual > 1){
        $lista = $lista.'<li class="page-item"><a class="page-link text-warning" href="javascript:paginacion('.($paginaActual-1).');"><span aria-hidden="true">&laquo;</span></a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="page-item activo bg-warning"><a class="page-link" href="javascript:paginacion('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li class="page-item"><a class="page-link text-warning" href="javascript:paginacion('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li class="page-item"><a class="page-link text-warning" href="javascript:paginacion('.($paginaActual+1).');"><span aria-hidden="true">&raquo;</span></a></li>';
    }

    if($paginaActual <= 1){
        $limit = 0;
    }else{
        $limit = $nroLotes*($paginaActual-1);
    }

    $sql = $conn -> query("SELECT re.recetaid,re.imagen,re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid where validar='2' LIMIT $limit, $nroLotes ");

    while ($row = $sql->fetch_array()) {
        $tabla=$tabla.'<div class="tarjetas">
            <a href="receta-individual/mostrar-receta.php?recetaid='. $row['recetaid'] .'" style="text-decoration: none">
                <div class="tarjeta-img">
                    <img class="tarjeta-img tam-img" src="data:image/jpeg;base64,'. base64_encode( $row['imagen'] ).'">
                </div>
                <div class="tarjeta-info">
                    <h3 class="card-title">'. $row['titulo'] .'</h3>
                    <p class="card-text">Por:'.  $row['nombres'] .'</p>
                    <p class="card-text"> Puntaje:'. $row['votacionacomulada'] .'</p>
                </div>
            </a>
        </div>';	
    }
    
    $array=array(0 => $tabla,
            1 => $lista);
    echo json_encode($array);
}
?>
<?php
include('../admin/conexion.php');
$paginaActual = $_POST['partida'];

$nroRecetas = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tblreceta where validar='2'"));
$nroLotes = 25;
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
?>
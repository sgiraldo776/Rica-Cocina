<?php
    require "admin/conexion.php";
    // Llamada al autoload de la libreria stefangabos/zebra_pagination
     require_once "../vendor/stefangabos/zebra_pagination/Zebra_Pagination.php";
    // require_once '../vendor/autoload.php';    

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

if(!isset($_POST['buscar'])){
    $_POST['buscar'] = "";
    $buscar = $_POST['buscar'];
}

$buscar = $_POST['buscar'];

// Hallamos el número total de elementos en la consualta:
if(!empty($buscar) && $bucar == "" ){
    $numero_elementos = mysqli_num_rows(mysqli_query($conn,"SELECT re.recetaid FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid WHERE re.validar='2' LIMIT 25;"));
}else{
    $numero_elementos = mysqli_num_rows(mysqli_query($conn,"SELECT re.recetaid FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid WHERE re.validar='2' AND re.titulo LIKE '%" . $buscar . "%' LIMIT 25;"));
}

$renderizar = false;
// Determinamos la cantidad de elementos a mostrar en la página
$numero_elementos_pagina = 4;
// Hacer paginación
$paginacion = new zebra_pagination();
// Numero total de elementos a paginar
$paginacion->records($numero_elementos);    
// Numero de elementos por página:
$paginacion->records_per_page($numero_elementos_pagina);
$page = $paginacion->get_page();  // Toma el número de la páginación por GET.
$empieza_aqui = (($page - 1) * $numero_elementos_pagina);

// $read = "SELECT re.recetaid, re.imagen,re.titulo,us.nombres,re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid=us.usuarioid WHERE validar='2' AND titulo LIKE '%" . $buscar . "%' LIMIT 25";
if(!empty($buscar) && $bucar == "" ){
    $read = "SELECT re.recetaid, re.imagen, re.titulo, us.nombres, re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid WHERE re.validar='2' ORDER BY (re.votacionacomulada) DESC LIMIT $empieza_aqui, $numero_elementos_pagina;";
}else{
    $read = "SELECT re.recetaid, re.imagen, re.titulo, us.nombres, re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid WHERE re.validar='2' AND re.titulo LIKE '%" . $buscar . "%' ORDER BY (re.votacionacomulada) DESC LIMIT $empieza_aqui, $numero_elementos_pagina;";
}

$sql_query= mysqli_query($conn,$read);

$renderizar = true;
$conn->close();

?>
<?php
include "../../admin/conexion.php";
session_start();

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$tipocomida=true;
$tipodieta=true;
$tiporeceta=true;
$padecimiento=true;
$ocacion=true;
$pais=true;

if(isset($_POST['tipocomida']) and $row[5]==$_POST['tipocomida']){
    $tipocomida=true;
}else{
    $tipocomida=false;
}
if(isset($_POST['tipodieta']) and $row[6]==$_POST['tipodieta']){
    $tipodieta=$_POST['tipodieta'];
}
if(isset($_POST['tiporeceta'])){
    $tiporeceta=$_POST['tiporeceta'];
}
if(isset($_POST['padecimiento'])){
    $padecimiento=$_POST['padecimiento'];
}
if(isset($_POST['ocacion'])){
    $ocacion=$_POST['ocacion'];
}
if(isset($_POST['pais'])){
    $pais="paisid='".$_POST['pais']."'";
}

if($tipocomida and $tipodieta and $tiporeceta){
    
}


    $sel = $conn ->query("SELECT re.titulo as 'Nombre', re.imagen as 'Imagen', re.ingrediente as 'Ingredientes', re.pasos as 'Pasos', re.cantidadpersonas as '#personas', re.tiempopreparacion as 'Tiempo', re.ocacion as 'Ocasion', re.tiporeceta as 'Tipo Receta', tc.nombre as 'Tipo Comida', pad.nombre as 'Padecimiento', td.nombre as 'Tipo Dieta', re.validar as 'Validar', concat_ws(' ', us.nombres, us.apellidos) as 'Usuario', pa.nombre as 'Pais', re.votacionacomulada as 'Votacion', re.usuarioid FROM tblreceta as re INNER JOIN tbltipocomida as tc ON re.tipocomidaid=tc.tipocomidaid INNER JOIN tbltipodieta as td ON re.tipodietaid=td.tipodietaid INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid INNER JOIN tblpais as pa ON re.paisid = pa.paisid INNER JOIN tblpadecimiento as pad ON re.padecimientoid = pad.padecimientoid where". if(isset($tipocomida))?"tipocomidaid='"'  . );


//----------------------------CONDICIONALES DE UN FILTRO ----------------------------
//----------------------------CONDICIONALES DE UN FILTRO ----------------------------
/*if(isset($tipocomida)){
    $sel = $conn ->query("SELECT re.titulo as 'Nombre', re.imagen as 'Imagen', re.ingrediente as 'Ingredientes', re.pasos as 'Pasos', re.cantidadpersonas as '#personas', re.tiempopreparacion as 'Tiempo', re.ocacion as 'Ocasion', re.tiporeceta as 'Tipo Receta', tc.nombre as 'Tipo Comida', pad.nombre as 'Padecimiento', td.nombre as 'Tipo Dieta', re.validar as 'Validar', concat_ws(' ', us.nombres, us.apellidos) as 'Usuario', pa.nombre as 'Pais', re.votacionacomulada as 'Votacion', re.usuarioid FROM tblreceta as re INNER JOIN tbltipocomida as tc ON re.tipocomidaid=tc.tipocomidaid INNER JOIN tbltipodieta as td ON re.tipodietaid=td.tipodietaid INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid INNER JOIN tblpais as pa ON re.paisid = pa.paisid INNER JOIN tblpadecimiento as pad ON re.padecimientoid = pad.padecimientoid where tipocomidaid='$tipocomida'");
}
if(isset($tipodieta)){
    $sel = $conn ->query("SELECT re.titulo as 'Nombre', re.imagen as 'Imagen', re.ingrediente as 'Ingredientes', re.pasos as 'Pasos', re.cantidadpersonas as '#personas', re.tiempopreparacion as 'Tiempo', re.ocacion as 'Ocasion', re.tiporeceta as 'Tipo Receta', tc.nombre as 'Tipo Comida', pad.nombre as 'Padecimiento', td.nombre as 'Tipo Dieta', re.validar as 'Validar', concat_ws(' ', us.nombres, us.apellidos) as 'Usuario', pa.nombre as 'Pais', re.votacionacomulada as 'Votacion', re.usuarioid FROM tblreceta as re INNER JOIN tbltipocomida as tc ON re.tipocomidaid=tc.tipocomidaid INNER JOIN tbltipodieta as td ON re.tipodietaid=td.tipodietaid INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid INNER JOIN tblpais as pa ON re.paisid = pa.paisid INNER JOIN tblpadecimiento as pad ON re.padecimientoid = pad.padecimientoid where tipodietaid='$tipodieta'");
}
if(isset($tiporeceta)){
    $sel = $conn ->query("SELECT re.titulo as 'Nombre', re.imagen as 'Imagen', re.ingrediente as 'Ingredientes', re.pasos as 'Pasos', re.cantidadpersonas as '#personas', re.tiempopreparacion as 'Tiempo', re.ocacion as 'Ocasion', re.tiporeceta as 'Tipo Receta', tc.nombre as 'Tipo Comida', pad.nombre as 'Padecimiento', td.nombre as 'Tipo Dieta', re.validar as 'Validar', concat_ws(' ', us.nombres, us.apellidos) as 'Usuario', pa.nombre as 'Pais', re.votacionacomulada as 'Votacion', re.usuarioid FROM tblreceta as re INNER JOIN tbltipocomida as tc ON re.tipocomidaid=tc.tipocomidaid INNER JOIN tbltipodieta as td ON re.tipodietaid=td.tipodietaid INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid INNER JOIN tblpais as pa ON re.paisid = pa.paisid INNER JOIN tblpadecimiento as pad ON re.padecimientoid = pad.padecimientoid where tiporeceta='$tiporeceta'");
}
if(isset($padecimiento)){
    $sel = $conn ->query("SELECT re.titulo as 'Nombre', re.imagen as 'Imagen', re.ingrediente as 'Ingredientes', re.pasos as 'Pasos', re.cantidadpersonas as '#personas', re.tiempopreparacion as 'Tiempo', re.ocacion as 'Ocasion', re.tiporeceta as 'Tipo Receta', tc.nombre as 'Tipo Comida', pad.nombre as 'Padecimiento', td.nombre as 'Tipo Dieta', re.validar as 'Validar', concat_ws(' ', us.nombres, us.apellidos) as 'Usuario', pa.nombre as 'Pais', re.votacionacomulada as 'Votacion', re.usuarioid FROM tblreceta as re INNER JOIN tbltipocomida as tc ON re.tipocomidaid=tc.tipocomidaid INNER JOIN tbltipodieta as td ON re.tipodietaid=td.tipodietaid INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid INNER JOIN tblpais as pa ON re.paisid = pa.paisid INNER JOIN tblpadecimiento as pad ON re.padecimientoid = pad.padecimientoid where padecimientoid='$padecimiento'");
}
if(isset($ocacion)){
    $sel = $conn ->query("SELECT re.titulo as 'Nombre', re.imagen as 'Imagen', re.ingrediente as 'Ingredientes', re.pasos as 'Pasos', re.cantidadpersonas as '#personas', re.tiempopreparacion as 'Tiempo', re.ocacion as 'Ocasion', re.tiporeceta as 'Tipo Receta', tc.nombre as 'Tipo Comida', pad.nombre as 'Padecimiento', td.nombre as 'Tipo Dieta', re.validar as 'Validar', concat_ws(' ', us.nombres, us.apellidos) as 'Usuario', pa.nombre as 'Pais', re.votacionacomulada as 'Votacion', re.usuarioid FROM tblreceta as re INNER JOIN tbltipocomida as tc ON re.tipocomidaid=tc.tipocomidaid INNER JOIN tbltipodieta as td ON re.tipodietaid=td.tipodietaid INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid INNER JOIN tblpais as pa ON re.paisid = pa.paisid INNER JOIN tblpadecimiento as pad ON re.padecimientoid = pad.padecimientoid where ocacion='$ocacion'");
}
if(isset($pais)){
    $sel = $conn ->query("SELECT re.titulo as 'Nombre', re.imagen as 'Imagen', re.ingrediente as 'Ingredientes', re.pasos as 'Pasos', re.cantidadpersonas as '#personas', re.tiempopreparacion as 'Tiempo', re.ocacion as 'Ocasion', re.tiporeceta as 'Tipo Receta', tc.nombre as 'Tipo Comida', pad.nombre as 'Padecimiento', td.nombre as 'Tipo Dieta', re.validar as 'Validar', concat_ws(' ', us.nombres, us.apellidos) as 'Usuario', pa.nombre as 'Pais', re.votacionacomulada as 'Votacion', re.usuarioid FROM tblreceta as re INNER JOIN tbltipocomida as tc ON re.tipocomidaid=tc.tipocomidaid INNER JOIN tbltipodieta as td ON re.tipodietaid=td.tipodietaid INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid INNER JOIN tblpais as pa ON re.paisid = pa.paisid INNER JOIN tblpadecimiento as pad ON re.padecimientoid = pad.padecimientoid where paisid='$pais'");
}

*/
.(isset($_POST['pais']))?"paisid='".$_POST['pais']."'".(isset($_POST['ocacion']) and isset($_POST['pais']))? " OR ".

if(isset($tipocomida)){
    if(isset($tipodieta)){

    }elseif(isset($tiporeceta)){

    }elseif(isset($padecimiento)){

    }
    
}

$sel = $conn ->query("SELECT re.titulo as 'Nombre', re.imagen as 'Imagen', re.ingrediente as 'Ingredientes', re.pasos as 'Pasos', re.cantidadpersonas as '#personas', re.tiempopreparacion as 'Tiempo', re.ocacion as 'Ocasion', re.tiporeceta as 'Tipo Receta', tc.nombre as 'Tipo Comida', pad.nombre as 'Padecimiento', td.nombre as 'Tipo Dieta', re.validar as 'Validar', concat_ws(' ', us.nombres, us.apellidos) as 'Usuario', pa.nombre as 'Pais', re.votacionacomulada as 'Votacion', re.usuarioid FROM tblreceta as re INNER JOIN tbltipocomida as tc ON re.tipocomidaid=tc.tipocomidaid INNER JOIN tbltipodieta as td ON re.tipodietaid=td.tipodietaid INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid INNER JOIN tblpais as pa ON re.paisid = pa.paisid INNER JOIN tblpadecimiento as pad ON re.padecimientoid = pad.padecimientoid where'");


?>
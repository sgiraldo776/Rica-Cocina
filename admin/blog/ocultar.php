<?php
session_start();
include '../conexion.php';
include '../util/funciones.php';

if($_SESSION['rol'] == 1){
    $premium=true;
}
if(isset($_SESSION['cuentaid']) and $_SESSION['rol'] == 1){

    $id=$_GET['id'];

    $sqlContultaPublicacion="SELECT * FROM `tblpublicacion` where id = $id";
    $resultadoConsultaPublicacion = $conn->query($sqlContultaPublicacion);

    $nombre_fichero = "../../blog/publicaciones";
    $publicacion = $resultadoConsultaPublicacion->fetch_array();
    $titulo_publicacion = get_url_valid_text($publicacion[1]);
    $titulo_publicacion = $nombre_fichero."/".$titulo_publicacion."-".$id;

    $sql="UPDATE tblpublicacion SET estado='0'  WHERE id=$id";
    if($conn->query($sql)){
        $urlPublicacion = $nombre_fichero."/".$titulo_publicacion."/";
        unlink($titulo_publicacion."/index.php");
        rmdir($urlPublicacion);
        header('location:ver-publicaciones.php');
    }else{
        $_SESSION['error'] = "error al ocultar intentelo mas tarde";
        header('location:ver-publicaciones.php');
        
    }
}



?>
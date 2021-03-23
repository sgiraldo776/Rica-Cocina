<?php 
session_start();
include '../conexion.php';
include '../util/funciones.php';

if($_SESSION['rol'] == 1){
    $premium=true;
}
if(isset($_SESSION['cuentaid']) and $_SESSION['rol'] == 1){
    
    $id=$_GET['id'];
    
    $texto = "<?php
        \$id = ".$id.";
        session_start();
    ?>
    \n
    ";
    
    $sqlContultaPublicacion="SELECT * FROM `tblpublicacion` where id = $id";
    
    $resultadoConsultaPublicacion = $conn->query($sqlContultaPublicacion);
    
    if ( $resultadoConsultaPublicacion) {
        // echo "<script> location.href='receta_val.php'; </script>";
        $nombre_fichero = "../../blog/publicaciones";
        $publicacion = $resultadoConsultaPublicacion->fetch_array();
        $titulo_publicacion = get_url_valid_text($publicacion[1]);
        $titulo_publicacion = $nombre_fichero."/".$titulo_publicacion."-".$id;
        if (file_exists($nombre_fichero)) {
            $swPublicaciones = true;
        } else {
            if(mkdir($nombre_fichero)){
                $swPublicaciones = true;
            }else{
                $swPublicaciones = false;
            }
        }
    
        if($swPublicaciones){
            echo "nueva carpeta $titulo_publicacion";
            if(file_exists($titulo_publicacion)){
                $swPublicacionCarpeta = true;
            }else{
                if(mkdir($titulo_publicacion)){
                    $swPublicacionCarpeta = true;
                }else{
                    $swPublicacionCarpeta = false;
                }
            }
        }
    
        $swIndex = false;
        if($swPublicacionCarpeta){
    
            $fichero = 'index.php';
            $nuevo_fichero = $titulo_publicacion."/index.php";
            $contenidoPlantilla = file_get_contents("./plantilla.php"); 
            $fh = fopen("index.php", 'a+') or die("Se produjo un error al crear el archivo");
            fwrite($fh ,$texto);
            fwrite($fh ,$contenidoPlantilla);
            fclose($fh);
    
            if (!move_to($fichero,$nuevo_fichero)) {
                echo "Error al copiar $fichero...\n";
            }else{
                $swIndex = true;
            }
          
        }
    
        if($swIndex){
            $sql="UPDATE tblpublicacion SET estado='1'  WHERE id=$id";
            if($conn->query($sql)){
                $urlPublicacion = $nombre_fichero."/".$titulo_publicacion."/";
                echo "<script> location.href='$urlPublicacion'; </script>";
            }else{
                $urlPublicacion = $nombre_fichero."/".$titulo_publicacion."/";
                unlink($titulo_publicacion."/index.php");
                rmdir($urlPublicacion);
                echo "<script> location.href='$URL'; </script>";
            }
        }   
    
    } else {
        echo "Error: No se pudo publicar" . $sql . "<br>". $conn->error;
    }
    
}
?>
<?php
include "../conexion.php";
include "../util/funciones.php";
session_start();

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}

$recetaid=$_GET['recetaid'];

$texto = "<?php
    \$id = ".$recetaid.";
    session_start();
?>
";

$sqlConsultaReceta="SELECT * FROM `tblreceta` where recetaid = $recetaid";

$resutadoReceta = $conn->query($sqlConsultaReceta);

if ( $resutadoReceta) {
    // echo "<script> location.href='receta_val.php'; </script>";
    $nombre_fichero = "../../receta";
    $receta = $resutadoReceta->fetch_array();
    $titulo_receta = get_url_valid_text($receta[1]);
    $nombre_carpeta_receta = $nombre_fichero."/".$titulo_receta."-".$recetaid;
    if (file_exists($nombre_fichero)) {
        $swReceta = true;
    } else {
        if(mkdir($nombre_fichero)){
            $swReceta = true;
        }else{
            $swReceta = false;
        }
    }

    if($swReceta){
        echo "nueva carpeta $nombre_carpeta_receta";
        if(file_exists($nombre_carpeta_receta)){
            $swRecetaCarpeta = true;
        }else{
            if(mkdir($nombre_carpeta_receta)){
                $swRecetaCarpeta = true;
            }else{
                $swRecetaCarpeta = false;
            }
        }
    }

    $swIndex = false;
    if($swRecetaCarpeta){

        $fichero = 'mostrar-receta.php';
        $nuevo_fichero = $nombre_carpeta_receta."/index.php";

        if (!copy($fichero, $nuevo_fichero)) {
            echo "Error al copiar $fichero...\n";
        }

        $fh = fopen($nombre_carpeta_receta."/index.php", 'c') or die("Se produjo un error al crear el archivo");
        fwrite($fh, $texto) or die("No se pudo escribir en el archivo");
        fclose($fh);

        $swIndex = true;
    }

    if($swIndex){
        $sql="UPDATE tblreceta SET validar='2'  WHERE recetaid=$recetaid";
        if($conn->query($sql)){
            $urlReceta = $nombre_carpeta_receta = $nombre_fichero."/".$titulo_receta."-".$recetaid."/";
            echo "<script> location.href='$urlReceta'; </script>";
        }else{
            unlink($nombre_carpeta_receta = $nombre_fichero."/".$titulo_receta."-".$recetaid."/");
            echo "<script> location.href='$URL'; </script>";
            
        }
    }   

} else {
    echo "Error: No se pudo publicar la receta" . $sql . "<br>". $conn->error;
}
?>
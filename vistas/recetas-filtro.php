<?php 

include "../admin/conexion.php";
// Llamada al autoload de la libreria stefangabos/zebra_pagination
require_once '../vendor/stefangabos/zebra_pagination/Zebra_Pagination.php';

// session_start();

if ($conn->connect_error) {
    die("Conección exitosa: " . $conn->connect_error);
}
    
if(isset($_POST['ingrecientes-agregados'])){


    $tipoComida="";
    $tipodieta="";
    $tiporeceta=  "";
    $padecimiento=  "";
    $ocacion=  "";
    $pais =  "";
    $ingredientes = "";
    if($_POST['tipocomida'] != 0){
        $tipoComida =  "AND tipocomidaid = ".$_POST['tipocomida'];
    }
    if($_POST['tipodieta'] != 0){
        $tipodieta =  "AND tipodietaid = ".$_POST['tipodieta'];
    }
    if($_POST['tiporeceta'] != "0"){
        $tiporeceta =  "AND tiporeceta = '".$_POST['tiporeceta']."'";
    }
    if($_POST['padecimiento'] != 0){
        $padecimiento =  "AND padecimientoid = ".$_POST['padecimiento'];
    }
    if($_POST['ocacion'] != "0"){
        $ocacion =  "AND ocacion = '".$_POST['ocacion']."'";
    }
    if($_POST['pais'] != 0){
        $pais =  "AND paisid = ".$_POST['pais'];

    }
    if( !empty($_POST['ingrecientes-agregados'])){
        $ingredientes =  "AND MATCH(re.ingrediente) AGAINST ('".$_POST['ingrecientes-agregados']."')";
    }




    $numeroRegistros = "SELECT count(re.recetaid) as 'total' FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid WHERE re.validar='2' ".$ingredientes." ".$tipoComida." ".$tipodieta. " " .$tiporeceta." " .$padecimiento ." " .$ocacion ." " .$pais ." ORDER BY (re.votacionacomulada) DESC";
    $numeroRegistros= mysqli_query($conn,$numeroRegistros);


    if($numeroRegistros){
        $fila =  mysqli_fetch_assoc($numeroRegistros);

        if($fila["total"] > 0){

            $read = "SELECT re.recetaid, re.imagen, re.titulo, re.ingrediente, re.tags, us.nombres, re.votacionacomulada FROM tblreceta as re INNER JOIN tblusuario as us ON re.usuarioid = us.usuarioid WHERE re.validar='2' ".$ingredientes." ".$tipoComida." ".$tipodieta. " " .$tiporeceta." " .$padecimiento ." " .$ocacion ." " .$pais ." ORDER BY (re.votacionacomulada) DESC";
            $sql_query= mysqli_query($conn,$read);
            ?>

            <h1>Resultados</h1>
            <div class="row recetas-resultados">
                <div class="col-12 md-2 top">
                    <div class="contenedor-recetas">     
                        <?php while($receta = $sql_query->fetch_object()) : ?>          
                        <div class="tarjetas">
                            <a href="../vistas/receta-individual/mostrar-receta.php?recetaid=<?= $receta->recetaid ?>" style="text-decoration: none">
                            <link rel="stylesheet" href="../vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">
                                <div class="tarjeta-img">
                                    <img class="tarjeta-img tam-img" src="<?php echo 'data:image/jpeg;base64,' . base64_encode( $receta->imagen ) ?>">
                                </div>
                                <div class="tarjeta-info">
                                    <h3 class="card-title"><?= $receta->titulo; ?></h3> 
                                    <p class="card-text">Por: <?= $receta->nombres; ?></p> 
                                    <p class="card-text">Puntaje: <?= $receta->votacionacomulada; ?></p><br/> 
                                    <p>
                                        <?php
                                            if(isset($receta->tags) and !empty($_POST['ingrecientes-agregados'])){
                                                $buscar2 = explode(" ", $_POST['ingrecientes-agregados']);
                                                $palabras = "";
                                                $countPalabras = 0;
                                                for ($i=0; $i < count($buscar2); $i++) {
                                                    $boTitulo = stristr($receta->titulo, $buscar2[$i]);
                                                    $boTags = stristr($receta->tags, $buscar2[$i]);
                                                    $boIngrediente = stristr($receta->ingrediente, $buscar2[$i]);
                                                    $ocacion = "cualquiera desayuno almuerzo cena";
                                                    $boOcacion = stristr($ocacion, $buscar2[$i]);

                                                    if($boTags === false and $boTitulo === false and $boIngrediente === false and $boOcacion === false){
                                                        if($countPalabras == 0){
                                                            $palabras = $palabras." ".$buscar2[$i];
                                                        }else{
                                                            $palabras = $palabras.", ".$buscar2[$i];
                                                        }
                                                        $countPalabras = $countPalabras + 1;
                                                    }
                                                }
                                                if($countPalabras > 0 ){
                                                    echo $countPalabras > 1 ? "No contiene las palabras ":"No contiene la palabra ";echo"<u>".$palabras."</u>";
                                                }
                                                $palabras = "";
                                                $countPalabras = 0;
                                            }
                                            
                                        ?>
                                    </p>
                                </div>
                            </a> 
                        </div>
                        <?php endwhile; ?>
                    </div>  
                </div> 
            </div>                

            <?php
        }else{

            ?>
            <br><br>
            <h2>No se encontraron resutaldos</h2><br><br>

            <?php

        }

    }else{

            ?>
            <br><br>
            <h2>No se encontraron resutaldos</h2><br><br>
        
            <?php
    }
}
?>                        
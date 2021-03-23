<?php 
function og($titulo = "Rica Cocina", $meta_img = "img/meta-img-general.png", $meta_descripcion ="RicaCocina es una comunidad de creación gastronómica colectiva, con múltiples herramientas que te ayudarán a encontrar el camino del deleite y de la superación."){

?>
    <!-- Facebook Card -->  
    <meta property="og:site_name" content="Rica Cocina" />
    <meta property="og:url" content="<?php echo $URL.$_SERVER["REQUEST_URI"];?>" />
    <meta property="og:type" content="article:Blog" />
    <meta property="og:title" content="<?php echo $titulo ?>" />
    <meta property="og:description" content="<?php echo $meta_descripcion ?>" />
    <meta property="og:image" content="<?php echo $URL.$meta_img ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo $titulo ?>">
    <meta name="twitter:description" content="<?php echo $meta_descripcion ?>">
    <meta name="twitter:creator" content="@andercc2880">
    <meta name="twitter:image" content="<?php echo $URL.$meta_img ?>" >

    <!-- Schema.org para Google+ -->
    <meta itemprop="name" content="<?php echo $titulo ?>">
    <meta itemprop="description" content="<?php echo $meta_descripcion ?> ">
    <meta itemprop="image" content="<?php echo $meta_img ?>" >
    <title><?php echo $titulo ?></title>

<?php }?>
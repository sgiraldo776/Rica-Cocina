<?php
function get_url_valid_text($string_in){
	$string_output=mb_strtolower($string_in, 'UTF-8');
	//caracteres inválidos en una url
	$find=array('¥','µ','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ð','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','\'','"');
	//traduccion caracteres válidos
	$repl=array('-','-','a','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','ny','o','o','o','o','o','o','u','u','u','u','y','y','','' );
	$string_output=str_replace($find, $repl, $string_output);
	//más caracteres inválidos en una url que sustituiremos por guión
	$find=array(' ', '&','%','$','·','!','(',')','?','¿','¡',':','+','*','\n','\r\n', '\\', '´', '`', '¨', ']', '[');
	$string_output=str_replace($find, '-', $string_output);
	$string_output=str_replace('--', '', $string_output);
	return $string_output;
}

function move_to($origen,$destino){
    copy($origen,$destino);
    unlink($origen);
  }


function deleteDirectory($dir) {
    if(!$dh = @opendir($dir)) return;
    while (false !== ($current = readdir($dh))) {
        if($current != '.' && $current != '..') {
            echo 'Se ha borrado el archivo '.$dir.'/'.$current.'<br/>';
            if (!@unlink($dir.'/'.$current)) 
                deleteDirectory($dir.'/'.$current);
        }       
    }
    closedir($dh);
    echo 'Se ha borrado el directorio '.$dir.'<br/>';
    @rmdir($dir);
}

?>
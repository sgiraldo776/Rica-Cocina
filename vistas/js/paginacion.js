$(document).ready(paginacion(1));

function paginacion(partida){
    var url='paginar-recetas.php';
    $.ajax({
        type:'POST',
        url:url,
        data:'partida='+partida,
        success:function(data){
            var array = eval(data);
            $('#agrega-registros').html(array[0]);
            $('#pagination').html(array[1]);
        }
    });
    return false;
}
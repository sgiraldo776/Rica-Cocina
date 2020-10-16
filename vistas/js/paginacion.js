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

$("#filtrar").on('click', function paginacion(partida){
    if ($("#tipocomida").val() != 0 || $("#tipodieta").val() != 0 || $("#tiporeceta").val() != 0 || $("#padecimiento").val() != 0 || $("#ocacion").val() != 0 || $("#pais").val() != 0) {
        var url='paginar-recetas.php';
        $.ajax({
            type:'POST',
            url:url,
            data:'partida='+partida,
            data2:$('#add_form').serialize(),
            success:function(data,data2){
                var array = eval(data,data2);
                $('#agrega-registros').html(array[0]);
                $('#pagination').html(array[1]);
            }
        });
        return false;
    }else{
        Swal.fire({
            icon: 'warning',
            title: 'Alto!...',
            text: 'No ha seleccionado ningun tipo de filtro',
            /*footer: '<a href>Why do I have this issue?</a>'*/
        });
        return false;
    };
});
function SeleccionTipoComida(){
    let opTipoComida = document.getElementById("tipocomida").value;
    if(opTipoComida != '0'){
        // var opcTipoComida = {"opTipoComida" : opTipoComida};
        $.ajax({
            type: 'POST',
            url: 'filtrar_recetas.php',
            // dataType: "json",
            // data: opcTipoComida,
            data: 'opTipoComida='+ opTipoComida,
            contentType: false,
            // cache: false,   
            // processData:false, 
            success:function(data){
                var array = eval(data);
                // $('#agrega-registros').html(array[0]);
                // $('#pagination').html(array[1]);
            },
                // Alert status code and error if fail
            error: function (xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
        return false;
    }

}
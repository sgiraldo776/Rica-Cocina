$(function(){
    $(".boton-amarillo").on('click',function() {
        var formulario = document.add_form;
         if($('#nomreceta').val() !=""){
             if($('#ingrediente').val() !=""){
                if($('#preparacion').val() !=""){
                    if($('#tiempo').val() !=""){
                        if($('#cantidadpersona').val() !=0){
                            if($('#tipocomida').val() !=0){
                                if($('#tipodieta').val() !=0){
                                    if($('#pais').val() !=0){
                                        if($('#btn_enviar').val() !=""){

                                        }else {
                                            alert("Error, No ha Ingresado la Imagen de la Receta");
                                            $('#btn_enviar').focus().addClass("is-invalid");
                                        }

                                    }else {
                                        alert("Error, No ha Ingresado el Pais");
                                        $('#pais').focus().addClass("is-invalid");
                                    }

                                }else {
                                    alert("Error, No ha Ingresado el Tipo de Dieta ");
                                    $('#tipodieta').focus().addClass("is-invalid");
                                }

                            }else {
                            alert("Error, No ha Ingresado el tipo de Comida");
                            $('#tipocomida').focus().addClass("is-invalid");
                            }
                            
                        }else {
                            alert("Error, No ha Ingresado la Cantidad de personas");
                            $('#cantidadpersona').focus().addClass("is-invalid");
                        }

                    }else {
                        alert("Error, No ha Ingresado el Tiempo Preparacion");
                        $('#tiempo').focus().addClass("is-invalid");
                    }

                }else {
                   alert("Error, No ha Ingresado la Preparacion");
                   $('#preparacion').focus().addClass("is-invalid");
               }

             }else {
                alert("Error, No ha Ingresado los Ingredientes");
                $('#ingrediente').focus().addClass("is-invalid");
            }

         }else {
            alert("Error, No ha Ingresado el Nombre de la receta");
            $('#nomreceta').focus().addClass("is-invalid");
        }
        
    });
});
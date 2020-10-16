$(function(){
    $(".boton-amarillo").on('click',function() {
        var formulario = document.add_form;
         if($('#nomreceta').val() !=""){
             if($('#ingrediente').val() !=""){
                if($('#preparacion').val() !=""){
                    if($('#tiempo').val() !=""){
                        if($('#cantidadpersona').val() !=0){
                            if($('#ocacion').val() !=0){
                                if($('#tipocomida').val() !=0){
                                    if($('#tipodieta').val() !=0){
                                        if($('#pais').val() !=0){
                                            if($('#tiporeceta').val() !=0){
                                                if($('#padecimiento').val() !=0){
                                                    if($('#btn_enviar').val() !=""){
                                                        if($('#utensilios').val() !=""){
                                                            formulario.submit();  
                                                        }else{
                                                            Swal.fire({
                                                                icon: 'warning',
                                                                title: 'Ups...',
                                                                text: 'No ha Seleccionado ningún Utensilio',
                                                            });
                                                        }             
            
                                                    }else {
                                                        Swal.fire({
                                                            icon: 'warning',
                                                            title: 'Ups...',
                                                            text: 'No ha Seleccionado la Imagen de la Receta',
                                                        });
                                                        $('#btn_enviar').focus().addClass("is-invalid");
                                                    }
    
                                                }else{
                                                    Swal.fire({
                                                        icon: 'warning',
                                                        title: 'Ups...',
                                                        text: 'No ha Ingresado el Padecimiento',
                                                    });
                                                    $('#padecimiento').focus().addClass("is-invalid");
                                                }
    
                                            }else{
                                                Swal.fire({
                                                    icon: 'warning',
                                                    title: 'Ups...',
                                                    text: 'No ha Ingresado el Tipo de Receta',
                                                });
                                                $('#tiporeceta').focus().addClass("is-invalid");
                                            }
    
                                        }else {
                                            Swal.fire({
                                                icon: 'warning',
                                                title: 'Ups...',
                                                text: 'No ha Ingresado el País de la Receta',
                                            });
                                            $('#pais').focus().addClass("is-invalid");
                                        }
    
                                    }else {
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Ups...',
                                            text: 'No ha Ingresado el Tipo de Dieta',
                                        });
                                        $('#tipodieta').focus().addClass("is-invalid");
                                    }
    
                                }else {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Ups...',
                                        text: 'No ha Ingresado el Tipo de Comida',
                                    });
                                    $('#tipocomida').focus().addClass("is-invalid");
                                }

                            }else{
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Ups...',
                                    text: 'No ha Ingresado la ocación',
                                });
                                $('#ocacion').focus().addClass("is-invalid");
                            }
                            
                        }else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ups...',
                                text: 'No ha Ingresado la Cantidad de Personas',
                            });
                            $('#cantidadpersona').focus().addClass("is-invalid");
                        }

                    }else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Ups...',
                            text: 'No ha Ingresado el Tiempo de Preparación',
                        });
                        $('#tiempo').focus().addClass("is-invalid");
                    }

                }else {
                   Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    text: 'No ha Ingresado la Preparación',
                });
                   $('#preparacion').focus().addClass("is-invalid");
               }

             }else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    text: 'No ha Ingresado los Ingredientes',
                });
                $('#ingrediente').focus().addClass("is-invalid");
            }

         }else {
            Swal.fire({
                icon: 'warning',
                title: 'Ups...',
                text: 'No ha Ingresado el Nombre de la Receta',
            });
            $('#nomreceta').focus().addClass("is-invalid");
        }
        
    });
});
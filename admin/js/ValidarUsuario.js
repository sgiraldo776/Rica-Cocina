$(document).ready(function() {

    $('#con2').keyup(function() {

        var pass1 = $('#con1').val();
        var pass2 = $('#con2').val();

        if ( pass1 == pass2 ) {
            $('#error2').text("Coinciden").css("color", "green");
        } else {
            $('#error2').text("No Coinciden").css("color", "red");
        }

    });
    $('#pass1').keyup(function() {

        var pass1 = $('#con1').val();
        var pass2 = $('#con2').val();

        if ( pass1 == pass2 || pass2 == pass1 ) {
            $('#error2').text("Coinciden").css("color", "green");
        } else {
            $('#error2').text("No Coinciden").css("color", "red");
        }

    });
function kotoba() {
  $("#result").val($("#nombre").val().length + " Caracteres"); 
  alert("campo vacio");
  }

});


$(function(){
    $(".boton-amarillo").on('click',function(){
        var formulario = document.add_form;

        if($('#nombre').val()!=""){
            if($('#apellido').val()!=""){
                if($('#fechanacimiento').val()!=""){
                    if($('#correo').val()!=""){
                        if($('#municipio').val()!=0){
                            if($('#con1').val()!=""){
                                if($('#con2').val()!=""){
                                    validar("con2","con1");
                                    
                                    formulario.submit();
                                  }else{
                                  alert("Error, No ha Confirmado la Contraseña");
                                  $('#con2').focus().addClass("is-invalid");
                                }

                            }else{
                                alert("Error, No ha Ingresado la Contraseña");
                                $('#con1').focus().addClass("is-invalid");
                            }

                        }else{
                            alert("Error, No ha seleccionado ningún Municipio");
                            $('#municipio').focus().addClass("is-invalid");
                        }

                    }else{
                        alert("Error, No ha Ingresado el Correo");
                        $('#correo').focus().addClass("is-invalid");
                    }

                }else{
                    alert("Error, No ha Ingresado La Fecha de Nacimiento");
                    $('#fechanacimiento').focus().addClass("is-invalid");
                }

            }else{
                alert("Error, No ha Ingresado los Apellidos");
                $('#apellido').focus().addClass("is-invalid");
            }

        }else{
            alert("Error, No ha Ingresado el Nombre");
            $('#nombre').focus().addClass("is-invalid");
        }
    });
});
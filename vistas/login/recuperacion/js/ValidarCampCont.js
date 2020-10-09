$(document).ready(function() {

    $('#con2').keyup(function() {

        var pass1 = $('#con1').val();
        var pass2 = $('#con2').val();

        if (pass1 == pass2) {
            $('#error2').text("Coinciden").css("color", "green");
        } else {
            $('#error2').text("No Coinciden").css("color", "red");
        }

    });
    $('#pass1').keyup(function() {

        var pass1 = $('#con1').val();
        var pass2 = $('#con2').val();

        if (pass1 == pass2 || pass2 == pass1) {
            $('#error2').text("Coinciden").css("color", "green");
        } else {
            $('#error2').text("No Coinciden").css("color", "red");
        }

    });

});

$(function() {
    $(".boton-amarillo").on('click', function() {
        var formulario = document.addform;
        if ($('#con1').val() != "") {
            if ($('#con2').val() != "") {
                if ($('#con1').val() == $('#con2').val()) {
                    formulario.submit();
                } else {
                    alert("Error, Las Contraseñas Ingresadas no son Iguales")
                }

            } else {
                alert("Error, No ha Confirmado la Contraseña");
                $('#con2').focus().addClass("is-invalid");
            }

        } else {
            alert("Error, No ha Ingresado la Contraseña");
            $('#con1').focus().addClass("is-invalid");
            elemento.blur();
        }
    });
});
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

    function kotoba() {
        $("#result").val($("#nombre").val().length + " Caracteres");
        alert("campo vacio");
    }

});

var myDate = $('#fechanacimiento');
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();
if (dd < 10)
    dd = '0' + dd;

if (mm < 10)
    mm = '0' + mm;

today = yyyy + '-' + mm + '-' + dd;
myDate.attr("max", today);

function myFunction() {
    var date = myDate.val();
    if (Date.parse(date)) {
        if (date > today) {
            alert('La fecha no puede ser mayor a la actual');
            myDate.val("");
        }
    }
}

$(function() {
    $(".boton-amarillo").on('click', function() {
        var formulario = document.add_form;

        if ($('#nombre').val() != "") {
            if ($('#apellido').val() != "") {
                if ($('#fechanacimiento').val() != "") {
                    if ($('#correo').val() != "") {
                            if ($('#con1').val() != "") {
                                if ($('#con2').val() != "") {
                                    if ($('#con1').val() == $('#con2').val()) {
                                        if ($('#Terminos').is(':checked')) {
                                            formulario.submit();
                                        } else {
                                            Swal.fire({
                                                icon: 'warning',
                                                title: 'Error',
                                                text: 'No has aceptado los terminos y condiciones',
                                            });
                                        }
                                    } else {
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Error',
                                            text: 'Las Contraseñas Ingresadas no Coinciden',
                                        });
                                    }

                                } else {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Ups...',
                                        text: 'No ha Confirmado la Contraseña',
                                    });
                                    $('#con2').focus().addClass("is-invalid");
                                }

                            } else {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Ups...',
                                    text: 'No ha Ingresado la Contraseña',
                                });
                                $('#con1').focus().addClass("is-invalid");
                            }

                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Ups...',
                            text: 'No ha Ingresado el Correo',
                        });
                        $('#correo').focus().addClass("is-invalid");
                    }

                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        text: 'No ha Ingresado la Fecha de Nacimiento',
                    });
                    $('#fechanacimiento').focus().addClass("is-invalid");
                }

            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    text: 'No ha Ingresado los Apellidos',
                });
                $('#apellido').focus().addClass("is-invalid");
            }

        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Ups...',
                text: 'No ha Ingresado el Nombre',
            });
            $('#nombre').focus().addClass("is-invalid");
            elemento.blur();
        }
    });
});
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
    $("#enviar").on('click', function() {
        var formulario = document.add_form;

        if ($('#nombre').val() != "") {
            if ($('#apellido').val() != "") {
                if ($('#fechanacimiento').val() != "") {
                    formulario.submit();
                } else {
                    Swal.fire({
                    icon: 'warning',
                    title: 'Error...',
                    text: 'No ha Ingresado La Fecha de Nacimiento',
                    });
                    $('#fechanacimiento').focus().addClass("is-invalid");
                }

            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Error...',
                    text: 'No ha ingresado ningún Apellido',
                });
                $('#apellido').focus().addClass("is-invalid");
            }

        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Error...',
                text: 'No ha ingresado ningún Nombre',
            });
            $('#nombre').focus().addClass("is-invalid");
            elemento.blur();
        }
    });
});
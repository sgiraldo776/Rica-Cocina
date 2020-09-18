//formulario del padecimiento

function validarformulario() {
    //alert("todo bien");
    var formulario = document.add_form;

    if (formulario.txt_padecimiento.value == "") {
        alert("nos se puede ingresar campos vacios");
        return false;
    } else {
        formulario.submit();
    }



}

//formulario del tipo de comida

function validarformulario1() {
    //alert("todo bien");
    var formulario = document.add_form;

    if (formulario.txt_tipocomida.value == "") {
        alert("no se puede ingresar campos vacios");
        return false;
    } else {
        formulario.submit();
    }



}


//formulario del tipo dieta
function validarformulario2() {
    //alert("todo bien");
    var formulario = document.add_form;

    if (formulario.txt_tipodieta.value == "") {
        alert("no se puede ingresar campos vacios");
        return false;
    } else {
        formulario.submit();
    }



}
//formulario utensilio

function validarformulario3() {
    //alert("todo bien");
    var formulario = document.add_form;

    if (formulario.txt_utensilio.value == "") {
        Swal.fire({
            icon: 'error',
            title: 'Que mal...',
            text: 'El campo esta vacío',
            /*footer: '<a href>Why do I have this issue?</a>'*/
        });
        return false;
    } else {
        Swal.fire(
            'Excelente',
            'Ya lo hemos registrado',
            'byee'
        );
    }
    formulario.submit();
}

/*setTimeout(afterTwoSeconds, 2000);*/
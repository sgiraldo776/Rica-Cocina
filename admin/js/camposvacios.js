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
        formulario.submit();
    }
}

$(function(){
    $("#com").on('click', function() {
        var formulario = document.add_form;
        if($('#comentario').val() !=""){
            formulario.submit();
        }else{
            Swal.fire({
                icon: 'warning',
                title: 'Ups...',
                text: 'No ha ingresado ningún comentario',
            });
            return false;
        }
});
});


document.getElementById("vot").addEventListener("submit", function(event){
    let hasError = false;
    
    // obtenemos todos los input radio de la votacion
    // si no hay ninguno lanzamos alerta
    if(!document.querySelector('input[id="radio5"]:checked')) {
      if(!document.querySelector('input[id="radio4"]:checked')) {
        if(!document.querySelector('input[id="radio4"]:checked')) {
            if(!document.querySelector('input[id="radio3"]:checked')) {
                if(!document.querySelector('input[id="radio2"]:checked')) {
                    if(!document.querySelector('input[id="radio1"]:checked')) {
                        hasError = true;
                    }
                }
            }
        }
      }
    }
    
    if(hasError){
        Swal.fire({
            icon: 'warning',
            title: 'Ups...',
            text: 'No ha seleccionado ninguna estrella',
        });
    }
    
    // si hay algún error no efectuamos la acción submit del form
    if(hasError) event.preventDefault();
});
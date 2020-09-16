$("#guardar_utensilios").click(function() {
    var txt_utensilio = $("#txt_utensilio").val();

    if (txt_utensilio == '') {
        Swal.fire({
            icon: 'error',
            title: 'Que mal...',
            text: 'El campo esta vacío',
            /*footer: '<a href>Why do I have this issue?</a>'*/
        })
    }
})
function validareliminar(){
  var formulario = document.add_form;
  Swal
      .fire({
          title: "Venta #123465",
          text: "¿Eliminar?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: "Sí, eliminar",
          cancelButtonText: "Cancelar",
      })
      .then(resultado => {
          if (resultado.value) {
              // Hicieron click en "Sí"
              //console.log("*se elimina la venta*");
              location.href= 'ingreso/eliminar_receta.php?recetaid='+ $("#recetaid").val()
          } else {
              // Dijeron que no
              console.log("*NO se elimina la venta*");
          }
      });
  };


$("#ingresar").click(function alerta1(){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: 'You wont be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
});


    $('.form-eliminar').submit(function(e) {
        e.preventDefault();


        Swal.fire({
            title: '¿Estas seguro de querer eliminar este registro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {


                this.submit();

                // Swal.fire(
                //   'Deleted!',
                //   'Your file has been deleted.',
                //   'success'
                // )
            }
        })

    });


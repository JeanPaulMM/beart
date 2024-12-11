function confirmarDel(idProducto, action) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: '¡No podrás revertir esto!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, elimínalo!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '../Productos/Controller/prodsAdminController.php?prodid='+idProducto+'action='+action, 
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    Swal.fire('¡Eliminado!', 'El producto ha sido eliminado.', 'success').then(() => {
                    });
                },
                error: function() {
                    Swal.fire('Error', 'No se pudo eliminar el producto.', 'error');
                }
            });
        }
    });
}
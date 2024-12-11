function verdetalles(VALOR) {
    $('#exampleModal').modal('show');

    let modal = {
        url: "../model/consultadetalles.php?Parametro=" + VALOR,
        type: "GET"
    };

    $.ajax({
        url: modal.url,
        type: modal.type,
        dataType: 'json',
        success: function(response) {
            $('#modal-body-content').html('');

            if (response.length > 0) {
                let producto = response[0];

                var total=producto.cantidad*producto.precio;
                
                let contenido = `
                    <div><strong>Producto:</strong> ${producto.nombre_prod} </div>
                    <div><strong>Mensaje:</strong> ${producto.mensaje}</div>
                    <div><strong>Color:</strong> ${producto.color}</div>
                    <div><strong>Fuente:</strong> ${producto.fuente}</div>
                    <div><strong>Cantidad:</strong> ${producto.cantidad} </div>
                    <div><strong>Total:</strong> ${total} </div>
                `;

                $('#modal-body-content').html(contenido);
            } else {
                $('#modal-body-content').html('No se encontraron detalles para este producto.');
            }
        },
        error: function() {
            $('#modal-body-content').html('Ocurrió un error al cargar los detalles.');
        }
    });
}

function alertsubcar(){
    window.location.assign("../../carritocompras/view/carritocomprasview.php");
}
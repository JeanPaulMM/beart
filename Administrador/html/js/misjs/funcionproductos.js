function actualizarProducto(idProducto){
    let obj = {
        url: "../../Productos/View/actualizarProducto.php?idprod="+idProducto,
        type: "POST",
        data: $("#gestionProds").serialize()
    };
    $.ajax({
        url: obj.url,
        type: obj.type,
        async: false,
        success: function (response) {
            $('#modal-content').html(response);
        },
        error: function () {
            console.log("Error al cargar la vista del producto");
        }
    });

    var modal = new bootstrap.Modal(document.getElementById('updModal'));
    modal.show();
}
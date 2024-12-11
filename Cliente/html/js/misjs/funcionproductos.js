function abrirVistaAmb(VALOR) {
    
    $('#modal-container').modal('show');
    let modal = {
        url: "Ambiente/Controller/AmbienteController.php?Parametro=" + VALOR,
        type: "GET"
    };

    $. ajax({
        url: modal.url,
        type: modal.type,
        async: false, 
        success: function (response) {
            $('#modal-body-content').html(response);
        },
        error: function () {
            $('#modal-body-content').html('Ocurrió un error');
        }
    });
    $('#modal-container').modal('show');
}


function updateStyles() {
    var fuente = document.getElementById('fuentesel').value;
    var color = document.getElementById('colorpick').value;
    var tamaño = document.getElementById('tamañoL').value;

    var personalText = document.getElementById('personaltext');
    var sizeError = document.getElementById('sizeError');

    // Aplicar los estilos seleccionados
    if (fuente) {
        personalText.style.fontFamily = fuente;
    }
    if (color) {
        personalText.style.color = color;
    }
    if (tamaño) {
        if (tamaño >= 20 && tamaño <= 40) {
            personalText.style.fontSize = tamaño + "px";
            sizeError.style.display = "none"; // Oculta el mensaje de error
        } else {
            sizeError.style.display = "block"; // Muestra el mensaje de error
        }
    }
}

  document.getElementById('colorpick').addEventListener('input', updateStyles);
  
  function updateLabel() {
    var textField = document.getElementById('textField');
    var label = document.getElementById('personaltext');
    label.textContent = textField.value;
  }

  function updateTotalCompra() {
    var cantidadp = document.getElementById('cantidadp').value;
    var totalp = document.getElementById('totalpago');
    
    var confirmcar=document.getElementById('btnagrcar');
    confirmcar.disabled = cantidadp < 1 || cantidadp > 400;
    cantidadp = parseFloat(cantidadp) || 0;

    var totalcompra = 2000 * cantidadp;

    totalp.textContent = totalcompra.toFixed(2);
}

function ircarrito(){
    alert("Funciono");
    window.location = "carritocompras/view/carritocomprasview.php";
}

/*function openModal(button) {
    var productId = button.getAttribute('data-id');
    document.getElementById('productId').value = productId;
    var modal = new bootstrap.Modal(document.getElementById('updModal'));
    modal.show();
}*/
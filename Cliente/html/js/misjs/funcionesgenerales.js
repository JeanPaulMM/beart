// Función para actualizar los estilos aplicados al texto personalizado
function updateStyles() {
    var fuente = document.getElementById('fuentesel').value;
    var color = document.getElementById('colorpick').value;
    var tamaño = document.getElementById('tamañoL').value;

    var personalText = document.getElementById('personaltext');
    var sizeError = document.getElementById('sizeError'); // Asumimos que existe un elemento con este id para mostrar errores

    // Aplicar los estilos seleccionados
    if (fuente) {
        personalText.style.fontFamily = fuente;
    }
    if (color) {
        personalText.style.color = color;
    }
    if (tamaño) {
        // Validar el tamaño
        if (tamaño === 'pequeño' || tamaño === 'medio' || tamaño === 'grande') {
            personalText.classList.remove('pequeño', 'medio', 'grande');
            personalText.classList.add(tamaño);
            if (sizeError) sizeError.style.display = "none"; // Oculta el mensaje de error si existe
        } else {
            if (sizeError) sizeError.style.display = "block"; // Muestra el mensaje de error si existe
        }
    }
}

// Función para actualizar el contenido del párrafo basado en el texto del campo de texto
function updateLabel() {
    var textField = document.getElementById('textField');
    var label = document.getElementById('personaltext');
    label.textContent = textField.value;
}

// Función para actualizar el campo de texto cuando se cambia la selección
function updateSelect() {
    var selectElement = document.getElementById('text-select');
    var textField = document.getElementById('textField');

    // Obtener el texto seleccionado y actualizar el campo de texto
    var selectedText = selectElement.value;
    textField.value = selectedText;
    updateLabel(); // Actualizar el contenido del párrafo
}

// Ajustar el tamaño basado en la vista de pantalla al cargar la página
function adjustSizeForViewport() {
    var sizeSelector = document.getElementById('tamañoL');
    var content = document.getElementById('personaltext');

    var selectedSize = sizeSelector.value;
    content.classList.remove('pequeño', 'medio', 'grande');
    content.classList.add(selectedSize);
}

// Función para calcular el total de la compra y habilitar el botón de confirmar
function updateTotalCompra() {
    var cantidadp = document.getElementById('cantidadp').value;
    var totalp = document.getElementById('totalpago');

    var confirmcar = document.getElementById('btnagrcar');
    confirmcar.disabled = cantidadp < 1 || cantidadp > 400;
    cantidadp = parseFloat(cantidadp) || 0;

    var totalcompra = 10000 * cantidadp;

    totalp.textContent = totalcompra.toFixed(2);
}

// Función para redirigir al carrito de compras
function ircarrito() {
    alert("Funcionó");
    window.location = "carritocompras/view/carritocomprasview.php";
}

// Función para abrir el modal del producto
function openModal(button) {
    var productId = button.getAttribute('data-id');
    document.getElementById('productId').value = productId;
    var modal = new bootstrap.Modal(document.getElementById('productModal'));
    modal.show();
}

// Agregar eventos a los elementos del DOM
document.getElementById('colorpick').addEventListener('input', updateStyles);
document.getElementById('tamañoL').addEventListener('change', updateStyles);
document.getElementById('text-select').addEventListener('change', updateSelect);

window.addEventListener('load', function() {
    adjustSizeForViewport();
    updateLabel();
});
window.addEventListener('resize', adjustSizeForViewport);

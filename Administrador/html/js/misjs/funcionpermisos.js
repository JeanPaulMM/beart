function obtenerPermisosSeleccionados() {
    const modulos = document.querySelectorAll('.modulo');
    let permisos = {};

    modulos.forEach(modulo => {
        const moduloID = modulo.getAttribute('data-modulo-id');
        const submodulos = document.querySelectorAll(`input[name="submodulos_modulo[${moduloID}][]"]:checked`);
        if (submodulos.length > 0 || modulo.checked) { // Verificar submodulos o modulo chequeado
            permisos[moduloID] = Array.from(submodulos).map(submodulo => submodulo.value);
        }
    });

    console.log("Permisos seleccionados:", permisos); // Verifica los permisos seleccionados en la consola del navegador

    return permisos;
}

function RegistrarPermisos() {
    const form = document.querySelector("#RegPerms");
    let formData = new FormData(form);

    let datos = {
        formulario: Object.fromEntries(formData),
        permisos: obtenerPermisosSeleccionados()
    };

    fetch("../../Roles/View/AsignarPermisos.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(datos) // Envía los datos como JSON
    })
    .then(function(res) {
        if (res.ok) {
            return res.text();
        }
        throw new Error('Network response was not ok.');
    })
    .then(function(data) {
        console.log(data);
    })
    .catch(function(error) {
        console.error('Error:', error);
    });
}
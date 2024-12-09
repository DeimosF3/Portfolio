// Validación de formulario
window.onload = function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', (e) => {
        const nombre = document.getElementById('nombre').value.trim();
        const apellido = document.getElementById('apellido').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        const telefono = document.getElementById('telefono').value.trim();

        let isValid = true;
        let mensajeError = '';

        // Validación de campos vacíos
        if (!nombre || !apellido || !email || !password || !telefono) {
            isValid = false;
            mensajeError += 'Todos los campos son obligatorios.\n';
        }

        // Validación del nombre (máximo 20 caracteres)
        if (nombre.length > 20) {
            isValid = false;
            mensajeError += 'El nombre no puede tener más de 20 caracteres.\n';
        }

        // Validación del teléfono (al menos 10 dígitos)
        if (telefono.length < 10) {
            isValid = false;
            mensajeError += 'El teléfono debe tener al menos 10 dígitos.\n';
        }

        // Si hay errores, mostrar mensaje y detener envío
        if (!isValid) {
            e.preventDefault();
            alert(mensajeError);
        }
    });
};

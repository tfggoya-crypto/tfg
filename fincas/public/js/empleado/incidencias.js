let estadoIncidenciaActivo = null;
let reabrirModalIncidencias = false;

window.setEstadoIncidencia = function(select) {

    const incidenciaId = select.getAttribute('data-incidencia-id');

    estadoIncidenciaActivo = incidenciaId;

    reabrirModalIncidencias = true;

    const texto = document.getElementById('textoCambiarEstadoIncidencia');

    const opcion = select.options[select.selectedIndex];

    if (texto) {
        texto.textContent =
            `¿Estás seguro de cambiar el estado a "${opcion.textContent.trim()}"?`;
    }

    const modalIncidenciasEl =
        document.getElementById('modalIncidencias');

    const modalCambiarEl =
        document.getElementById('modalCambiarEstadoIncidencia');

    const modalIncidencias =
        bootstrap.Modal.getInstance(modalIncidenciasEl);

    if (modalIncidencias) {

        modalIncidenciasEl.addEventListener(
            'hidden.bs.modal',
            function () {

                const modalCambiar =
                    new bootstrap.Modal(modalCambiarEl);

                modalCambiar.show();

            },
            { once: true }
        );

        modalIncidencias.hide();

    } else {

        const modalCambiar =
            new bootstrap.Modal(modalCambiarEl);

        modalCambiar.show();
    }
}

window.confirmarCambioEstado = function() {

    if (!estadoIncidenciaActivo) return;

    const form =
        document.getElementById(
            `formEstado-${estadoIncidenciaActivo}`
        );

    if (form) {
        form.submit();
    }

    const modalEl = document.getElementById('modalCambiarEstadoIncidencia');
    const modal = bootstrap.Modal.getInstance(modalEl);

    if (modal) {
        modal.hide();
    }

    reabrirModalIncidencias = false;
    estadoIncidenciaActivo = null;
}

document.addEventListener('DOMContentLoaded', function () {
    const modalCambiarEstado = document.getElementById('modalCambiarEstadoIncidencia');

    if (modalCambiarEstado) {
        modalCambiarEstado.addEventListener('hidden.bs.modal', function () {
            if (reabrirModalIncidencias) {
                const modalIncidenciasEl = document.getElementById('modalIncidencias');

                if (modalIncidenciasEl) {
                    const modalIncidencias = new bootstrap.Modal(modalIncidenciasEl);
                    modalIncidencias.show();
                }
            }

            reabrirModalIncidencias = false;
            estadoIncidenciaActivo = null;
        });
    }
});

window.setDeleteIncidenciaAction = function (button) {
    const form = document.getElementById('formEliminarIncidencia');
    const texto = document.getElementById('textoEliminarIncidencia');

    if (form) {
        form.action = button.getAttribute('data-action');
    }

    if (texto) {
        const titulo = button.getAttribute('data-titulo');
        texto.textContent = titulo
            ? `¿Estás seguro de eliminar la incidencia "${titulo}"?`
            : '¿Estás seguro de eliminar esta incidencia?';
    }
}

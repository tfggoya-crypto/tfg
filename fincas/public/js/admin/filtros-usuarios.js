document.addEventListener('DOMContentLoaded', function () {

    const filtroEdificio = document.getElementById('filtroEdificio');
    const filtroRol = document.getElementById('filtroRol');

    const edificios = document.querySelectorAll('.edificio-block');
    const usuarios = document.querySelectorAll('.usuario-item');

    function filtrar() {

        const edificio = filtroEdificio.value;
        const rol = filtroRol.value;

        // 1. FILTRO POR EDIFICIO (bloques completos)
        edificios.forEach(block => {

            const matchEdificio = !edificio || block.dataset.edificio === edificio;

            block.style.display = matchEdificio ? 'block' : 'none';
        });

        // 2. FILTRO POR ROL (usuarios dentro de bloques visibles)
        usuarios.forEach(item => {

            const matchRol = !rol || item.dataset.rol === rol;

            item.style.display = matchRol ? 'block' : 'none';
        });
    }

    filtroEdificio.addEventListener('change', filtrar);
    filtroRol.addEventListener('change', filtrar);

});
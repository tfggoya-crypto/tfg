function toggleField(id) {
    const input = document.getElementById(id);

    if (!input) {
        console.error("No existe el input:", id);
        return;
    }

    input.disabled = !input.disabled;

    if (!input.disabled) {
        input.focus();
    }
}
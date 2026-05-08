window.rellenarRolSubrol = function(select) {

    const value = select.value;

    if (!value) return;

    const [role, subrole] = value.split('|');

    document.getElementById('roleInput').value = role;
    document.getElementById('subroleInput').value = subrole;
};
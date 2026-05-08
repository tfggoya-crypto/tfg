function setUserRole(select, id) {

    const value = select.value;

    if (!value) return;

    const parts = value.split('|');

    if (parts.length !== 2) return;

    const role = parts[0];
    const subrole = parts[1];

    document.getElementById('role-' + id).value = role;
    document.getElementById('subrole-' + id).value = subrole;
}
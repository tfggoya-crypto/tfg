function setUserRole(select) {

    const value = select.value;
    if (!value) return;

    const [role, subrole] = value.split('|');

    const mode = select.dataset.mode || 'edit';

    // =========================
    // CREATE USER
    // =========================
    if (mode === 'create') {

        const roleInput = document.getElementById('roleInput');
        const subroleInput = document.getElementById('subroleInput');

        if (roleInput && subroleInput) {
            roleInput.value = role;
            subroleInput.value = subrole;
        }

        return;
    }

    // =========================
    // EDIT USER
    // =========================
    const userId = select.dataset.userId;

    if (!userId) return;

    const roleEdit = document.getElementById('role-' + userId);
    const subroleEdit = document.getElementById('subrole-' + userId);

    if (roleEdit && subroleEdit) {
        roleEdit.value = role;
        subroleEdit.value = subrole;
    }
}
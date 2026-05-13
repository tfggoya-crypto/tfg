document.addEventListener('DOMContentLoaded', function () {
	const alert = document.getElementById('success-alert');

	if (!alert) {
		return;
	}

	setTimeout(function () {
		alert.classList.add('fade');
		alert.classList.remove('show');

		setTimeout(function () {
			alert.remove();
		}, 300);
	}, 3000);
});

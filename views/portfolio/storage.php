<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Curriculum Guardados</title>
	<link rel="stylesheet" href="../../assets/css/home.css">
</head>
<body>
	<div class="container">
		<h1 class="text-center">Curriculum Guardados</h1>
		<div id="portfolios-list" class="mt-4"></div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
				const userIds = JSON.parse(localStorage.getItem('user_ids')) || [];
				const portfoliosList = document.getElementById('portfolios-list');

				if (userIds.length === 0) {  // Verificar si no hay IDs guardados
						portfoliosList.innerHTML = '<p>No hay portfolios guardados.</p>';
				} else {
						userIds.forEach((userId, index) => {
								const portfolioDiv = document.createElement('div');
								portfolioDiv.classList.add('portfolio-preview');
								portfolioDiv.innerHTML = `
										<h4>Usuario ID: ${userId}</h4>
										<button onclick="viewPortfolio(${index})" class="btn btn-primary">Ver Curriculum</button>
								`;
								portfoliosList.appendChild(portfolioDiv);
						});
				}
		});

		// Función para redirigir a la página de vista del portfolio
		function viewPortfolio(index) {
				const userIds = JSON.parse(localStorage.getItem('user_ids')) || [];
				const selectedUserId = userIds[index];
				window.location.href = `ver.php?user_id=${selectedUserId}`;
		}
	</script>
</body>
</html>
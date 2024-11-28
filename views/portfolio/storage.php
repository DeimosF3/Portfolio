<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Guardados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/home.css">
    <style>
        body {
            background-color: #f8f9fa; /* Mantener el fondo actual */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Curriculum Guardados</h1>
        <div id="portfolios-list" class="mt-4"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const userIds = JSON.parse(localStorage.getItem('user_ids')) || [];
            const portfoliosList = document.getElementById('portfolios-list');

            if (userIds.length === 0) {  // Verificar si no hay IDs guardados
                portfoliosList.innerHTML = '<p class="text-center">No hay portfolios guardados.</p>';
            } else {
                userIds.forEach((userId, index) => {
                    const portfolioDiv = document.createElement('div');
                    portfolioDiv.classList.add('portfolio-preview', 'card', 'mb-3', 'p-3');
                    portfolioDiv.innerHTML = `
                        <h4 class="text-center">Usuario ID: ${userId}</h4>
                        <div class="text-center">
                            <button onclick="viewPortfolio(${index})" class="btn btn-primary btn-sm">Ver Curriculum</button>
                        </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
</body>
</html>
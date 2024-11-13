<?php
require 'controllers/PortfolioController.php';

if (!isset($_GET['id'])) {
    echo "Usuario no encontrado";
    exit;
}

$controller = new PortfolioController();
$portfolio = $controller->getPortfolioByUser($_GET['id']);

include 'views/ver.php';
?>
<script>
document.querySelector('#favorito-btn').addEventListener('click', function() {
    if (!<?= json_encode(isset($_SESSION['user_id'])); ?>) {
        let favoritos = JSON.parse(localStorage.getItem('favoritos')) || [];
        favoritos.push(<?= json_encode($_GET['id']); ?>);
        localStorage.setItem('favoritos', JSON.stringify(favoritos));
    } else {
        // Código para agregar a favoritos en la base de datos
    }
});
</script>

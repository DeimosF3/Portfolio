<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require 'controllers/PortfolioController.php';
$controller = new PortfolioController();
$portfolio = $controller->getPortfolioByUser($_SESSION['user_id']);

include 'views/editar.php';
?>

<?php
session_start();

// Verificar si la sesión está configurada
$response = [
    'user_id' => isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null
];

// Devolver el JSON
header('Content-Type: application/json');
echo json_encode($response);
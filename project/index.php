<?php
session_start();
require 'models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    if ($user->login($email, $password)) {
        $_SESSION['user_id'] = $user->getId();
        header('Location: editar.php');
        exit;
    } else {
        $error = "Credenciales incorrectas";
    }
}
include 'views/login.php';
?>

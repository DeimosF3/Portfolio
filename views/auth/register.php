<?php
session_start();
require_once __DIR__ . '/../../config/database.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $database = new Database();
    $conn = $database->connect();


    if ($conn) {

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
          
            $_SESSION['user_id'] = $conn->lastInsertId();
            header("Location: ./portfolio_form.php");
            exit();
        } else {
            echo "Error al registrar el usuario";
        }
    } else {
        echo "No se pudo conectar a la base de datos";
    }
}
?>

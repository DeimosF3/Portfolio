<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mi_portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT id, password FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['id'];

    if (password_verify($password, $row['password'])) {
        header("Location: ../../views/portfolio/view_portfolio.php");
        exit();
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "No se encontró una cuenta con ese correo electrónico";
    header("Location: ../../index.php");
    exit();
}

$conn->close();
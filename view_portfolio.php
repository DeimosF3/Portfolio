<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mi_portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el portafolio del usuario actual
$user_id = $_SESSION['user_id'];
$sql = "SELECT name, description, skills, projects FROM portfolio WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2>Mi Portafolio</h2>";
    echo "<p><strong>Nombre:</strong> " . $row["name"] . "</p>";
    echo "<p><strong>Descripción:</strong> " . $row["description"] . "</p>";
    echo "<p><strong>Habilidades:</strong> " . $row["skills"] . "</p>";
    echo "<p><strong>Proyectos:</strong> " . $row["projects"] . "</p>";
} else {
    echo "No se han encontrado datos del portafolio.";
}

$conn->close();
?>

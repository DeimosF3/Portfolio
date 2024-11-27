<?php
session_start();

// Verificar si el usuario está logeado
if (!isset($_SESSION['user_id'])) {
    echo "No estás logeado.";
    exit;
}

require_once '../../config/database.php';

$database = new Database();
$conn = $database->connect();

// Obtener el ID del usuario desde la sesión
$user_id = $_SESSION['user_id'];

// Consultar la imagen binaria
$sql = "SELECT foto FROM portfolio WHERE user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id' , $user_id, PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Comprobar si la imagen existe en la base de datos
    if (!empty($row['foto'])) {
        // Establecer el encabezado correcto para la imagen
        header("Content-Type: image/png"); // Cambiar a image/png si usas PNG
        echo $row['foto']; // Enviar la imagen binaria al navegador
    } else {
        // Si no hay imagen, mostrar una por defecto
        header("Content-Type: image/gif");
        echo file_get_contents("https://c.tenor.com/Zs3To_SQKdUAAAAd/tenor.gif"); // Imágenes por defecto en caso de que no haya foto
    }
} else {
    // Si no se encuentra el usuario o la imagen, mostrar la imagen por defecto
    header("Content-Type: image/gif");
    echo file_get_contents("https://c.tenor.com/Zs3To_SQKdUAAAAd/tenor.gif");
}

$conn = null;
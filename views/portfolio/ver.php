<?php
session_start();
require_once '../../config/database.php';

//Estas dos líneas sirven para crear una instancia de la clase Database del archivo "database.php". 
//Utiliza el método conectar() para conectarnos a la base de datos.
$database = new Database();
$conn = $database->connect();

//Con esta sentencia "if" lo que hacemos es comprobar que el user_id está presente en el parámetro GET. 
//Se debe introducir la url en el archivo correctamente para que funcione.

if (!isset($_GET['user_id']) || !is_numeric($_GET['user_id'])) {
    die("Error al cargar los datos. Debe introducir una url similar a esta: http://localhost/views/portfolio/ver.php?user_id=1.");
}
$user_id = $_GET['user_id'];

// Generamos la consulta para obtener el portfolio. Usamos prepared statement para que sea mas segura.
$sql = "SELECT name, description, skills, projects 
        FROM portfolio 
        WHERE user_id = :user_id 
        ORDER BY id DESC 
        LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

// Si la ha obtenido se muestra por pantalla y si no salta un mensaje diciendo lo contrario.
//Si no obtiene resultados es posible que el usuario no exista o no haya rellenado el portfolio.
if ($row = $stmt->fetch()) {
    echo "<h2>Mi Portafolio</h2>";
    echo "<p><strong>Nombre:</strong> " . htmlspecialchars($row["name"]) . "</p>";
    echo "<p><strong>Descripción:</strong> " . htmlspecialchars($row["description"]) . "</p>";
    echo "<p><strong>Habilidades:</strong> " . htmlspecialchars($row["skills"]) . "</p>";
    echo "<p><strong>Proyectos:</strong> " . htmlspecialchars($row["projects"]) . "</p>";
} else {
    echo "No se han encontrado datos del portafolio.";
}

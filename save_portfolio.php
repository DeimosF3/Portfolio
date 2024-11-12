<?php
session_start();

echo "Hola";
echo "asd " . $_SESSION['user_id'];


// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    echo "No has iniciado sesión";
    // header("Location: index.html");
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

// Recibir datos del formulario
$user_id = $_SESSION['user_id'];
$name = $_POST['name'];
$description = $_POST['description'];
$skills = $_POST['skills'];
$projects = $_POST['projects'];

// Insertar datos en la tabla `portfolio`
$sql = "INSERT INTO portfolio (user_id, name, description, skills, projects) VALUES ('$user_id', '$name', '$description', '$skills', '$projects')";

echo $sql;

if ($conn->query($sql) === true) {
    echo "Portafolio guardado correctamente";
    header("Location: view_portfolio.php");
    exit();
} else {
    echo "Error al guardar portafolio: " . $conn->error;
}

$conn->close();
?>

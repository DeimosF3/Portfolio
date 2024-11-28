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

require_once '../../config/database.php';

$database = new Database();
$conn = $database->connect();


// Comprobar conexión
try {
    $conn = $database->connect();
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Verifica si se subió el archivo
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    // Obtener el archivo y convertirlo a binario
    $foto = file_get_contents($_FILES['foto']['tmp_name']);
} else {
    $foto = null;
}

// Recibir otros datos del formulario
$user_id = $_SESSION['user_id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$puesto = $_POST['puesto'];
$perfil_personal = $_POST['perfil_personal'];
$experiencia = json_encode($_POST['experiencia']);

// Insertar datos en la tabla `portfolio`
$sql = "UPDATE portfolio SET nombre = :nombre, apellido = :apellido, correo = :correo, puesto = :puesto, perfil_personal = :perfil_personal, experiencia = :experiencia, foto = :foto WHERE user_id = :user_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellido', $apellido);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':puesto', $puesto);
$stmt->bindParam(':perfil_personal', $perfil_personal);
$stmt->bindParam(':experiencia', $experiencia);
$stmt->bindParam(':foto', $foto, PDO::PARAM_LOB); // Usar PDO::PARAM_LOB para datos binarios

if ($stmt->execute()) {
    echo "Portafolio guardado correctamente";
    echo $experiencia;
    header("Location: ../../views/portfolio/view_portfolio.php");
    exit();
} else {
    echo "Error al guardar portafolio: " . $stmt->errorInfo()[2];
}

$conn = null;
?>

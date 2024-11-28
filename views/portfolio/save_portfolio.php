<?php
session_start();

echo "Hola";
echo "asd " . $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) {
    echo "No has iniciado sesión";
    // header("Location: index.html");
    exit();
}

require_once '../../config/database.php';

$database = new Database();
$conn = $database->connect();



try {
    $conn = $database->connect();
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}


if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    
    $foto = file_get_contents($_FILES['foto']['tmp_name']);
} else {
    $foto = null;
}


$user_id = $_SESSION['user_id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$puesto = $_POST['puesto'];
$perfil_personal = $_POST['perfil_personal'];
$experiencia = json_encode($_POST['experiencia']);
$habilidades = $_POST['habilidades'];
$educacion = $_POST['educacion'];


$sql = "UPDATE portfolio SET nombre = :nombre, apellido = :apellido, correo = :correo, puesto = :puesto, perfil_personal = :perfil_personal, experiencia = :experiencia, habilidades = :habilidades, educacion = :educacion, foto = :foto WHERE user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellido', $apellido);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':puesto', $puesto);
$stmt->bindParam(':perfil_personal', $perfil_personal);
$stmt->bindParam(':experiencia', $experiencia);
$stmt->bindParam(':habilidades', $habilidades);
$stmt->bindParam(':educacion', $educacion);
$stmt->bindParam(':foto', $foto, PDO::PARAM_LOB); 
if ($stmt->execute()) {
    echo "Portafolio guardado correctamente";
    header("Location: ../../views/portfolio/view_portfolio.php");
    exit();
} else {
    echo "Error al guardar portafolio: " . $stmt->errorInfo()[2];
}
$conn = null;

$conn = null;
?>

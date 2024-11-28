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
$sql = "SELECT nombre, apellido, correo, puesto, perfil_personal, experiencia, foto 
        FROM portfolio 
        WHERE user_id = :user_id 
        ORDER BY id DESC 
        LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
if ($row = $stmt->fetch()) {
    $nombre = htmlspecialchars($row["nombre"]);
    $apellido = htmlspecialchars($row["apellido"]);
    $correo = htmlspecialchars($row["correo"]);
    $puesto = htmlspecialchars($row["puesto"]);
    $perfil_personal = htmlspecialchars($row["perfil_personal"]);
    $experiencia = htmlspecialchars($row["experiencia"]);
    $foto = !empty($row["foto"]) ? 'data:image/jpeg;base64,' . base64_encode($row["foto"]) : null;
} else {
    echo "No se han encontrado datos del portafolio.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Portafolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background-color: #f9f9f9; }
        .container { max-width: 800px; margin: 20px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); }
        .profile-img { width: 100px; height: 100px; object-fit: cover; border-radius: 50%; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($foto): ?>
            <img src="<?php echo $foto; ?>" alt="Foto de perfil" class="profile-img" />
        <?php else: ?>
            <p>No hay foto de perfil disponible.</p>
        <?php endif; ?>
        <h2>Mi Portafolio</h2>
        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
        <p><strong>Apellido:</strong> <?php echo $apellido; ?></p>
        <p><strong>Correo:</strong> <?php echo $correo; ?></p>
        <p><strong>Puesto:</strong> <?php echo $puesto; ?></p>
        <p><strong>Perfil Personal:</strong> <?php echo $perfil_personal; ?></p>
        <p><strong>Experiencia:</strong> <?php echo $experiencia; ?></p>
    </div>
</body>
</html>
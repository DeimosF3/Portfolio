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
    die("Error al cargar los datos. Debe introducir una URL similar a esta: http://localhost/views/portfolio/ver.php?user_id=1.");
}
$user_id = $_GET['user_id'];

try {
    // Consulta SQL
    $sql = "SELECT nombre, apellido, correo, puesto, perfil_personal, experiencia, habilidades, educacion, foto 
            FROM portfolio 
            WHERE user_id = :user_id 
            ORDER BY id DESC 
            LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    
    // Obtener resultado
    $portfolio = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$portfolio) {
        die("No se encontró ningún portafolio para el usuario especificado.");
    }

    // Escapar valores para prevenir XSS
    $nombre = htmlspecialchars($portfolio["nombre"]);
    $apellido = htmlspecialchars($portfolio["apellido"]);
    $correo = htmlspecialchars($portfolio["correo"]);
    $puesto = htmlspecialchars($portfolio["puesto"]);
    $perfil_personal = htmlspecialchars($portfolio["perfil_personal"]);
    $experiencia = htmlspecialchars($portfolio["experiencia"]);
    $habilidades = htmlspecialchars($portfolio["habilidades"]);
    $educacion = htmlspecialchars($portfolio["educacion"]);
    $foto = !empty($portfolio["foto"]) ? 'data:image/jpeg;base64,' . base64_encode($portfolio["foto"]) : null;

} catch (PDOException $e) {
    die("Error al ejecutar la consulta: " . $e->getMessage());
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
</head>
<body>
    <div class="text-center">
        <h1>Portafolio de <?php echo $nombre . ' ' . $apellido; ?></h1>
    <p><strong>Correo:</strong> <?php echo $correo; ?></p>
    <p><strong>Puesto:</strong> <?php echo $puesto; ?></p>
    <h2>Perfil Personal</h2>
    <p><?php echo $perfil_personal; ?></p>

    <h2>Experiencia</h2>
    <p><?php echo $experiencia; ?></p>

    <h2>Habilidades</h2>
    <p><?php echo $habilidades; ?></p>

    <h2>Educación</h2>
    <p><?php echo $educacion; ?></p>

    <?php if ($foto): ?>
        <h2>Foto de Perfil</h2>
        <img src="<?php echo $foto; ?>" alt="Foto de perfil">
    <?php else: ?>
        <p>No se ha cargado una foto de perfil.</p>
    <?php endif; ?>
    </div>
    
</body>
</html>
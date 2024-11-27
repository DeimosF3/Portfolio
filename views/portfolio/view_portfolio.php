<?php
session_start();

// Verifica si el usuario está logeado
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header('Location: login.php'); // Redirige a la página de inicio de sesión si no está logeado
//     exit;
// }

require_once '../../config/database.php';

// Crear instancia de la base de datos
$database = new Database();
$conn = $database->connect();

// Recuperar el user_id de la sesión
$user_id = $_SESSION['user_id']; // Suponemos que el `user_id` está en la sesión después del login

// Recuperar los datos del portafolio usando PDO
$sql = "SELECT nombre, apellido, correo, puesto, perfil_personal, experiencia, foto FROM portfolio WHERE user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

$portfolio = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$portfolio) {
    header("Location: view_portfolio.php");
}

$conn = null; // Cierra la conexión con la base de datos
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Portafolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f9f9f9;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Mi Portafolio</h1>

        <!-- Foto de perfil -->
        <div class="text-center">
            <!-- <img src="mostrar_imagen.php" alt="Foto de perfil" class="profile-img"> -->
            <?php if (!empty($portfolio['foto'])): ?>
                <img src="mostrar_imagen.php" alt="Foto de perfil" class="profile-img">
            <?php else: ?>
                <img src="https://c.tenor.com/Zs3To_SQKdUAAAAd/tenor.gif" alt="Foto de perfil" class="profile-img">
            <?php endif; ?>
        </div>

        <!-- Información personal -->
        <h2 class="text-center"><?= htmlspecialchars($portfolio['nombre']) ?> <?= htmlspecialchars($portfolio['apellido']) ?></h2>
        <p class="text-center text-muted"><?= htmlspecialchars($portfolio['puesto']) ?></p>
        <p class="text-center"><?= htmlspecialchars($portfolio['correo']) ?></p>

        <!-- Perfil personal -->
        <h4 class="mt-4">Perfil Personal</h4>
        <p><?= nl2br(htmlspecialchars($portfolio['perfil_personal'])) ?></p>

        <!-- Experiencia laboral -->
        <h4 class="mt-4">Experiencia Laboral</h4>
        <?php
        $experiencias = json_decode($portfolio['experiencia'], true);
        if ($experiencias && is_array($experiencias)):
            foreach ($experiencias as $exp): ?>
                <p>- <?= htmlspecialchars($exp) ?></p>
            <?php endforeach;
        else: ?>
            <p>No se ha agregado experiencia laboral.</p>
        <?php endif; ?>
    </div>

    <form action="./edit.php" method="POST">
        <button class="btn btn-success rounded-pill px-3" type="submit">Editar coso</button>
    </form>
</body>

</html>
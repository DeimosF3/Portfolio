<?php
session_start();

$_SESSION['user_id'] = $_SESSION['user_id'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mi_portfolio";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir datos del formulario de registro
$user = $_POST['username'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash de la contraseña

// Insertar datos del usuario en la tabla `users`
$sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "Usuario registrado correctamente";
    
    // -----------------------------------------------------------------------

    $sqll = "SELECT id, password FROM users WHERE email = '$email'";
    $result = $conn->query($sqll);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];

        if (password_verify($password, $row['password'])) {
             // Guardar datos en la sesión y redirigir al formulario de portafolio
            header("Location: portfolio_form.php");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "No se encontró una cuenta con ese correo electrónico";
    }

    // -------------------------------------------------------------------------

    header("Location: portfolio_form.php"); // Redirige al login después del registro
    exit();
} else {
    echo "Error al registrar usuario: " . $conn->error;
}

// ------------------------------------------------------



// ------------------------------------------------------

$conn->close();
?>

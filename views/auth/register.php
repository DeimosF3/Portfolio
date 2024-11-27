<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../config/database.php';

$database = new Database();
$conn = $database->connect();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($conn) {

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            $user_id = $conn->lastInsertId();

            $porfavor = $conn->prepare("INSERT INTO portfolio (user_id, nombre, apellido, correo, puesto, perfil_personal, experiencia, foto) VALUES (:user_id, '', '', '', '', '', '', '')");
            $porfavor->bindParam(':user_id', $user_id);
            
            if ($porfavor->execute()) {
                $_SESSION['user_id'] = $user_id;
                header("Location: ../../views/portfolio/edit.php");
                exit();
            } else {
                echo "Erorr, por favor busque a dios";
            }
        } else {
            echo "Error al registrar el usuario";
        }


        
    } else {
        echo "No se pudo conectar a la base de datos";
    }
}
?>

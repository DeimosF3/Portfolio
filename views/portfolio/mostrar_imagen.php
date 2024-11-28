<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    echo "No estás logeado.";
    exit;
}

require_once '../../config/database.php';

$database = new Database();
$conn = $database->connect();


$user_id = $_SESSION['user_id'];


$sql = "SELECT foto FROM portfolio WHERE user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id' , $user_id, PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

   
    if (!empty($row['foto'])) {
        
        header("Content-Type: image/png"); 
        echo $row['foto']; 
    }
}
$conn = null;
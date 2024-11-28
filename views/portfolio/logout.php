<?php
// Iniciar sesión
session_start();

// Eliminar todas las variables de sesión y destruir session
session_unset();
session_destroy();

// Redirigir al login después de cerrar sesión
header("Location: ../../index.php");
exit;
?>

<?php
//1.-Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario_prueba";
$conexion = mysqli_connect($servername, $username, $password, $dbname);

//COMPROBAR LA CONEXIÓN
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

//2.-Recibir los datos del formulario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$telefono = $_POST["telefono"];

//3.-Insertar los datos en la base de datos
$consulta = "INSERT INTO datos (nombre, apellido, email, password, telefono) VALUES ('$nombre', '$apellido', '$email', '$password', '$telefono')";
// Ejecutar la consulta y verificar si funciona
if (mysqli_query($conexion, $consulta)) {
    // Redireccionar al usuario a otra página
    header("Location: exito.html");
} else {
    echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
}
// Cerrar la conexión
mysqli_close($conexion);
?> 

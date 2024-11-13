<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Portafolio</title>
</head>
<body>
    <h2>Completa tu Portafolio</h2>
    <form action="./save_portfolio.php" method="POST">
        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Descripción:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="skills">Habilidades:</label>
            <input type="text" id="skills" name="skills">
        </div>
        <div>
            <label for="projects">Proyectos:</label>
            <textarea id="projects" name="projects"></textarea>
        </div>
        <button type="submit">Guardar Portafolio</button>
    </form>
</body>
</html>
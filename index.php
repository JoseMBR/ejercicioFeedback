<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: public/login.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>

    <div class="container">
        <h1>Bienvenido a la Aplicación</h1>
        
        <!-- Formulario de login -->
        <form action="public/login.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Iniciar sesión">
        </form>

        <p>¿No tienes cuenta? <a href="public/register.php">Regístrate aquí</a></p>
    </div>

</body>
</html>

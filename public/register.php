<?php
// Incluimos el archivo que maneja la lógica de PHP
require_once '../includes/register_handler.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <!-- Incluimos Bootstrap para el estilo -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlazamos el CSS personalizado -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2 class="my-4 text-center">Formulario de Registro</h2>
    
    <!-- Mostramos el mensaje si existe -->
    <?php if ($message): ?>
        <div class="my-4">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    
    <form method="POST" action="register.php" class="bg-light p-4 rounded shadow">
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" name="usuario" id="usuario" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="mail">Correo Electrónico</label>
            <input type="email" class="form-control" name="mail" id="mail" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
    </form>

    <!-- Enlace para volver al inicio de sesión -->
    <div class="my-3 text-center">
        <a href="login.php" class="btn btn-link">¿Ya tienes cuenta? Volver al inicio de sesión</a>
    </div>
</div>

<!-- Incluimos los scripts de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

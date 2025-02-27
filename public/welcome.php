<?php
require_once '../includes/session.php';

if (!isAuthenticated()) {
    header("Location: public/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Bienvenida</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="container">
        <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>
        <p>Has iniciado sesión correctamente.</p>
        <a href="../includes/logout.php">Cerrar sesión</a>
    </div>

</body>
</html>

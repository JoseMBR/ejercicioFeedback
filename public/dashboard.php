<?php
session_start();

// Verifica si el usuario está autenticado (si la sesión existe)
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

// Si el usuario está autenticado, muestra el contenido del dashboard
echo "Bienvenido, " . htmlspecialchars($_SESSION['usuario']) . "!";
?>

<!-- Contenido del dashboard -->
<h1>Dashboard</h1>
<p>Este es el panel de control de tu aplicación.</p>

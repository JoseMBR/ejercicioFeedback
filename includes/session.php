<?php
session_start();

// Función para verificar si el usuario está autenticado
function isAuthenticated() {
    return isset($_SESSION['usuario']);
}

// Función para cerrar la sesión
function logout() {
    session_destroy();
    header("Location: ../public/login.php");
    exit();
}
?>

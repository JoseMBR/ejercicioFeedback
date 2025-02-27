<?php
session_start();
require_once 'User.php'; 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos los datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Creamos una nueva instancia de la clase User
    $user = new User();

    // Usamos el método authenticate() para verificar si el usuario y la contraseña son correctos
    if ($user->authenticate($usuario, $password)) {
        // Si la autenticación es exitosa, redirigimos al usuario al panel de control o a donde sea
        $_SESSION['message'] = '<div class="alert alert-success">Bienvenido, ' . htmlspecialchars($usuario) . '!</div>';
        header("Location: dashboard.php");
        exit();
    } else {
        // Si la autenticación falla, mostramos un mensaje de error
        $_SESSION['message'] = '<div class="alert alert-danger">Usuario o contraseña incorrectos.</div>';
    }
}
?>

<?php
session_start();

// Verificamos si el formulario ha sido enviado
$message = '';  // Variable para almacenar los mensajes

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validamos si los campos 'usuario', 'password' y 'mail' están presentes en el arreglo $_POST
    if (isset($_POST['usuario']) && isset($_POST['password']) && isset($_POST['mail'])) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $mail = $_POST['mail'];

        // Creamos una instancia de la clase User
        $user = new User();

        // Comprobamos si el usuario o correo ya existen
        if ($user->checkUserExists($usuario, $mail)) {
            // Si el usuario o correo ya están registrados, mostramos un mensaje de error
            $_SESSION['message'] = '<div class="alert alert-custom alert-error" role="alert">
                                        El usuario o el correo ya están registrados. Por favor, intenta con otro.
                                    </div>';
        } else {
            // Si no existe, registramos al nuevo usuario
            if ($user->register($usuario, $password, $mail)) {
                $_SESSION['message'] = '<div class="alert alert-custom alert-success" role="alert">
                                            ¡Registro exitoso! Puedes iniciar sesión ahora.
                                        </div>';
                header("Location: login.php");  // Redirigir a la página de login
                exit();
            } else {
                // Si hay un error al registrar el usuario
                $_SESSION['message'] = '<div class="alert alert-custom alert-error" role="alert">
                                            Hubo un error al registrar al usuario. Inténtalo de nuevo.
                                        </div>';
            }
        }
    } else {
        // Si no se enviaron los campos esperados
        $_SESSION['message'] = '<div class="alert alert-custom alert-error" role="alert">
                                    Faltan datos en el formulario. Por favor, completa todos los campos.
                                </div>';
    }
}
?>

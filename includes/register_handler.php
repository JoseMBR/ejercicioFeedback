<?php
// Incluimos el archivo de clases
require_once '../includes/User.php';
session_start();

$message = '';  // Variable para almacenar el mensaje

// Comprobamos si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificamos que los campos necesarios están presentes
    if (isset($_POST['usuario'], $_POST['password'], $_POST['mail'])) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $mail = $_POST['mail'];

        $user = new User();

        // Verificamos si el usuario o el correo ya están registrados
        if ($user->checkUserExists($usuario, $mail)) {
            // Si ya existe el usuario o el correo, mostramos un mensaje de error
            $message = '<div class="alert alert-custom alert-error" role="alert">
                            El usuario o el correo ya están registrados. Por favor, intenta con otro.
                        </div>';
        } else {
            // Intentamos registrar al nuevo usuario
            if ($user->register($usuario, $password, $mail)) {
                // Si el registro es exitoso, redirigimos al login
                $_SESSION['message'] = '<div class="alert alert-custom alert-success" role="alert">
                                            ¡Registro exitoso! Puedes iniciar sesión ahora.
                                        </div>';
                header("Location: login.php");  // Redirigir a la página de login
                exit();
            } else {
                // Si hubo un error al registrar al usuario
                $message = '<div class="alert alert-custom alert-error" role="alert">
                                Hubo un error al registrar al usuario. Inténtalo de nuevo.
                            </div>';
            }
        }
    } else {
        // Si falta algún campo, mostramos un mensaje
        $message = '<div class="alert alert-custom alert-error" role="alert">
                        Por favor, completa todos los campos del formulario.
                    </div>';
    }
}
?>

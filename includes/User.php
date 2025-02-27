<?php
require_once 'db.php';

class User {
    // Método para registrar un usuario
    public function register($usuario, $password, $mail) {
        // Conectamos a la base de datos
        $conn = Database::getConnection();
        
        // Encriptamos la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Preparamos la consulta SQL para insertar el nuevo usuario
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, password, mail) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $usuario, $hashedPassword, $mail);
        
        // Ejecutamos la consulta y verificamos si fue exitosa
        return $stmt->execute();
    }

    // Método para verificar si un usuario o correo ya existe
    public function checkUserExists($usuario, $mail) {
        // Conectamos a la base de datos
        $conn = Database::getConnection();

        // Verificamos si el nombre de usuario ya existe
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE usuario = ? OR mail = ?");
        $stmt->bind_param("ss", $usuario, $mail);
        $stmt->execute();
        $result = $stmt->get_result();

        // Si encontramos algún resultado, significa que el usuario o el correo ya existen
        return $result->num_rows > 0;
    }

    // Método para autenticar al usuario
public function authenticate($usuario, $password) {
    // Conectamos a la base de datos
    $conn = Database::getConnection();
    
    // Preparamos la consulta SQL para obtener los datos del usuario
    $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verificamos si la contraseña es correcta
        if (password_verify($password, $user['password'])) {
            return true;
        }
    }
    return false;
}

}
?>

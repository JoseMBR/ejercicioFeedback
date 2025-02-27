<?php
class Database {
    private static $dbHost = 'localhost';
    private static $dbName = 'feedback_app';
    private static $dbUsername = 'root';
    private static $dbPassword = '';
    
    private static $connection = null;

    // Método para obtener la conexión a la base de datos
    public static function getConnection() {
        if (self::$connection == null) {
            self::$connection = new mysqli(self::$dbHost, self::$dbUsername, self::$dbPassword, self::$dbName);
            
            if (self::$connection->connect_error) {
                die("Error de conexión: " . self::$connection->connect_error);
            }
        }
        return self::$connection;
    }
}
?>

<?php
class Database {
    private static $host = 'localhost';
    private static $db_name = 'atendimento';
    private static $username = 'root';
    private static $password = '947312';
    
    // Variável que guardará a conexão única
    private static $conn = null;

    public static function getConnection() {
        
        // Se a conexão ainda não existe, cria uma nova
        if (self::$conn == null) {
            try {
                self::$conn = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$db_name . ";charset=utf8mb4", 
                    self::$username, 
                    self::$password
                );
                
                // Configurações de erro e modo de busca
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                
            } catch(PDOException $e) {
                die("Erro de conexão: " . $e->getMessage());
            }
        }

        // Retorna a conexão existente
        return self::$conn;
    }
}
?>
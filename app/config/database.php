<?php 
class Database {
    private $host = "localhost";
    private $db_name = "betpro";
    private $db_user= "root";
    private $db_password = "";
    private $conn;

    public function connect() {
        try {
            $conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->db_user, $this->db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            return null;
        }
    }
}
?>
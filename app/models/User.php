<?php 
include 'C:\xampp\htdocs\BetPro\app\config\database.php';

class User {
    private $db;
    private $table = "users";
    public function __construct($db) {
       $this->db = $db;
    }

    public function Register($username, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO " . $this->table . " (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        
        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function Login($email, $password) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}

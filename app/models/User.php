<?php 
class User{
    private $db;

    public function __construct($database){
        $this->db = $database;
}
public function Register($username, $email, $password){
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword = password_hash($password, PASSWORD_BCRYPT));
    return $stmt->execute();
}
public function Login($username, $password){
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])){
        return $user;
    } else {
        return false;
    }
    
}
public function Update($username, $email, $password){
    $sql = "UPDATE users SET email = :email, password = :password WHERE username = :username";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));
    return $stmt->execute();



}
public function Delete($username){
    $sql = "DELETE FROM users WHERE username = :username";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':username', $username);
    return $stmt->execute();
}
public function GetBettingHistory($username){
    $sql = "SELECT * FROM bets WHERE username = :username";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
?>
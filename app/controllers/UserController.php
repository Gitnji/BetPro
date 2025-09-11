<?php 
include_once '../config/database.php';
include_once '../models/User.php';


class UserController {
    private $db;
    private $userModel;

    public function __construct(){
        $database = new Database();
        $this->db = $database->getConnection();
        $this->userModel = new User($this->db);
    }
    public function handleRequest($action, $data){
        switch($action){
            case 'register':
                return $this->register($data['username'], $data['email'], $data['password']);
            case 'login':
                return $this->login($data['username'], $data['password']);
            case 'update':
                return $this->update($data['username'], $data['email'], $data['password']);
            case 'delete':
                return $this->delete($data['username']);
            case 'getBettingHistory':
                return $this->getBettingHistory($data['username']);
            default:
                return ['error' => 'Invalid action'];
        }
    }

    public function register($username, $email, $password){
        return $this->userModel->Register($username, $email, $password);
    }

    public function login($username, $password){
        return $this->userModel->Login($username, $password);
    }

    public function update($username, $email, $password){
        return $this->userModel->Update($username, $email, $password);
    }

    public function delete($username){
        return $this->userModel->Delete($username);
    }

    public function getBettingHistory($username){
        return $this->userModel->GetBettingHistory($username);
    }
}
?>
<?php 
require_once __DIR__ . '/../models/User.php';

class UserController{
    private $user;
    public function __construct($user){
        $this->user = $user;
    }

    public function handleRegistration($data){
        if (!isset($data['username']) || !isset($data['email']) || !isset($data['password'])) {
            http_response_code(400);
            echo json_encode(["message" => "Missing required fields"]);
            return;
        }

        if ($this->user->Register($data['username'], $data['email'], $data['password'])) {
            http_response_code(201);
            echo json_encode(["message" => "User registered successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Registration failed"]);
        }

        if ($this->user->Register($data["username"], $data["email"], $data["password"])) {
            http_response_code(201);
            echo json_encode(["message" => "User registered successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Registration failed"]);
        }
    }

    public function handleLogin($data){
        if (!isset($data['email']) || !isset($data['password'])) {
            http_response_code(400);
            echo json_encode(["message" => "Missing required fields"]);
            return;
        }

        $user = $this ->user->Login($data['email'], $data['password']);
        if ($user && password_verify($data['password'], $user['password'])) {
            http_response_code(200);
            $redirectUrl = ($user['role'] === 'admin') ? '../app/views/admin.php': '../app/views/dashboard.php';
            echo json_encode(["message" => "Login successful", "user" => $user, "redirect" => $redirectUrl]);
        } else {
            http_response_code(401);
            echo json_encode(["message" => "Invalid email or password"]);
    }
}
}
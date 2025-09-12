<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // For development
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once '../app/config/database.php';
require_once '../app/models/User.php';
require_once '../app/controllers/UserController.php';

$database = new Database();
$db = $database->connect();
$userModel = new User($db);
$authController = new UserController($user);

// Get the request data
$data = json_decode(file_get_contents("php://input"), true);

$action = $data['action'] ?? '';

switch ($action) {
    case 'register':
        $authController->handleRegistration($data);
        break;
    case 'login':
        $authController->handleLogin($data);
        break;
    default:
        http_response_code(400);
        echo json_encode(['error' => 'Invalid action.']);
        break;
}
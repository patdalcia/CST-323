<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '..\\Autoloader.php';

$connection = new Database();
$user = new Users($connection->getConnection());

$user->id = isset($_GET['id']) ? $_GET['id'] : die();
$user->username = $_GET['username'];
$user->password = $_GET['password'];
$user->access_level = $_GET['access_level'];

if($user->updateUser()){
    echo json_encode("User data updated");
}
else{
    echo json_encode("User could not be updated");
}
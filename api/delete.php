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

if($user->deleteEmployee()){
    echo json_encode("Employee deleted");
}
else{
    json_encode("Data could not be deleted");
}
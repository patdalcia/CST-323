<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '..\\Autoloader.php';

$connection = new Database();
$user = new Users($connection->getConnection());
$user->id = isset($_GET['id']) ? $_GET['id'] : die();
$user->getSingleUser();
if($user->username != null){
    $arr = array(
        "id" => $user->id,
        "username" => $user->username,
        "password" => $user->password,
        "email" => $user->email
    );

    http_response_code(200);
    echo json_encode($arr);
}
else{
    http_response_code(404);
    echo json_encode("Employee not found");
}

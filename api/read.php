<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '..\\Autoloader.php';

    $connection = new Database();   
    $service = new Users($connection->getConnection());
    $records = $service->getUsers();
    $count = $records->num_rows;
    if($count > 0){
        $arr = array();
        $arr['body'] = array();
        $arr['count'] = $count;
        while($row = $records->fetch_assoc()){
            array_push($arr['body'], $row);
        }
        echo json_encode($arr);
    }
    else{
        http_response_code(404);
        echo json_encode(
        array("message" => "No records found.")
        );
    }

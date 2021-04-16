<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include realpath(dirname( __FILE__ )).'/../../business/model/User.php';
include realpath(dirname( __FILE__ )).'/../../business/UserBusinessService.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$user = new User("0", $username, $password, "TEMP EMAIL");

$service = new UserBusinessService();
$result = $service->authenticate($user);
if($result !== -1){
    $_SESSION['currentUser'] = array(
        'username' => $user->getUsername(),
        'ID' => $result,
        'authenticated' => true
    );
    $_SESSION['currentPage'] = "Home";
    header("Location: ..\\views\\blog\\home.php");
}
else{
    unset($_SESSION['currentUser']);
    echo "Credentials have not passed";
}
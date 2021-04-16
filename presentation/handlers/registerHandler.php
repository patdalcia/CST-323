<?php
session_start();
//require_once dirname(__DIR__, 2) . '\\Autoloader.php';
include realpath(dirname( __FILE__ )).'/../../business/UserBusinessService.php';
include realpath(dirname( __FILE__ )).'/../../business/model/User.php';


$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if(empty($username) || empty($password) || empty($email)){
    echo "<h1>ERROR: Fields were left blank.</h1>";
    echo "<h3><a href='..\\views\\register\\register.php'>Click Here to try again!</a></h3>";
}
else{
    $user = new User('0', $username, $password, $email);
    $service = new UserBusinessService();
    $userID = $service->registerUser($user);

    if($userID == -1){
        header("Location: /utility/registerUserError.php");
    }
    else{
        $_SESSION['currentUser'] = array(
            'username' => $username,
            'ID' => $userID,
            'authenticated' => true
        );
        header('Location: /presentation/views/blog/home.php');
    } 
}

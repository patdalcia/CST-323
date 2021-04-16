<?php
//require_once dirname(dirname(__DIR__)) . "\\Autoloader.php";
session_start();
include realpath(dirname( __FILE__ )).'/../../business/model/Post.php';
include realpath(dirname( __FILE__ )).'/../../business/PostBusinessService.php';

$postTitle = "";
$postBody = "";

if(isset($_POST['postTitle']) && !empty($_POST['postTitle'])){
    $postTitle = $_POST['postTitle'];
}
if(isset($_POST['postBody']) && !empty($_POST['postBody'])){
    $postBody = $_POST['postBody'];
}
if(empty($postTitle) || empty($postBody)){
    header('Location: \Activity1\utility\createPostError.php');
}
else{
    $now = new DateTime("today");
    $date = $now->format('Y-m-d');

    $post = new Post($postTitle, $postBody, $date);

    $service = new PostBusinessService();
    $result = $service->createPost($post);

    if($result == 1){
        header('Location: \presentation\views\blog\home.php');
    }
    elseif($result == -1){
        header('Location: \utility\createPostError.php');
    }
}

?>


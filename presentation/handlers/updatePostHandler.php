<?php
//require_once dirname(dirname(__DIR__)) . "\\Autoloader.php";
//require_once '..\\..\\utility\\securePage.php';
session_start();
include realpath(dirname( __FILE__ )).'/../../business/PostBusinessService.php';

$postTitle = $_POST['postTitle'];
$postBody = $_POST['postBody'];
$postID = $_POST['postID'];

if(empty($postTitle) || empty($postBody) || empty($postID)){
    header("Location: /utility/updatePostError.php");
}
else{
    $service = new PostBusinessService();
    $result = $service->updatePost($postID, $postTitle, $postBody);
    if($result == -1){
        header("Location: /utility/updatePostError.php");
    }
    elseif($result == 1){
        header("Location: /presentation/views/user/dashboard.php");
    }
}
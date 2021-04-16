<?php
//require_once dirname(dirname(__DIR__)) . "\\Autoloader.php";
session_start();
include realpath(dirname( __FILE__ )).'/../../business/PostBusinessService.php';

$pattern = "";

if(isset($_POST['search']) && !empty($_POST['search'])){
    $pattern = $_POST['search'];
}
if(empty($pattern)){
    header("Location: /utility/searchError.php");
}
else{
    $pattern = $_POST['search'];
    $service = new PostBusinessService();
    $result = $service->search($pattern);
    if($result == -1){
        header("Location: /utility/searchError.php");
    }
    else{
        $posts = htmlspecialchars(serialize($result));

        echo 
        "
        <form action='/presentation/views/blog/viewSearchResults.php' method='POST' id='searchResultsForm'>
        <input type='hidden' name='postsObject' value='$posts'>
        </form>
        ";
        echo "
            <script type='text/javascript'>
            document.getElementById('searchResultsForm').submit();
            </script>";
    }
}
?>


<?php
if(isset($_SESSION['currentUser']) == false || $_SESSION['currentUser']['authenticated'] == false){
    $path = dirname(__DIR__) . '\\index.php';
    header("Location: \index.php");
}
?>
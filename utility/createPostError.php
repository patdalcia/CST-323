<?php
//require "..\\Autoloader.php";
//require ".\\securePage.php";
session_start();
$_SESSION['currentPage'] = "ERROR";
include realpath(dirname( __FILE__ )).'/../../presentation/views/navigation/navBar.php';
?>

<html>
    <head>
        <title>ERROR</title>
        <link rel="stylesheet" href="\utility\styles\createPostErrorStyles.css">
    </head>
    <main>
        <div id='errorWrapper'>
            <div id='errorMainDiv'>
                <h1>ERROR: Unable to create Post :(</h1>
                <h2>Fields may have been left blank. Please review your post and try again.</h2>
                <a href='\presentation\views\blog\createPost.php'><h3>Click here to try again.</h3></a>
            </div>
        </div>
    </main>
</html>

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
                <h1>ERROR: Your search returned no results :(</h1>
                <h2>Fields may have been left blank. Please review your search and try again.</h2>
                <a href='\presentation\views\blog\home.php'><h3>Click here to return to main page.</h3></a>
            </div>
        </div>
    </main>
</html>

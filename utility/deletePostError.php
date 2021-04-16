<?php
//require "..\\Autoloader.php";
//require '.\\securePage.php';
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
                <h1>ERROR: Unable to delete post :(</h1>
                <h2>Please try again.</h2>
                <a href='\presentation\views\user\dashboard.php'><h3>Click here to try again.</h3></a>
            </div>
        </div>
    </main>
</html>
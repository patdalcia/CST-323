<?php
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);

//require_once dirname(dirname(__DIR__, 2)) . '\\Autoloader.php';
//require_once dirname(dirname(__DIR__, 2)) . '\\utility\\securePage.php';
//include realpath(dirname( __FILE__ )).'/../../../utility/securePage.php';
session_start();
include realpath(dirname( __FILE__ )).'/../../../utility/securePage.php';

$_SESSION['currentPage'] = "Home";
//include '..\\navigation\\navBar.php';
include realpath(dirname( __FILE__ )).'/../../../presentation/views/navigation/navBar.php';


?>

<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="..\..\..\utility\styles\styles.css"> 
</head>
<main>
    <div id='mainWrapper'>
        <div>
            
        </div>
        <div>
            <?php 
                  include realpath(dirname( __FILE__ )).'/../../../presentation/views/blog/viewAllPosts.php';
            ?>
        </div>
        <div>
            
        </div>
    </div>
</main>
</html>
<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'Autoloader.php';

?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="utility/styles/_loginStyles.css">
    </head>
    <main>

    <div id='mainDiv'>
    <h1>Login</h1>
    <form action=".\presentation\handlers\loginHandler.php" method='POST' id='Form'>
    <label for='username'>Username:</label>
    <input type='text' name='username' id='username'>

    <label for='password'>Password:</label>
    <input type='text' name='password' id='password'>

    <input type='submit' name='submit' value='Login'>
    </form>
    <div>
        <a href='.\presentation\views\register\register.php'>Dont have an account? Click here to register one.</a>
    </div>
    </div>

    </main>
</html>

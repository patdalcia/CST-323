<?php


?>

<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="..\..\..\utility/styles/_loginStyles.css">
    </head>
    <main>
        <div id='mainDiv'>
        <h1>Register Your Account</h1>
        <form action='..\..\handlers\registerHandler.php' method='POST' id='Form'>
        <label for='username'>Username:</label>
        <input type='text' name='username' id='username'>

        <label for='password'>Password:</label>
        <input type='text' name='password' id='password'>

        <label for='email'>Email:</label>
        <input type='text' name='email' id='email'>

        <input type='submit' name='submit' value='Register'>
        </form>
        <a href='..\..\..\index.php'>Already have an account? Click here to Login!</a>
        </div>
    </main>
</html>
<?php
//require_once dirname(dirname(__DIR__, 2)) . '\\Autoloader.php';
//require_once dirname(dirname(__DIR__, 2)) . '\\utility\\securePage.php';
session_start();

$_SESSION['currentPage'] = "Create Public Post";


include realpath(dirname( __FILE__ )).'/../../../presentation/views/navigation/navBar.php';
?>

<html>
<head>
    <title>Create Post</title>
    <link rel="stylesheet" href="\utility\styles\createPostStyles.css">
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<main>
    <div id='createPostWrapper'>
    <form action='\presentation\handlers\createPostHandler.php' method='POST' id='createPostForm'>
        <label for='titleBox'><strong>Title</strong><br><small>Choose a descriptive title, catch readers attention.</small><br>
        <input type='text' name='postTitle' id='titleBox' placeholder='e.g. My First Post...'>
            <br><br>
        <label for='bodyBox'><strong>Body</strong><br><small>Write something descriptive, include everything needed for your post.</small><br>
        <textarea name='postBody' id='bodyBox' rows='9' cols='99' placeholder='e.g. My First Post...'></textarea>
        <input type='submit' name='createPost' value='Submit'>
    </form>
    </div>
</main>
</html>
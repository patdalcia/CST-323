<?php
//require_once dirname(dirname(__DIR__, 2)) . '\\Autoloader.php';
//require_once dirname(dirname(__DIR__, 2)) . '\\utility\\securePage.php';
session_start();

$_SESSION['currentPage'] = "Edit Post";

include realpath(dirname( __FILE__ )).'/../../../presentation/views/navigation/navBar.php';

$postID = $_POST['postID'];
$postTitle = $_POST['postTitle'];
$postBody = $_POST['postBody'];
?>
<html>
    <head>
        <title>View Post</title>
        <link rel="stylesheet" href="\utility\styles\createPostStyles.css"> 
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    </head>
    <main>
    <div id='createPostWrapper'>
    <form action='\presentation\handlers\updatePostHandler.php' method='POST' id='createPostForm'>
        <label for='titleBox'><strong>Update Title</strong><br><small>Choose a descriptive title, catch readers attention.</small><br>
        <input type='text' name='postTitle' id='titleBox' placeholder="<?php echo $postTitle; ?>">
            <br><br>
        <label for='bodyBox'><strong>Update Body</strong><br><small>Write something descriptive, include everything needed for your post.</small><br>
        <textarea name='postBody' id='bodyBox' rows='9' cols='99' placeholder="<?php echo $postBody; ?>"><?php echo $postBody; ?></textarea>
        <input type='hidden' value="<?php echo $postID; ?>" name='postID'>
        <input type='submit' name='createPost' value='Submit'>
    </form>
    </div>
    </main>
</html>

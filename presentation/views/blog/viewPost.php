<?php
//require_once dirname(dirname(__DIR__, 2)) . '\\Autoloader.php';
//require_once dirname(dirname(__DIR__, 2)) . '\\utility\\securePage.php';
session_start();

$_SESSION['currentPage'] = "View Single Post";

include realpath(dirname( __FILE__ )).'/../../../presentation/views/navigation/navBar.php';

$postID = $_POST['postID'];
$postTitle = $_POST['postTitle'];
$postBody = $_POST['postBody'];

?>

<html>
    <head>
        <title>View Post</title>
        <link rel="stylesheet" href="\utility\styles\viewSinglePostStyles.css"> 
    </head>
    <main>
        <div class='viewSinglePostMainDiv'>
        <table>
            <thead>
                <tr>
                    <td>
                        <h1><?php echo $postTitle; ?></h1>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php echo $postBody; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </main>
</html>
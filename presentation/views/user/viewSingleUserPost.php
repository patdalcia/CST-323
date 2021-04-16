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
        <link rel="stylesheet" href="..\..\..\utility\styles\viewSingleUserPostStyles.css"> 
    </head>
    <main>
        <div class='viewSingleUserPostMainDiv'>
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
                        <div>
                            <form action='/presentation/views/user/confirm.php' method='POST'>
                                <button type='submit' id='titleButton' value="<?php echo $postID; ?>" name='userChoice'>Delete Post?</button>
                                <input type='hidden' value="<?php echo $postTitle; ?>" name='postTitle'>
                            </form>
                            <form action='/presentation/views/user/update.php' method='POST'>
                                <button type='submit' id='titleButton' value="<?php echo $postID; ?>" name='postID'>Update Post?</button>
                                <input type='hidden' value="<?php echo $postTitle; ?>" name='postTitle'>
                                <input type='hidden' value="<?php echo $postBody; ?>" name='postBody'>
                            </form>
                        </div>            
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </main>
</html>
<?php
//require_once dirname(dirname(__DIR__, 2)) . '\\Autoloader.php';
//require_once dirname(dirname(__DIR__, 2)) . '\\utility\\securePage.php';
session_start();


$_SESSION['currentPage'] = "Confirm";
include realpath(dirname( __FILE__ )).'/../../../presentation/views/navigation/navBar.php';
include realpath(dirname( __FILE__ )).'/../../../business/PostBusinessService.php';

if(isset($_POST['yes'])){
    $postID = $_POST['yes'];
    $service = new PostBusinessService();
    $result = $service->deletePost($postID);
    if($result == 1){
        header("Location: /presentation/views/user/dashboard.php");
    }
    elseif($result == -1){
        header("Location: /utility/deletePostError.php");
    }
}
if(isset($_POST['no'])){
    header("Location: /presentation/views/user/dashboard.php");
}

$userID = $_SESSION['currentUser']['ID'];

$postID = $_POST['userChoice'];
//$postTitle = $_POST['postTitle'];

$service = new PostBusinessService();
?>

<html>
    <head>
        <title>Confirm</title>
        <link rel="stylesheet" href="\utility\styles\confirmDeleteStyles.css">
    </head>
    <main>
        <div id='confirmWrapper'>
            <div id='confirmMainDiv'>
                <h1>Confirm Delete?</h1>
                <h2>Are you sure you want to delete the selected post? This action is final.</h2>
                <div>
                <form action='' method='POST'>
                    <button type='submit' id='titleButton' value="<?php echo $postID; ?>" name='yes'>Yes?</button>
                </form>
                <form action='' method='POST'>
                    <button type='submit' id='titleButton' value='no' name='no'>No?</button>
                </form>
                </div>
            </div>
        </div>
    </main>
</html>

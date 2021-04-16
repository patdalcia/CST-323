<?php
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
session_start();

//require_once dirname(dirname(__DIR__, 2)) . '\\Autoloader.php';

$_SESSION['currentPage'] = "Users Dashboard";
include realpath(dirname( __FILE__ )).'/../../../presentation/views/navigation/navBar.php';
include realpath(dirname( __FILE__ )).'/../../../business/PostBusinessService.php';

$userID = $_SESSION['currentUser']['ID'];

$service = new PostBusinessService();
$posts = $service->getUserPosts($userID);

?>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="\utility\styles\viewPostsStyles.css"> 
    </head>
    <main>
        <?php
            if($posts == -1){
                echo "No Posts Found";
            }
            else{
                echo "
                <div class='viewPostsMainDiv'>
                <table>
                    <thead>
                    <tr>
                        <th><h1>User's Blog Posts</h1></th>
                    </tr>
                    </thead>
                    <tbody>
                ";
                foreach($posts as $row){
                    echo "<tr><form action='/presentation/views/user/viewSingleUserPost.php' id='postForm' method='POST'>";
                    echo "<td><button type='submit' id='titleButton' name='postTitle'>" . $row['title'] . "</button><br><br>";
                    echo $row['body'];
                    echo "<input type='hidden' name='postTitle' value='" . $row['title'] . "'>";
                    echo "<input type='hidden' name='postBody' value='" . $row['body'] . "'>";
                    echo "<input type='hidden' name='postID' value='" . $row['ID'] . "'></td>";
                    echo '</form></tr>';
                }
                echo "
                </table>
                </div>
                ";
            }
        ?>
    </main>
</html>
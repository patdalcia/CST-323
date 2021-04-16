<?php
//require_once dirname(dirname(__DIR__, 2)) . '\\Autoloader.php';
session_start();

$_SESSION['currentPage'] = "Search Results";

include realpath(dirname( __FILE__ )).'/../../../presentation/views/navigation/navBar.php';


$posts = unserialize($_POST['postsObject']);
?>
<html>
        <head>
            <title>Search Results</title>
            <link rel="stylesheet" href="\utility\styles\viewPostsStyles.css"> 
        </head>
    <main>
        <div class='viewPostsMainDiv'>
        <table>
            <thead>
            <tr>
                <th><h1>Search Results</h1></th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach($posts as $row){
                    echo "<tr><form action='/presentation/views/blog/viewPost.php' id='postForm' method='POST'>";
                    echo "<td><button type='submit' id='titleButton' name='postTitle'>" . $row['title'] . "</button><br><br>";
                    echo $row['body'];
                    echo "<input type='hidden' name='postTitle' value='" . $row['title'] . "'>";
                    echo "<input type='hidden' name='postBody' value='" . $row['body'] . "'>";
                    echo "<input type='hidden' name='postID' value='" . $row['ID'] . "'></td>";
                    echo '</form></tr>';
                }
                ?>

        </table>
        </div>
    </main>
</html>
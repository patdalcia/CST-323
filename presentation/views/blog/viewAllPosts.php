<?php
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
//require_once dirname(dirname(__DIR__, 2)) . '\\Autoloader.php';
include realpath(dirname( __FILE__ )).'/../../../business/PostBusinessService.php';

$service = new PostBusinessService();
$posts = $service->getAllPosts();
?>
<link rel="stylesheet" href="\utility\styles\viewPostsStyles.css"> 
<div class='viewPostsMainDiv'>
<table>
    <thead>
    <tr>
        <th><h1>All Blog Posts</h1></th>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach($posts as $row){
            echo "<tr><form action='.\\viewPost.php' id='postForm' method='POST'>";
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

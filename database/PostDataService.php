<?php
//require_once dirname(__DIR__) . '\\Autoloader.php';
//require_once dirname(__DIR__) . '\\utility\\securePage.php';
session_start();

class PostDataService {
    private $connection;

    public function __construct($connection){
        $this->connection = $connection;
    }

    public function createPost($post){
        $title = $post->getTitle();
        $body = $post->getBody();
        $date = $post->getDate();
        $userID = $_SESSION['currentUser']['ID'];

        $sql = "INSERT INTO `posts` (`title`, `userID`, `date`) VALUES ('$title','$userID','$date')";
        $result = $this->connection->query($sql);
        if($result == true){
            return $this->connection->insert_id;
        }
        else{
            return 0;
        }
    }

    public function createPostDetails($post, $postId){
        $title = $post->getTitle();
        $body = $post->getBody();
        $date = $post->getDate();
        $sql = "INSERT INTO `post_details`(`postID`, `body`) VALUES ('$postId','$body')";
        $result = $this->connection->query($sql);
        if($result == true){
            return $this->connection->insert_id;
        }
        else{
            return 0;
        }
    }

    public function getPosts(){
        $sql = "SELECT posts.*, post_details.body 
        FROM posts 
        INNER JOIN post_details 
        ON posts.ID = post_details.postID";

        $result = $this->connection->query($sql);
        if($result->num_rows > 0){
            $index = 0;
            $posts = array();
            while($row = $result->fetch_assoc()){
                $posts[$index] = array(
                    "ID" => $row['ID'],
                    "title" => $row['title'],
                    "userID" => $row['userID'],
                    "date" => $row['date'],
                    "body" => $row['body']
                );
                ++$index;
            }
                return $posts;
        }
        else{
            return -1;
        }
    }

    public function search($pattern){
        $sql = "SELECT posts.*, post_details.body 
        FROM `posts` 
        INNER JOIN post_details
        WHERE posts.title LIKE '%$pattern%' AND post_details.postID = posts.ID";
        $result = $this->connection->query($sql);
        if($result->num_rows > 0){
            $posts = array();
            $index = 0;
            while($row = $result->fetch_assoc()){
                $posts[$index] = array(
                    "ID" => $row['ID'],
                    "title" => $row['title'],
                    "body" => $row['body'],
                    "date" => $row['date']
                );
                ++$index;
            }
            return $posts;
        }
        else{
            return -1;
        }
    }

    public function getUserPosts($userID){
        $sql = "SELECT posts.*, post_details.body 
        FROM `posts` 
        INNER JOIN post_details
        WHERE posts.userID = $userID AND post_details.postID = posts.ID";

        $results = $this->connection->query($sql);
        if($results->num_rows > 0){
            $posts = array();
            $index = 0;
            while($row = $results->fetch_assoc()){
                $posts[$index] = array(
                    "ID" => $row['ID'],
                    "title" => $row['title'],
                    "body" => $row['body'],
                    "date" => $row['date']
                );
                ++$index;
            }
            return $posts;
        }
        else{
            return -1;
        }
    }

    public function deletePost($postID){
        $sql = "DELETE FROM `posts` WHERE ID = $postID";
        $result = $this->connection->query($sql);

        if($this->connection->affected_rows > 0){
            return 1;
        }
        else{
            return -1;
        }
    }

    public function updatePost($postID, $postTitle, $postBody){
        $sql = "UPDATE posts, post_details
                SET posts.title = '$postTitle',
                post_details.body = '$postBody'
                WHERE
                    posts.ID = '$postID'
                    AND post_details.postID = '$postID'";
        $this->connection->query($sql);
        if($this->connection->affected_rows > 0){
            return 1;
        }
        else{
            return -1;
        }
    }
}
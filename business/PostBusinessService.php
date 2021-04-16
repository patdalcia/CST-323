<?php
//require_once dirname(__DIR__) . '\\Autoloader.php';
//require_once dirname(__DIR__) . '\\utility\\securePage.php';

include realpath(dirname( __FILE__ )).'/../database/PostDataService.php';
include realpath(dirname( __FILE__ )).'/../database/Database.php';

class PostBusinessService{

    public function createPost($post){
        $connection = $this->getConnection();
        $connection->autocommit(FALSE);
        mysqli_begin_transaction($connection);

        $service = new PostDataService($connection);

        $flag1 = $service->createPost($post);

        $flag2 = $service->createPostDetails($post, $flag1);

        if($flag1 > 0 && $flag2 > 0){
            $connection->commit();
            return 1;
        }
        else{
            $connection->rollback();
            return -1;
        }
    }   

    public function getAllPosts(){
        $connection = $this->getConnection();
        $service = new PostDataService($connection);
        return $service->getPosts();
    }

    public function search($pattern){
        $connection = $this->getConnection();
        $service = new PostDataService($connection);
        return $service->search($pattern);
    }

    public function getUserPosts($userID){
        $connection = $this->getConnection();
        $service = new PostDataService($connection);
        return $service->getUserPosts($userID);
    }

    public function deletePost($postID){
        $connection = $this->getConnection();
        $connection->autocommit(FALSE);
        mysqli_begin_transaction($connection);

        $service = new PostDataService($connection);
        $flag = $service->deletePost($postID);
        if($flag == 1){
            $connection->commit();
            return 1;
        }
        elseif($flag == -1){
            return -1;
        }
    }

    public function updatePost($postID, $postTitle, $postBody){
        $connection = $this->getConnection();
        $service = new PostDataService($connection);
        return $service->updatePost($postID, $postTitle, $postBody);
    }

    public function getConnection(){
        $connection = new Database();
        return $connection->getConnection();
    }
}
<?php
include realpath(dirname( __FILE__ )).'/../database/UserDataService.php';
include realpath(dirname( __FILE__ )).'/../database/Database.php';

class UserBusinessService{
    
    /* Compares credentials to stored credentials in db to autneitcate user */
    public function authenticate($user){
        $connection = $this->getConnection();
        $service = new UserDataService($connection);
        return $service->authenticate($user);
    }

    /* Registers a new user to the database */
    public function registerUser($user){
        $connection = $this->getConnection();
        $service = new UserDataService($connection);
        return $service->registerUser($user);
    }

    /* Returns a connection to the database */
    public function getConnection(){
        $connection = new Database();
        return $connection->getConnection();
    }
}
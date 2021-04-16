<?php
session_start();

class UserDataService{

    private $connection;
    private $result;
    
    public function __construct($connection){
        $this->connection = $connection;
    }

    /* Compares credentials to stored credentials in db to autneitcate user */
    public function authenticate($user){
        $username = $user->getUsername();
        $password = $user->getPassword();

        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $record = $this->connection->query($sql);
        if($record->num_rows > 0){
            $row = $record->fetch_assoc();
            return $row['ID'];
        }
        else{
            return -1;
        }
        
    }

    /* Registers a new user into the database */
    public function registerUser($user){
        $username = $user->getUsername();
        $password = $user->getPassword();
        $email = $user->getEmail();

        $sql = "SELECT * FROM `user` WHERE username = '$username'";

        $result = $this->connection->query($sql);

        if($result->num_rows > 0){
            return -1;
        }
        else{
            $sql = "INSERT INTO `user`(`username`, `password`, `email`) VALUES ('$username','$password','$email')";
            $result = $this->connection->query($sql);

            if($result == true){
                return $this->connection->insert_id;
            }
            else{
                return -1;
            }
        }


        


    }
}
<?php

class User {

    private $username;
    private $password;
    private $id;
    private $email;

    public function __construct($id, $username, $password, $email){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    /* Getters */
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getId(){
        return $this->id;
    }
    public function getEmail(){
        return $this->email;
    }

    /* Setters */
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setEmail($email){
        $this->email = $email;
    }
}
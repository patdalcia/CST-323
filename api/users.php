<?php
class Users{
    //database connection 
    private $db;
    //database table
    private $dbTable = 'user';
    // Columns
public $id;
public $username;
public $password;
public $email;
public $result;

    //constructor
    public function __construct($db){
        $this->db = $db;
    }

    //GET All
    public function getUsers(){
        $sql = "SELECT * FROM " . $this->dbTable;

        $this->result = mysqli_query($this->db, $sql);

        return $this->result;
    }

    // CREATE
    public function createUser(){
        //Sanitizing input
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        //$this->access_level=htmlspecialchars(strip_tags($this->access_level));
        $sql = "INSERT INTO " . $this->dbTable . " (`username`, `password`) VALUES 
        ('" . $this->username . "', '" . $this->password . "')";
        $this->db->query($sql);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // GET SINGLE USER
    public function getSingleUser(){
        $sql = "SELECT * FROM " . $this->dbTable . " WHERE ID = " . $this->id;
        $record = $this->db->query($sql);
        $row = $record->fetch_assoc();
        $this->id = $row['ID'];
        $this->username = $row['username'];
        $this->password = $row['password'];
        $this->email = $row['email'];
    }

    // UPDATE USER
    public function updateUser(){
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->access_level=htmlspecialchars(strip_tags($this->access_level));

        $sql = "UPDATE " . $this->dbTable . " SET username = '" . $this->username . "',
        password = '" . $this->password . "',
        access_level = '" . $this->access_level . "' WHERE id = " . $this->id;

        $this->db->query($sql);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // DELETE USER
    public function deleteEmployee(){
        $sql = "DELETE FROM " . $this->dbTable . " WHERE id = " . $this->id;
        $this->db->query($sql);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

}
<?php

class Database {
    private $dbServer = "mydatabaseinstance.cwscm6qi3zuo.us-east-2.rds.amazonaws.com";
    private $dbUsername = "root";
    private $dbPassword = "Devildog1";
    private $dbName = "cst-323-activity4";

    function getConnection() {
        $connection = new mysqli($this->dbServer, $this->dbUsername, $this->dbPassword, $this->dbName);

        if($connection->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else {
            return $connection;
        }
    }
}
?>
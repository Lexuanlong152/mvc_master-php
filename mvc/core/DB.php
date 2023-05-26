<?php

class DB{

    public $serverName="localhost";
    public $userName="root";
    public $dbPassword="";
    public $dbname="assignmentuser";
    public $conn;

    function __construct(){
        $this->conn=mysqli_connect($this->serverName,$this->userName,$this->dbPassword,$this->dbname);
        if(!$this->conn){
            die("Could not connect: " . mysqli_connect_error());
        }
    }
}

?>
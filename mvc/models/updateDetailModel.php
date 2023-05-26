<?php
    class updateDetailModel extends DB{
        public $introcourse;
        public function getIntrocourse($idGet){
            $id= mysqli_real_escape_string($this->conn,$idGet);
            $sql= "SELECT * FROM introcourse WHERE courseId= '$id'";
            $result= mysqli_query(	$this->conn,$sql);
            $this->introcourse = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
        }

    }
?>
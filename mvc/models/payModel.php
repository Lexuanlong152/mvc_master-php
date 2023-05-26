<?php
    class payModel extends DB{
        public $course;
        public function getCourse($idGet){
            $id= mysqli_real_escape_string($this->conn,$idGet);
            // make sql
            $sql= "SELECT * FROM course WHERE id= '$id'";
            // get the query result
            $result= mysqli_query(	$this->conn,$sql);
            // fetch result in array format
            $this->course = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
        }
        public function getUserid($username){
            $search_string = "SELECT * FROM users WHERE username = '".$username."'";
            $query = mysqli_query($this->conn, $search_string);
            $user_row = mysqli_fetch_assoc($query);
            return $user_row['id']; 

        }
        public function setRepair($user_id, $course_id,$number_card){
            $sql = " INSERT INTO user_buy_course(userId,courseId,numbercard) VALUES ($user_id, $course_id, $number_card)";
            mysqli_query($this->conn, $sql);
            $sql = "SELECT * FROM course WHERE course_id = ".$course_id;
            $result = mysqli_query($this->conn, $sql);
            $tmp=$result['num_users'];
            $tmp++;
            $sql = "UPDATE course SET num_users = $tmp WHERE id = $course_id" ;
            mysqli_query($this->conn, $sql);
        }
    }
?>
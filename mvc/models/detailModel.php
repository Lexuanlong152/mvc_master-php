<?php
    class detailModel extends DB{
        public $introcourse;
        public $course;
        public $rating;
        public $bought;
        //data1 is introcourse
        public function getIntrocourse($idGet){
            $id= mysqli_real_escape_string($this->conn,$idGet);
            // make sql
            $sql= "SELECT * FROM introcourse WHERE courseId= '$id'";
            // get the query result
            $result= mysqli_query(	$this->conn,$sql);
            // fetch result in array format
            $this->introcourse = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
        }
        //data2 is course
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
        //
        public function getUserID($username){
            $sql = "SELECT * FROM users WHERE username = '".$username."'";
            $query = mysqli_query($this->conn, $sql);
            $user_row = mysqli_fetch_assoc($query);
            return $user_row['id'];
        }

        public function getBought($userid, $courseid){
            $sql = "SELECT * FROM user_buy_course WHERE userId = ".$userid." AND courseId = ".$courseid;
            $res=mysqli_query($this->conn,$sql);
           
            if (mysqli_fetch_assoc($res) ){
                $this->bought=true;
            }
        }

        public function getRating($userid, $courseid){
            $search_string = "SELECT * FROM rating WHERE user_id = ".$userid." AND course_id = ".$courseid;
            $this->rating = mysqli_query($this->conn, $search_string);

        }
        
        public function setRating($user_id, $course_id,$new_rating){
            $sql = "SELECT * FROM rating WHERE user_id = ".$user_id." AND course_id = ".$course_id;
            $query = mysqli_query($this->conn, $sql);
        
            if ($query != false && $query->num_rows > 0){
                $sql = "UPDATE rating SET rating = $new_rating WHERE user_id = $user_id AND course_id = $course_id" ;
            }
            else{
                $sql = " INSERT INTO rating(user_id,course_id,rating) VALUES ($user_id, $course_id, $new_rating)";
            }
            mysqli_query($this->conn, $sql);
            $sql = "SELECT * FROM rating WHERE course_id = ".$course_id;
            $result = mysqli_query($this->conn, $sql);
        
            if($result != false && $result->num_rows > 0){
                $i = 0;
                $sum_rating = 0;
                while($row = mysqli_fetch_assoc($result)){
                    $i++;
                    $sum_rating += $row['rating'];
                }
                $course_rating = round($sum_rating/$i, 1);
                $sql = "UPDATE course SET rating = $course_rating WHERE id = $course_id" ;
                mysqli_query($this->conn, $sql);
            }
        }
    }
?>
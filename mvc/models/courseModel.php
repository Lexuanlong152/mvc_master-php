<?php
    class courseModel extends DB{
        public $webCourse;
        public $dsaCourse;
        public $gameCourse;
        public $mlCourse;
        public $likedCourse;
        public $userid;

        public function getCourse(){
            $sql = "SELECT * FROM `course` WHERE category = 'Web'";
            $this->webCourse= mysqli_query($this->conn,$sql);

            $sql = "SELECT * FROM `course` WHERE category = 'Game'";
            $this->gameCourse= mysqli_query($this->conn,$sql);

            $sql = "SELECT * FROM `course` WHERE category = 'DSA'";
            $this->dsaCourse= mysqli_query($this->conn,$sql);

            $sql = "SELECT * FROM `course` WHERE category = 'MachineLearning'";
            $this->mlCourse= mysqli_query($this->conn,$sql);
        }

        public function getUserID($username){
            $sql = "SELECT * FROM users WHERE username = '".$username."'";
            $query = mysqli_query($this->conn, $sql);
            $user_row = mysqli_fetch_assoc($query);
            $this->userid = $user_row['id'];
        }

        public function getLikedCourse(){
            $sql = "SELECT * FROM course";
            $result = mysqli_query($this->conn, $sql);

            if($result != false && $result->num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $this->likedCourse[$row['id']] = 0;
                }
            }

            $sql = "SELECT * FROM user_like_course WHERE user_id = ".$this->userid;
            $result = mysqli_query($this->conn, $sql);

            if($result != false && $result->num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $this->likedCourse[$row['course_id']] = 1;
                }
            }
            else{
                $this->likedCourse = false;
            }
        }

        public function likeCourse($user_id,$course_id,$liked){
            if($liked == 1){
                $sql = "INSERT INTO user_like_course (user_id,course_id) VALUES ('$user_id','$course_id')";
            }
            else{
                $sql = "DELETE FROM user_like_course WHERE user_id = '$user_id' AND course_id = '$course_id'";;
            }
            mysqli_query($this->conn, $sql);
        }
    }
?>
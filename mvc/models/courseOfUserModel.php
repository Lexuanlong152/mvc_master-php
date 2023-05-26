<?php
    class courseOfUserModel extends DB{
        public $allCourse=array();
        public $boughtCourse=array();
        public $likedCourse=array();
        public $checked=array();
        public function getCourse(){
            $sql = "SELECT * FROM course";
            $result= mysqli_query($this->conn,$sql);
            $this->allCourse= mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        public function getBoughtCourse($user_id){
            $sql= "SELECT course.* FROM course INNER JOIN user_buy_course WHERE user_buy_course.userId=$user_id AND course.id=user_buy_course.courseId";
            $result=mysqli_query($this->conn,$sql);
            $this->boughtCourse= mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        public function getCourseNotBuy($user_id){
            $this->getCourse();
            $this->getBoughtCourse($user_id);
            foreach($this->allCourse as $course){
                $this->checked[$course['id']]=true;
            }
            foreach($this->boughtCourse as $course){
                $this->checked[$course['id']]=false;
            }
        }
        public function getLikedCourse($user_id){
            $sql = "SELECT course.* FROM course INNER JOIN user_like_course WHERE user_like_course.user_id=$user_id AND  user_like_course.course_id=course.id";
            $result= mysqli_query($this->conn,$sql);
            $this->likedCourse= mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
    }
?>
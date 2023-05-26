<?php
    class searchModel extends DB{
        public $result;
        public $likedCourse;
        public $userid;

        public function getUserID($username){
            $sql = "SELECT * FROM users WHERE username = '".$username."'";
            $query = mysqli_query($this->conn, $sql);
            $user_row = mysqli_fetch_assoc($query);
            $this->userid = $user_row['id'];
        }

        public function searchCourse($k,$category,$author,$rating,$min_price,$max_price){
            $search_string = "SELECT * FROM course WHERE ";
            
            if($category != ''){
                $search_string .= "category = '".$category."' AND ";
            }
            if($author != ''){
                $search_string .= "author = '".$author."' AND ";
            }
            if($rating != ''){
                $search_string .= "rating >= ".$rating." AND ";
            }
            if($min_price != ''){
                $search_string .= "price >= ".$min_price." AND ";
            }
            if($max_price != ''){
                $search_string .= "price <= ".$max_price." AND ";
            }

            $search_string .="(";
            
            $keywords = explode(' ', $k);
            foreach ($keywords as $word){
                $search_string .= "name LIKE '%".$word."%' OR content LIKE '%".$word."%' OR ";
            }

            $search_string = substr($search_string, 0, strlen($search_string)-4);
            $search_string .=")";

            $this->result = mysqli_query($this->conn, $search_string);
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
                $this->bikedCourse = false;
            }
        }
    }
?>
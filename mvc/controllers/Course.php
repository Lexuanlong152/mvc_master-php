<?php

// http://localhost/live/Home/Show/1/2

class Course extends Controller{
    public $courseModel;
    public function __construct(){
        $this->courseModel = $this->model("courseModel");
    }
    // Must have SayHi()
    function SayHi(){
        $username="";
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        }
        $this->courseModel->getCourse();
        if($username != ""){
            $this->courseModel->getUserID($username);
            $this->courseModel->getLikedCourse();
        }
        else{
            $this->courseModel->userid = -1;
            $this->courseModel->likedCourse = false;
        }
        $this->view("header_footer",[
            "Page"=>"course",
            "isHome"=>false,
            "username"=>$username,
            "userid"=>$this->courseModel->userid,
            "webCourse"=>$this->courseModel->webCourse,
            "gameCourse"=>$this->courseModel->gameCourse,
            "dsaCourse"=>$this->courseModel->dsaCourse,
            "mlCourse"=>$this->courseModel->mlCourse,
            "likedCourse"=>$this->courseModel->likedCourse,
        ]);
    }

    public function userLikeCourse(){
        $this->courseModel->likeCourse($_POST['user_id'],$_POST['course_id'],$_POST['liked']);
    }

}
?>
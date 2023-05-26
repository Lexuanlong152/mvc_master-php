<?php

// http://localhost/live/Home/Show/1/2

class Pay extends Controller{
    public $payModel;
    public function __construct(){
        $this->payModel = $this->model("payModel");
    }
    // Must have SayHi()
    function SayHi(){
        $username="";
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        }   
        if(isset($_GET['id'])){
            $courseid=$_GET['id'];
            $user_id=$this->payModel->getUserid($username);
            $this->payModel->getCourse($courseid);
        }
        $this->view("header_footer",[
            "Page"=>"pay",
            "username"=>$username,
            "userid"=>$user_id,
            "courseid"=>$courseid,
            "isHome"=>false,
            "course"=>$this->payModel->course,
        ]);
    }
    //
    public function repair(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_POST['user-id'];
            $course_id = $_POST['course-id'];
            $number_card=$_POST['number-card'];
            $this->payModel->setRepair($user_id, $course_id, $number_card);
            header('Location: '.BASEPATH.'Detail?id='.$course_id);
        
        }
    }
    
}
?>
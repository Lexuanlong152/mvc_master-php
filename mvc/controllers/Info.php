<?php

class Info extends Controller{
    public $loginModel;
    public $Model;
    public $courseModel;
    public $error=array('username'=>'', 'password'=>'');
    public function __construct(){
        $this->loginModel = $this->model("loginModel");
        $this->Model = $this->model("updateInfoModel");
        $this->courseModel = $this->model("courseOfUserModel");
    }
    function SayHi(){
        $username="";
        $img="";
        if(isset($_SESSION['username'])){
            $username =$_SESSION['username'];
        // RENDER AVATAR 
          $this->Model->getImage($_SESSION['userID']);
          if($row = mysqli_fetch_assoc($this->Model->result)){
            $img= BASEPATH."/public/assets/img/upload/".$row['image'];
          } 
          $this->courseModel->getCourse();
          $this->courseModel->getBoughtCourse($_SESSION['userID']);
          $this->courseModel->getCourseNotBuy($_SESSION['userID']);
          $this->courseModel->getLikedCourse($_SESSION['userID']);
        }   
        $this->view("header_footer",[
            "Page"=>"info",
            "isHome"=>false,
            "username"=>$username,
            "img"=>$img,
            "userid" => $_SESSION['userID'],
            "allCourse" => $this->courseModel->allCourse,
            "likedCourse" => $this->courseModel->likedCourse,
            "boughtCourse" => $this->courseModel->boughtCourse,
            "checked"=>$this->courseModel->checked
        ]);
    }
}
?>
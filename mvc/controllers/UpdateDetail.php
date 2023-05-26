<?php

class UpdateDetail extends Controller{
    public $detailModel;
    public function __construct(){
        $this->detailModel = $this->model("detailModel");
    }
    // Must have SayHi()
    function SayHi(){
        $username="";
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        }   
        if(isset($_GET['id'])){
            $courseid=$_GET['id'];
            $this->detailModel->getIntrocourse($courseid);
        }
        $this->view("header_footer",[
            "Page"=>"updatedetail",
            "username"=>$username,
            "courseid"=>$courseid,
            "isHome"=>false,
            "introcourse"=>$this->detailModel->introcourse
        ]);
    }
}
?>
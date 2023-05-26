<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller{
    public $loginModel;
    public $model;
    public function __construct(){
        $this->loginModel = $this->model("loginModel");
        $this->Model=$this->model("generalModel");
    }
    // Must have SayHi()
    function SayHi(){
        // Call Views
        $username="";
        if(isset($_SESSION['username'])){
            $username=$_SESSION['username'];
        }
        $this->Model->getContactDB();
        $this->view("header_footer", [
            "Page"=>"home",
            "isHome"=>true,
            "username"=>$username,
            "address"=>$this->Model->result['address'],
            "phonenumber"=>$this->Model->result['phonenumber'],
            "email"=>$this->Model->result['email']
        ]);
    }
}
?>
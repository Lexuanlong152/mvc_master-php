<?php

class Signup extends Controller{
    public $func;
    public $error=array('username'=>'','email'=>'','password'=>'');
    public $signUpModel;
    public $username;
    public $db;
    public function __construct(){
        $this->signUpModel= $this->model("signUpModel");
        $db=new DB;
        $func =new functionTemp;
        $this->username="";
    }
    function SayHi(){
        $username="";
        if(isset($_SESSION['username'])){
            $this->username = $_SESSION['username'];
        }   
        $this->view("header_footer",[
            "Page"=>"signup",
            "isHome"=>false,
            "username"=>$this->username,
            "passError"=>$this->error['password'],
            "userError"=>$this->error['username'],
            "emailError"=>$this->error['email']
        ]);
    }
    function confirm(){
        $name = "";
        $email ="";
        $password = "";

        if(isset($_POST['submit'])){
          $this->error['username']='';
          $this->error['password']='';
          $this->error['email']='';
          $name = $_POST['username'];
          
          $email = $_POST['email'];
          $password = $_POST['password'];
            if(empty($name)){
                $this->error['username']='Tên đăng nhập không được bỏ trống.';
            }
            else if($name=="admin0704"){
              $this->error['username']='Tên đăng nhập không hợp lệ';
            }
            else{
              $this->signUpModel->getUser($name);
              if(mysqli_fetch_assoc($this->signUpModel->result)){
                $this->error['username']='Tên đăng nhập này đã tồn tại.';
              }
            }
            if(empty($email)){
                $this->error['email']='Email không được phép bỏ trống.';
            }
            else{
              if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->error['email']='Email không hợp lệ.';
              }
              $this->signUpModel->getEmail($email);
              if(mysqli_fetch_assoc($this->signUpModel->result)){
                $this->error['email']='Email này đã được sử dụng.';
              }
            }
            if(strlen($password)<6){
              $this->error['password']='Mật khẩu phải chứa ít nhất 6 kí tự.';
            }
            if(array_filter($this->error)){

            }
            else{
              $this->signUpModel->createUser($name,$password,$email); 
              
              $_SESSION['username']=$name;
              $this->signUpModel->getUser($name);
              if($row=mysqli_fetch_assoc($this->signUpModel->result)){
                $_SESSION['userID'] = $row['id'];
              }
              $this->signUpModel->createInfo($_SESSION['userID']);
              $this->signUpModel->setDefaultImg($_SESSION['userID']);
              header('Location: '.BASEPATH.'Info');
            }
          }
          $this->view("header_footer",[
            "Page"=>"signup",
            "isHome"=>false,
            "username"=>$this->username,
            "passError"=>$this->error['password'],
            "userError"=>$this->error['username'],
            "emailError"=>$this->error['email']
          ]);
    }
  }
?>
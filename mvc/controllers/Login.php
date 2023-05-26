<?php

// http://localhost/live/Home/Show/1/2

class Login extends Controller{
    public $loginModel;
    public $error=array('username'=>'', 'password'=>'');
    public $loginURL;
    public function __construct(){
        $this->loginModel = $this->model("loginModel");
        require_once './mvc/core/config.php';
        $this->loginURL =$gClient->createAuthUrl();
    }
    // Must have SayHi()
    function SayHi(){
        $username="";
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        }  
        $this->view("header_footer",[
            "Page"=>"login",
            "isHome"=>false,
            "username"=>$username,
            "passError"=>$this->error['password'],
            "userError"=>$this->error['username'],
            'result'=>false,
            'loginURL' =>$this->loginURL
        ]);
    }
    function checkLogin(){
        $error=array('username'=>'', 'password'=>'');
        if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $password=$_POST['password'];
            if(empty($username)){
                $error['username']='Tên đăng nhập không được bỏ trống.';
            }
            else{
                $this->loginModel->checkUser($username);
                if($row=mysqli_fetch_assoc($this->loginModel->result)){
                    $hashedPwd=$row['password'];
                    $checkedPwd=password_verify($password,$hashedPwd);
                    if($checkedPwd===false){
                    $error['password']='Mật khẩu không đúng.';
                    }
                    else if($checkedPwd===true){
                    $_SESSION['username']= $row['username'];
                    $_SESSION['userID']=$row['id'];
                    }
                }
                else{
                    $error['username']='Tên đăng nhập chưa có trong hệ thống.';
                }
            }
            if(array_filter($error)){
                $result=false;
            }
            else{
                if($_SESSION['username']=="admin0704"){
                    $link=BASEPATH. "Dashboard/users";
                    header("Location: $link");
                }
                else{
                    $link=BASEPATH. "Info";
                    header("Location: $link");
                }
                $result=true;
            }
        }
        $username="";
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        }   
        
        $this->view("header_footer",[
            "Page"=>"login",
            "isHome"=>false,
            "passError"=>$error['password'],
            "userError"=>$error['username'],
            "result"=>$result,
            "username"=>$username,
            'loginURL' =>$this->loginURL
        ]);
    }
}
?>
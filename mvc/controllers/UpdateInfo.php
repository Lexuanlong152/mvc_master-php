<?php

// http://localhost/live/Home/Show/1/2

class UpdateInfo extends Controller{
    public $Model;
    public $data=['fullname'=>'','birthday'=>'','phonenumber'=>'','address'=>'','email'=>'','facebook'=>'','grade'=>'','img'=>''];
    public $username;
    public function __construct(){
        $this->Model = $this->model("updateInfoModel");
        $this->data['img']= BASEPATH ."public/assets/img/upload/placeholder.png";
    }
    // Must have SayHi()
    function SayHi(){
        // Model 
        

        if(isset($_SESSION['username'])){
          $this->username = $_SESSION['username'];
          $this->Model->getInfo($_SESSION['userID']);
          if($row = mysqli_fetch_assoc($this->Model->result)){
            $this->data['fullname']=$row['fullname'];
            $this->data['birthday']=$row['birthday'];
            $this->data['phonenumber']=$row['phonenumber'];
            $this->data['address']=$row['address'];
            $this->data['email']=$row['email'];
            $this->data['facebook']=$row['facebook'];
            $this->data['grade']=$row['grade'];
          }
          // RENDER AVATAR 
          $this->Model->getImage($_SESSION['userID']);
          if($row = mysqli_fetch_assoc($this->Model->result)){
            $this->data['img']= BASEPATH."public/assets/img/upload/".$row['image'];
          }
        }
        // Update info
        if(isset($_POST['flag'])){
            $this->Model->update($_POST['fullnameP'],$_POST['birthdayP'],$_POST['phonenumberP'],$_POST['addressP'],$_POST['emailP'],$_POST['facebookP'],$_POST['gradeP'],$_SESSION['userID']);
          }
        //Update avatar
        if(isset($_POST['image'])){
            $profileImageName =time() ."_".  $_FILES['profileImage']['name'];
              $target="./public/assets/img/upload/" . $profileImageName;
              if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
                $this->Model->updateImg($profileImageName,$_SESSION['userID']);
                $this->data['img']= BASEPATH."public/assets/img/upload/".$profileImageName;
                $msg="success";
              }
              else{
                $msg="failed";
              }
          }
        // View
        $this->view("header_footer", [
            "Page"=>"updateinfo",
            "isHome"=>false,
            "username"=>$this->username,
            "fullname"=>$this->data['fullname'],
            "birthday"=>$this->data['birthday'],
            "phonenumber"=>$this->data['phonenumber'],
            "address"=>$this->data['address'],
            "email"=>$this->data['email'],
            "facebook"=>$this->data['facebook'],
            "grade"=>$this->data['grade'],
            "img"=>$this->data['img']
        ]);
    }
    function updatePass(){
      // Model
      $status="";
      $error0="";
      $error1="";
      $error2="";
      if(isset($_SESSION['username'])){
        $this->username = $_SESSION['username'];
      }   
      if(isset($_POST['flag'])){
          $pass1=$_POST['pass1'];
          $pass2=$_POST['pass2'];
          $pass0=$_POST['pass0'];
          $this->Model->checkUser($this->username);
          if($row=mysqli_fetch_assoc($this->Model->result)){
            $hashedPwd=$row['password'];
            $checkedPwd=password_verify($pass0,$hashedPwd);
            if($checkedPwd===false){
              $status="failed";
              $error0="Sai mật khẩu. Vui lòng nhập lại";
              exit(json_encode(array("status"=>$status,"error0"=>$error0,"error1"=>$error1,"error2"=>$error2)));
            }
            else if($checkedPwd===true){
              if($pass1!=$pass2){
                  $status="failed";
                  $error2="Mật khẩu không trùng khớp.";
                  exit(json_encode(array("status"=>$status,"error0"=>$error0,"error1"=>$error1,"error2"=>$error2)));
              }
              else{
                  $this->Model->setPassword($pass1,$_SESSION['userID']);
                  $status="success";
                  exit(json_encode(array("status"=>$status,"error0"=>$error0,"error1"=>$error1,"error2"=>$error2)));
              } 
            }
          }
      }
      // View
      $this->view("header_footer", [
        "Page"=>"updatepass",
        "isHome"=>false,
        "username"=>$this->username,
      ]);
    }
    function updateUsername(){
        //Model
        $status="";
        $error="";
        if(isset($_SESSION["username"])){
            $this->username=$_SESSION["username"];
        }
        if(isset($_POST['flag'])){
            $name = $_POST['userName'];
            $this->Model->checkUser($name);
            if($row = mysqli_fetch_assoc($this->Model->result)){
                $status= "failed";
                if($_SESSION["username"]==$name){
                  $error="Tên đăng nhập này giống với tên đăng nhập cũ.";
                }
                else{
                  $error="Tên đăng nhập này đã có trong hệ thống, vui lòng chọn tên khác.";
                }
                exit(json_encode(array("status"=>$status,"response"=>$error)));
            }
            else{
                $this->Model->updateUsername($name,$_SESSION['userID']);
                $_SESSION['username']=$_POST['userName'];
                $status= "success";
                $error="";
                exit(json_encode(array("status"=>$status,"response"=>$error)));
            }
        }
        // View
        $this->view("header_footer", [
          "Page"=>"updateusername",
          "isHome"=>false,
          "username"=>$this->username,
        ]);
    }
}
?>
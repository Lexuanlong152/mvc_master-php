<?php
    class signUpModel extends DB{
        public $result;
        public function getUser($name){
            $sql= "SELECT * FROM users WHERE username = ?;";
            $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                // header("location: ../signUp.php?error=stmtfailed1");
                // exit();
                return false;
            }
            else{
                mysqli_stmt_bind_param($stmt,"s",$name);
                mysqli_stmt_execute($stmt);
                $this->result= mysqli_stmt_get_result($stmt);
                return true;
            }
        }
        public function getEmail($email){
            $sql= "SELECT * FROM users WHERE email = ?;";
            $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
              $error['email']='Kí tự không hợp lệ.';
            }
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            $this->result= mysqli_stmt_get_result($stmt);
        }
        public function createUser($name,$password,$email){
            $sql= "INSERT INTO users(username,password,email) VALUES (?,?,?);";
            $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){

            }
            else{
                $hashPassword = password_hash($password,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt,"sss",$name,$hashPassword,$email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }
        public function setDefaultImg($userID){
            $img="placeholder.png";
            $sql= "INSERT INTO avatar(userID,image) VALUES (?,?);";
            $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){

            }
            else{
                mysqli_stmt_bind_param($stmt,"ss",$userID,$img);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }
        public function createInfo($userID){
            $sql= "INSERT INTO infouser(userID,fullname,birthday,phonenumber,address,facebook,grade) VALUES (?,?,?,?,?,?,?);";
            $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                
            }
            else{
                $str="Chưa có";
                mysqli_stmt_bind_param($stmt,"sssssss",$userID,$str,$str,$str,$str,$str,$str);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }
    }
?>
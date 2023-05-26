<?php
    class updateInfoModel extends DB{
        public $result;

        public function getInfo($userID){
            $sql="SELECT infouser.fullname,infouser.birthday,infouser.phonenumber,infouser.address,users.email,infouser.facebook,infouser.grade FROM infouser INNER JOIN users ON infouser.userID = users.id WHERE infouser.userID=?";
            $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                // header("location: ../signUp.php?error=stmtfailed1");
                // exit();
                return false;
            }
            else{
                mysqli_stmt_bind_param($stmt,"s",$userID);
                mysqli_stmt_execute($stmt);
                $this->result= mysqli_stmt_get_result($stmt);
                return true;
            }
        }
        public function getImage($userID){
            $sql="SELECT image FROM avatar WHERE userID = ?";
            $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
              return false;
            }
            else{
                mysqli_stmt_bind_param($stmt,"s",$userID);
                mysqli_stmt_execute($stmt);
                $this->result= mysqli_stmt_get_result($stmt);
            }
        }
        public function update($fullname,$birthday,$phonenumber,$address,$email,$facebook,$grade,$userID){
            $sql1="SELECT id FROM infouser WHERE userID=$userID";
            $result = mysqli_query($this->conn,$sql1);
            $id = mysqli_fetch_assoc($result);
            if($id==null){
                $stmt= mysqli_stmt_init($this->conn);
                $sql1= "INSERT INTO infouser(userID,fullname,birthday,phonenumber,address,facebook,grade) VALUES(?,?,?,?,?,?,?)";
                if(mysqli_stmt_prepare($stmt,$sql1)){
                    mysqli_stmt_bind_param($stmt,"sssssss",$userID,$fullname,$birthday,$phonenumber,$address,$facebook,$grade);
                    mysqli_stmt_execute($stmt);
                }
                $sql2= "UPDATE users SET email=?  WHERE id=$userID";
                if(mysqli_stmt_prepare($stmt,$sql2)){
                    mysqli_stmt_bind_param($stmt,"s",$email);
                    mysqli_stmt_execute($stmt);
                }
            }
            else{
                $stmt= mysqli_stmt_init($this->conn);
                $sql= "UPDATE infouser INNER JOIN users SET infouser.fullname=?,infouser.birthday=?,infouser.phonenumber=?,infouser.address=?,users.email=?,infouser.facebook=?,infouser.grade=?  WHERE infouser.userID=? AND infouser.userID = users.id";
                if(mysqli_stmt_prepare($stmt,$sql)){
                  mysqli_stmt_bind_param( $stmt,"ssssssss",$fullname,$birthday,$phonenumber,$address,$email,$facebook,$grade,$userID);
                  mysqli_stmt_execute($stmt);
                }
            }
        }
        public function updateImg($profileName,$userID){
            $stmt=mysqli_stmt_init($this->conn);
            $sql="UPDATE avatar SET image=? WHERE userID=?;";
            if(mysqli_stmt_prepare($stmt,$sql)){
              mysqli_stmt_bind_param( $stmt,"ss",$profileName,$userID);
              mysqli_stmt_execute($stmt);
            }
        }
        public function checkUser($username){
            $sql= "SELECT * FROM users WHERE username = ?;";
            $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                return false;
            }
            else{
                mysqli_stmt_bind_param($stmt,"s",$username);
                mysqli_stmt_execute($stmt);
                $this->result=mysqli_stmt_get_result($stmt);
                return true;            
            }
        }
        public function setPassword($password,$userID){
            $stmt=mysqli_stmt_init($this->conn);
            $sql="UPDATE users SET password=? WHERE id=?;";
            if(!mysqli_stmt_prepare($stmt,$sql)){
                
            }
            else{
                $hashPassword = password_hash($password,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param( $stmt,"ss",$hashPassword,$userID);
                mysqli_stmt_execute($stmt);
            }
        }
        public function updateUsername($username,$userID){
            $stmt= mysqli_stmt_init($this->conn);
            $sql= "UPDATE users SET username=? WHERE id=?";
            if(mysqli_stmt_prepare($stmt,$sql)){
              mysqli_stmt_bind_param( $stmt,"ss",$username,$userID);
              mysqli_stmt_execute($stmt);
            }
        }
    }
?>
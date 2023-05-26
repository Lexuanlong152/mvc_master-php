<?php
    class functionTemp{
        public function createUser($conn,$name,$password,$email){
            $sql= "INSERT INTO users(username,password,email) VALUES (?,?,?);";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){

            }
            else{
                $hashPassword = password_hash($password,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt,"sss",$name,$hashPassword,$email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }
    }
?>
<?php

  //Login with google
        // require_once 'config.php';
        // $loginURL =$gClient->createAuthUrl();
        // Processing

        // require_once "./confirm/db.php";
        // require_once "./confirm/function.php";
        class loginModel extends DB{
            public $result;
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
        }
?>
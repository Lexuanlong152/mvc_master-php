<?php
    define('BASEPATH','http://localhost/CodeCamp/');
    session_start();
    require_once 'config.php';
    $serverName="localhost";
    $userName="root";
    $dbPassword="";
    $dbname="assignmentuser";
    $conn = mysqli_connect($serverName,$userName,$dbPassword,$dbname);
    if(!$conn){
        die("Could not connect: " . mysqli_connect_error());
    }
    if(isset($_GET['code'])){
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;
    }
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    echo "<pre>";
    $sql ="SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$userData['email']);
        mysqli_stmt_execute($stmt);
        $resultData= mysqli_stmt_get_result($stmt);
        if($row=mysqli_fetch_assoc($resultData)){
            $_SESSION['username']= $row['username'];
            $_SESSION['userID']= $row['id'];
        }
        else{
            $sql= "INSERT INTO users(username,password,email) VALUES (?,?,?);";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){

            }
            else{
                mysqli_stmt_bind_param($stmt,"sss",$userData['name'],$userData['id'],$userData['email']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            $_SESSION['username']= $userData['name'];
            // Get userID
            $sql ="SELECT * FROM users WHERE email = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                
            }
            else{
                mysqli_stmt_bind_param($stmt,"s",$userData['email']);
                mysqli_stmt_execute($stmt);
                $resultData= mysqli_stmt_get_result($stmt);
                if($row=mysqli_fetch_assoc($resultData)){
                    $_SESSION['userID']= $row['id'];
                }
            }
        }
    }
    header('Location: '.BASEPATH.'Info');
?>
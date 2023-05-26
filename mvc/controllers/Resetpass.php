<?php

// http://localhost/live/Home/Show/1/2

class Resetpass extends Controller{
    public $Model;
    public function __construct(){
        $this->Model = $this->model("generalModel");

    }
    // Must have SayHi()
    function SayHi(){
        $email ="";
        if(isset($_POST['email'])){
            $email=$_POST['email'];
            $this->Model->getEmail($email);
            if($this->Model->result->num_rows>0){
                // Create a token and token expire 5 minutes
                
                $token= "qwertyuiopasdfghjklzxcvbnm123456789";
                $token= str_shuffle($token);
                $token = substr($token,0,10);
                // Set token and token expire in table
                
                $this->Model->updateToken($token,$email);
                // Send email            
                require_once "PHPMailer/PHPMailer.php";
                require_once "PHPMailer/SMTP.php";
                require_once "PHPMailer/Exception.php";   
                $mail  = new PHPMailer\PHPMailer\PHPMailer();
                
                // SMTP settings
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth =true;
                
                $mail->Username ="chinhchuoi7420@gmail.com";
                $mail->Password ="chinhchuoi36";
                $mail->Port =465;
                $mail->SMTPSecure="ssl";
                
                // Mail settings
                $mail->isHTML(true);
                $mail->setFrom($email,"MAISYCHINH");
                $mail->addAddress("$email");
                $mail->Subject = "Reset Password";
                $link=BASEPATH ."Resetpass/setPass"."/".$token."/".$email;
                $mail->Body = "
                    <p>Xin chào</p> <br><br>
                    <span>Chúng tôi nhận được yêu cầu lấy lại mật khẩu từ bạn. Để lấy lại mật khẩu, vui lòng bấm vào link sau: </span>
                    <a href='$link'>$link</a> 
                    <br><br>
                    <p>Code Camp</p>
                ";
                
                if($mail->send()){
                $status = "success";
                $response = "Email is sent!";
                
                }
                else{
                $status = "failed";
                $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
                }
            }
            else{
                $status="failed";
                $response="Email này chưa có trong hệ thống.";
            }
            exit(json_encode(array("status"=>$status,"response"=>$response)));
        }
        $this->view("header_footer",[
            "Page"=>"resetpass",
            "isHome"=>false,
            "username"=>""
        ]);
    }
    // SET PASS  
    function setPass($token,$email){
        $check = false;
        $error=array('pass1'=>'','pass2'=>'','expired'=>'');
        if(isset($_POST['submit'])){
            $token = $_POST['token'];
            $email = $_POST['email'];
            $pass1 = $_POST['password1'];
            $pass2 = $_POST['password2'];
            if(strlen($pass1) <6 || strlen($pass2) <6){
                if(strlen($pass1)<6){
                    $error['pass1']='Mật khẩu phải chứa ít nhất 6 kí tự.';
                }
                if(strlen($pass2)<6){
                    $error['pass2']='Mật khẩu phải chứa ít nhất 6 kí tự.';
                }
            }
            else if($pass1!=$pass2){
                $error['pass2']= 'Mật khẩu không trùng khớp.';
            }
            if(array_filter($error)){
    
            }
            else{
                $this->Model->StillLive($email,$token);
                if($this->Model->result->num_rows>0){
                    $hashPassword = password_hash($pass2,PASSWORD_DEFAULT);
                    $this->Model->updatepass($hashPassword,$email);
                    $check=true;
                }
                else{
                    $error['expired']="Đã quá thời gian đổi mật khẩu. Bạn vui lòng thử lại.";
                }
            }
        }
        $this->view("header_footer",[
            "Page"=>"setpass",
            "isHome"=>false,
            "username"=>"",
            "check"=>$check,
            "token"=>$token,
            "email"=>$email,
            "error1"=>$error['pass1'],
            "error2"=>$error['pass2'],
            "expired"=>$error['expired']
        ]);
    }
}
?>
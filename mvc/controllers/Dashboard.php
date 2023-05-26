<?php
class Dashboard extends Controller{
    public $Model;
    public $username;
    public function __construct(){
        $this->Model = $this->Model("generalModel");
        $this->username = "";
    }
    function SayHi(){
        $users=array();
        $this->view("dashboard",[
            "Page"=>"userTable",
            "users"=>$users,
            "isCourse"=>false,
            "isUser"=>false,
            "isInfo"=>false
        ]);
    }
    function users(){
        $this->username="";
        $users = array();
        if(isset($_POST['image'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $birthday=$_POST['birthday'];
            $phonenumber=$_POST['phonenumber'];
            $password=$_POST['password'];
            $img="placeholder.png";
            $profileImageName =time() ."_".  $_FILES['profileImage']['name'];
              $target="./public/assets/img/upload/" . $profileImageName;
              if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
                $img= $profileImageName;
                // $this->data['img']= BASEPATH."/public/assets/img/upload/".$profileImageName;
              }
              $this->Model->add($username,$password,$email,$birthday,$phonenumber,$img);
        }
        if(isset($_SESSION['username']) && $_SESSION['username']=="admin0704"){
          $this->username = $_SESSION['username'];
          $this->Model->getInfo();
          $users = $this->Model->info;
          $this->view("dashboard",[
            "Page"=>"usertable",
            "users"=>$users,
            "isCourse"=>false,
            "isUser"=>true,
            "isInfo"=>false
        ]);
        }
        else{
            $this->view("adminError",[]);
        }
    }
    function deleteUser(){
        if(isset($_POST['flagUser'])){
            $this->Model->delete($_POST['userDeleteId']);
        }
    }
    function updateUser(){
        if(isset($_GET['id'])){
            $this->Model->getOneUser($_GET['id']);
        }
        if(isset($_POST['image'])){
            $fullname=$_POST['fullname'];
            $email=$_POST['email'];
            $username=$_POST['username'];
            $phonenumber=$_POST['phonenumber'];
            $birthday=$_POST['birthday'];
            $address=$_POST['address'];
            $facebook=$_POST['facebook'];
            $grade=$_POST['grade'];
            $id=$_POST['id'];
            $img=$_POST['img'];
            $profileImageName =time() ."_".  $_FILES['profileImage']['name'];
              $target="./public/assets/img/upload/" . $profileImageName;
              if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
                $img= $profileImageName;
                // $this->data['img']= BASEPATH."/public/assets/img/upload/".$profileImageName;
              }
              $this->Model->realUpdateUser($id,$fullname,$email,$username,$phonenumber,$birthday,$address,$facebook,$grade,$img);
              $link=BASEPATH."Dashboard/users";
              header("Location: $link");
        }
        if($_SESSION['username']=="admin0704"){
            $this->view("dashboard",[
                "Page"=>"userdashboard",
                "isCourse"=>false,
                "isUser"=>true,
                "isInfo"=>false,
                "user"=>$this->Model->OneUser,
                "id"=>$_GET['id']
            ]);
        }
        else{
            $this->view("adminError",[]);
        }
    }
    function addUser(){
        if(isset($_POST['flagAddUser'])){
            $this->Model->add($_POST['id'],$_POST['username'],$_POST['birthday'],$_POST['phonenumber'],$_POST['address']);
        }
    }
    function course(){
        // CODE PHI
        // Phần back-end lấy dữ liệu: tạo hàm trong generalModel.php trong gọi ra. Ví dụ : $this->Modal->getUser()

        // Phần front-end
        if(isset($_POST['image'])){
            $name=$_POST['name'];
            $author=$_POST['author'];
            $price=$_POST['price'];
            $category=$_POST['category'];
            $content=$_POST['content'];
            $img="./public/assets/img/course/placeholder.png";
            $profileImageName =time() ."_".  $_FILES['profileImage']['name'];
              $target="./public/assets/img/course/" . $profileImageName;
              if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
                $img="public/assets/img/course/" . $profileImageName;
                
                // $this->data['img']= BASEPATH."/public/assets/img/upload/".$profileImageName;
              }
              $this->Model->updateCourse($name,$img,$author,$price,$category,$content);
        }
        $this->Model->getCourse();
        if($_SESSION['username']=="admin0704"){
            $this->view("dashboard",[
                // Hiện thực front-end trong file coursetable.php đã tạo sẵn
                "Page"=>"coursetable",
                "isCourse"=>true,
                "isUser"=>false,
                "isInfo"=>false,
                "course"=>$this->Model->course
            ]);
        }
        else{
            $this->view("adminError",[]);
        }
    }
    function info(){
        // CODE PHAT
        // Phần back-end lấy dữ liệu: tạo hàm trong generalModel.php trong gọi ra. Ví dụ : $this->Modal->getUser()
        $this->Model->getContactDB();
        $info = $this->Model->result;
        if($_SESSION['username']=="admin0704"){
            $this->view("dashboard",[
                // Hiên thực phần front-end trong file infotable.php đã tạo sẵn
                "Page"=>"infotable",
                "isCourse"=>false,
                "isUser"=>false,
                "isInfo"=>true,
                'email'=>$info['email'],
                'address'=>$info['address'],
                'phonenumber'=>$info['phonenumber']
            ]);
        }
        else{
            $this->view("adminError",[]);
        }
    }

    function updateContactInfo(){
        if(isset($_POST['flag'])){
            $this->Model->updateContactDB($_POST['address'],$_POST['phone'],$_POST['email']);
        }
    }
    function deleteCourse(){
        if(isset($_POST['flagCourse'])){
            $this->Model->deletecourse($_POST['courseDeleteId']);
        }    
    }
    function updateCourse(){
        if(isset($_GET['id'])){
            $this->Model->getOneCourse($_GET['id']);
        }
        else{
            echo "error";
        }
        if(isset($_POST['image'])){
            $name=$_POST['name'];
            $author=$_POST['author'];
            $price=$_POST['price'];
            $category=$_POST['category'];
            $content=$_POST['content'];
            $id=$_POST['id'];
            $img=$_POST['img'];
            $profileImageName =time() ."_".  $_FILES['profileImage']['name'];
              $target="./public/assets/img/course/" . $profileImageName;
              if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
                $img="public/assets/img/course/" . $profileImageName;
                // $this->data['img']= BASEPATH."/public/assets/img/upload/".$profileImageName;
                
              }
              $this->Model->realUpdateCourse($id,$name,$img,$author,$price,$category,$content);
              $link=BASEPATH."Dashboard/course";
              header("Location: $link");
        }
        if($_SESSION['username']=="admin0704"){
            $this->view("dashboard",[
                // Hiện thực front-end trong file coursetable.php đã tạo sẵn
                "Page"=>"updatecourse",
                "isCourse"=>true,
                "isUser"=>false,
                "isInfo"=>false,
                'course'=>$this->Model->Onecourse,
                'id'=>$_GET['id']
            ]);
        }
        else{
            $this->view("adminError",[]);
        }
    }
}
?>
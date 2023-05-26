<?php

// http://localhost/live/Home/Show/1/2

class Detail extends Controller{
    public $detailModel;
    public $Model;
    public function __construct(){
        $this->detailModel = $this->model("detailModel");
        $this->Model = $this->model("generalModel");
    }
    // Must have SayHi()
    function SayHi(){
        $username="";
        $userid=-1;
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $userid=$this->detailModel->getUserID($username);                       
        }   
        else {
            $userid=-1;
        }

        if(isset($_GET['id'])){
            $courseid=$_GET['id'];
            $this->detailModel->getIntrocourse($courseid);
            $this->detailModel->getCourse($courseid);
            $this->detailModel->getRating($userid,$courseid);
            $this->detailModel->getBought($userid,$courseid);

        }
        if(isset($_POST['addComment'])){
            $userID= $_SESSION['userID'];
            $cmt= $_POST['comment'];
            $commentID= $_POST['commentID'];
            $isReply = $_POST['isReply'];
            // IF COMMENT IS REPLY
            
            if($isReply=="true")
            {
                $this->Model->addReply($commentID,$cmt,$userID);
                $sqlNewComment=$this->Model->NewComment;
            }
            else{
                $this->Model->addCmt($userID,$cmt);
                $sqlNewComment=$this->Model->NewComment;
            }
            // RENDER ROW AFTER ADDING
            $data = $sqlNewComment->fetch_assoc();
            exit($this->Model->renderRow($data));
        }
        // ----------- RENDER COMMENT -----------
        //--------------------------------------//
        $numComments= $this->Model->getNumComment();
        if(isset($_POST['flagRender'])){
            $start=$_POST['start'];
            $this->Model->renderAll($start);
        }
        
        $this->view("header_footer",[
            "Page"=>"detail",
            "bought"=>$this->detailModel->bought,
            "username"=>$username,
            "userid"=>$userid,
            "courseid"=>$courseid,
            "rating"=>$this->detailModel->rating,
            "isHome"=>false,
            "course"=>$this->detailModel->course,
            "introcourse"=>$this->detailModel->introcourse,
            'numComments'=>$numComments
        ]);
    }
    public function rating(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_POST['user-id'];
            $course_id = $_POST['course-id'];
            $new_rating = $_POST['star'];
            $link = $_POST['course-link'];
            $this->detailModel->setRating($user_id, $course_id, $new_rating);
            header("Location: $link");
        }
    }
    
}
?>
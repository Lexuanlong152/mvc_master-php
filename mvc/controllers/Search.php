<?php

class Search extends Controller{
    public $searchModel;
    public function __construct(){
        $this->searchModel = $this->model("searchModel");
    }
    // Must have SayHi()
    function SayHi(){
        $username="";
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        }

        if($username != ""){
            $this->searchModel->getUserID($username);
            $this->searchModel->getLikedCourse();
        }
        else{
            $this->searchModel->userid = -1;
            $this->searchModel->likedCourse = false;
        }

        $k = isset($_GET['k']) ? $_GET['k'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $author = isset($_GET['author']) ? $_GET['author'] : '';
        $rating = isset($_GET['rating']) ? $_GET['rating'] : '';
        $min_price = isset($_GET['min-price']) ? $_GET['min-price'] : '';
        $max_price = isset($_GET['max-price']) ? $_GET['max-price'] : '';

        $this->searchModel->searchCourse($k,$category,$author,$rating,$min_price,$max_price);
        $this->view("header_footer",[
            "Page"=>"search",
            "isHome"=>false,
            "username"=>$username,
            "result"=>$this->searchModel->result,
            "userid"=>$this->searchModel->userid,
            "likedCourse"=>$this->searchModel->likedCourse
        ]);
    }
}
?>
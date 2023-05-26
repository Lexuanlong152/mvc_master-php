<?php

class Logout extends Controller{
    public function __construct(){
        
    }
    function SayHi(){
        session_unset();
        session_destroy();
        header('Location: '.BASEPATH.'Login');
    }
}
?>
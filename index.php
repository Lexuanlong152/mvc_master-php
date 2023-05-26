<?php
define('BASEPATH','http://localhost/CodeCamp/');
use PHPMailer\PHPMailer\PHPMailer;  
session_start();
require_once "./mvc/Bridge.php";
$myApp = new App();
?>
<?php 
    // session_start();
    require_once "GoogleAPI/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient->setClientId("550311189386-f7r8ndf8tpo95v1po7rjd4ro918e8at0.apps.googleusercontent.com");
    $gClient->setClientSecret("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");
    $gClient->setApplicationName("GOOGLE CPI TUTORIAL");
    $link=BASEPATH."mvc/core/g-callback.php";
    $gClient->setRedirectUri($link);
    $gClient->addScope(scope_or_scopes:"https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
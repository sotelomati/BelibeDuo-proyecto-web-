<?php 
    session_start();
    if(isset($_SESSION['sesionLogin'])){
        include("navigationLogin.php");
    }
    else{
        include("navigationLogout.php");
    }



?>
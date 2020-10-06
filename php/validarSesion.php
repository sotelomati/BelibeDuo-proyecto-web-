<?php 

    session_start();
    $_SESSION['sesionMostrar'] = "No logueado";
    
    if(isset($_SESSION['sesionLogin'])){
        $_SESSION['sesionMostrar'] = $_SESSION['sesionLogin'];
        include("include/navigation.php");
    }
    else{
        $url= $_SERVER["REQUEST_URI"];
        $urlNoValidas="inicio";

        if(strpos($url ,$urlNoValidas) !== false){
            $nuevaURL = "login.php";
            header('Location: '.$nuevaURL);
        }

        include("include/navigation.php");
    }

?>
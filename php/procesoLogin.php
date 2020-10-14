<?php
    session_start();

    if(isset($_POST['ingresar'])){
        if($_SESSION['palabra2'] == md5($captcha)){

            if(empty($usuario)){
                echo "<p class='error'>* Agrega tu nombre </p>";
            }
            if(empty($contraseña)){
                echo "<p class='error'>* Agrega tu contraseña </p>";
            }

            if(($usuario == "fcytuader") && ($contraseña == "programacionavanzada")){
                echo "<font color='blue'>INGRESO CORRECTAMENTE</font>";
                //CREO LA SESION sesionLogin con USUARIO
                $_SESSION['sesionLogin'] = $usuario;
                cambiarPagina("inicio.php");
                }
            else{
                echo "<p class='error'>* Usuario o Contraseña incorrecto </p>";
            }
        }
        else{
            echo "<p class='error'>* captcha incorrecto</p>";
        }
    }


    function cambiarPagina($ruta){
        header("location: http://localhost/loginPA/".$ruta);
    }
    
?>
<?php
    session_start();
    if(isset($_POST['ingresar'])){
        
            if(empty($usuario)){
                echo "<p class='error'>* Agrega tu nombre </p>";
            }
            if(empty($contraseña)){
                echo "<p class='error'>* Agrega tu contraseña </p>";
            }
            if(($usuario == "fcytuader") && ($contraseña == "prg")){
                echo "<font color='blue'>INGRESO CORRECTAMENTE</font>";
                //CREO LA SESION sesionLogin con USUARIO
                $_SESSION['sesionLogin'] = $usuario;
                cambiarPagina("logueado.php");
            }
            else{
                echo "<p class='error'>* Usuario o Contraseña incorrecto </p>";
            }
       
    }

    function cambiarPagina($ruta){
        header("location: http://localhost/loginPA/".$ruta);
    }
    

?>
<?php
    
    if(isset($_POST['ingresar'])){
        if(empty($usuario)){
            echo "<p class='error'>* Agrega tu nombre </p>";
        }
        if(empty($contraseña)){
            echo "<p class='error'>* Agrega tu contraseña </p>";
        }
        if(($usuario == "fcytuader") && ($contraseña == "programacionavanzada")){
            echo "<font color='blue'>INGRESO CORRECTAMENTE</font>";
        }
    }


?>
<?php

    if(isset($_POST['botonRecu'])){
        if(empty($mailRecu)){
            echo "<p class='error'>* Agrega tu mail </p>";
        }
        else{
            if(!filter_var($mailRecu, FILTER_VALIDATE_EMAIL)){
                echo "<p class='error'>* El correo es valido </p>";
            }
            else{
                echo "Se envio un correo de validacion a su mail";
            }
        }

    }


?>
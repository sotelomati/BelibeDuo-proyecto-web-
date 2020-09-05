<!DOCTYPE html>
<html lang = "es" dir = "ltr">
    <head>
        <meta charset="utf-8">
        <title>Formulario Login</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            
            
            <section class ="form-login">
                <h5>Formulario Login</h5>
                <input class="controls" type="text" name="usuario" value="" placeholder="Usuario">
                <input class="controls" type="password" name="contraseña" value="" placeholder="Contraseña">
                <input class="buttons" type="submit" name="ingresar" value="Ingresar">
                <p><a href="#">¿Olvidaste tu Contraseña?</a></p>
                <p><a href="#">No tengo cuenta</a></p>
                <?php
                    if(isset($_POST['ingresar'])){
                        $usuario = $_POST['usuario'];
                        $contraseña = $_POST['contraseña'];
                        include("validar.php");
                    }
                    
                ?>

            </section>


        </form>
        


    </body>


</html>
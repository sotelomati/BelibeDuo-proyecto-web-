<!DOCTYPE html>
<html lang = "es" dir = "ltr">
    <head>
        <meta charset="utf-8">
        <title>Formulario Login</title>
        <link rel="stylesheet" href="estilos/style.css">
        <!--FNOT AWESOME-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    </head>

    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            
            
            <section class ="form-login">
                <h5>Formulario Login</h5>
                <input class="controls" type="text" name="usuario" value="" placeholder="Usuario">
                <input class="controls" type="password" name="contraseña" value="" placeholder="Contraseña">
                <input class="buttons" type="submit" name="ingresar" value="Ingresar">
                <p><a href="#">¿Olvidaste tu Contraseña?</a></p>
                <p><a href="registro.php">No tengo cuenta</a></p>
                <?php
                    if(isset($_POST['ingresar'])){
                        $usuario = $_POST['usuario'];
                        $contraseña = $_POST['contraseña'];
                        include("validar.php");
                    }
                    
                ?>

            </section>


        </form>
        
        
        <footer class="pie">
            <section class="mostrador">
            <i class="fab fa-github"></i>
                <p><a href="https://github.com/sotelomati">Sotelomati</a></p>
                <p><a href="https://github.com/GonzalezAg">GonzalezAg</a></p>
                <p><a href="https://github.com/schmidtoctavio">SchmidtOctavio</a></p>
            </section>

            <section class="mostrador">
                <i class="fab fa-github"></i>
                
            </section>

            <section class="mostrador">
                <i><img src="estilos/images/uader.png" alt="imagen de uader"></i>
            </section>

            <hr>
            <section class="pieFinal">
            <i class="far fa-registered">Copyright Todos los derechos reservados</i>
            </section>
        </footer>
    </body>
</html>
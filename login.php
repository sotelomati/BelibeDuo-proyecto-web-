<!DOCTYPE html>
<html lang = "es" dir = "ltr">
    <head>
        <title>Pagina principal</title>
        <?php require_once  'include/head.php'; ?>
    </head>
    
    <body>
        <?php require_once  'include/navigation.php'; ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            
            
            <section class ="form-login">
                <h5>Formulario Login</h5>
                <input class="controls" type="text" name="usuario" value="" placeholder="Usuario" required>
                <input class="controls" type="password" name="contraseña" value="" placeholder="Contraseña" required>
                <input class="buttons" type="submit" name="ingresar" value="Ingresar">
                <p><a href="recuperacion.php">¿Olvidaste tu Contraseña?</a></p>
                <p><a href="registro.php">No tengo cuenta</a></p>
                <?php
                    if(isset($_POST['ingresar'])){
                        $usuario = $_POST['usuario'];
                        $contraseña = $_POST['contraseña'];
                        include("php/validar.php");
                    }
                ?>
            </section>
        </form>
        
        <?php require_once  'include/captcha.php'; ?>
        
       
        <!--LLAMADA A FOOTER-->
        <?php require_once 'include/footer.php';?>  
    </body>
</html>
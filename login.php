<!DOCTYPE html>
<html lang = "es" dir = "ltr">
    <head>
        <title>Pagina principal</title>
        <?php require_once  'include/head.php'; ?>
    </head>
    <body>
        
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            
            
            <section class ="form-login">
                <h5>Formulario Login</h5>
                <input class="controls" id="int_user" type="text" name="usuario" value="" placeholder="Usuario" required>
                <input class="controls" type="password" name="contraseña" value="" placeholder="Contraseña" required>

                <section id="refresco" class="captchaCont">
                    <?php
                    require_once 'include/imagenGenerator.php';
                    ?>
                
                <input class="controlsMiddle2" type="text" name="captcha" value="" required>
                </section>
                
                <input class="buttons" type="submit" id="btn_login" name="ingresar" value="Ingresar">
                <p><a href="recuperacion.php">¿Olvidaste tu Contraseña?</a></p>
                <p><a href="registro.php">No tengo cuenta</a></p>

               

                <?php
                    if(isset($_POST['ingresar'])){
                        $captcha = $_POST['captcha'];
                        $usuario = $_POST['usuario'];
                        $contraseña = $_POST['contraseña'];
                        
                        include("php/procesoLogin.php");
                    
                }
                ?>
            </section>
            
        </form>
        
        
            
        
        
        <!--LLAMADA A FOOTER-->
        <?php require_once 'include/footer.php';?>  
        
    </body>
</html>
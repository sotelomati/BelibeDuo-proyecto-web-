<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once  'include/head.php';?>
    <title>Recuperacion de Contraseña</title>
</head>
<body>
    
    
            
    <form action="<?php echo
    htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <section class="form-recuperacion">

        <h1>Recuperacion de Contraseña</h1>
        
        <div class="contenedor">
            <div class="input-contenedor">
                <i class="fas fa-user icon"></i>
                <input class="controlsRecuperacion" type="text" name="usuarioRecu" placeholder="Ingrese su Usuario" required>
            </div>

            <div class="input-contenedor">
                <i class="fas fa-envelope icon"></i>
                <input class="controlsRecuperacion" type="text" name="mailRecu" placeholder="Ingrese su Correo Electronico" required>
            </div>

            <input class="button" type="submit" name="botonRecu" value="Recuperar">
        </div>
        

        <?php
            if(isset($_POST['botonRecu'])){
                $mailRecu = $_POST['mailRecu'];
                include("php/validarRecuperacion.php");
            }
        ?>
        
        </section>
    </form>
    

    <?php require_once 'include/footer.php';?> 
</body>

</html>
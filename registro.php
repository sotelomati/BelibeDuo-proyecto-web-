<!DOCTYPE html>
<html lang="en">
<head>
        <!--LLAMADA A HEAD-->
    <?php require_once  'include/head.php'; ?>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            
            
            <section class ="formLoginRegistro">
                <h5>Formulario Login</h5>
                <input class="controlsMiddle" type="text" name="usuario" value="" placeholder="Usuario">
                <input class="controlsMiddle" type="text" name="correo" value="" placeholder="Coreo">
                <input class="controlsTiny" type="number" name="codArea" value="" placeholder="codigo area Ej. (+0343)">
                <input class="controlsMiddle" type="number" name="telefono" value="" placeholder="telefono">
                <select class="controlsTiny" name="provincia" id="provincia" placeholder="provincia">
                <option>Buenos Aires</option>
                <option>Catamarca</option>
                <option>Chaco</option>
                <option>Chubut</option>
                <option>Cordoba</option>
                <option>Corrientes</option>
                <option>Entre Rios</option>
                <option>Formosa</option>
                <option>Jujuy</option>
                <option>La Pampa</option>
                <option>La Rioja</option>
                <option>Mendoza</option>
                <option>Misiones</option>
                <option>Neuquen</option>
                <option>Rio Negro</option>
                <option>Salta</option>
                <option>San Juan</option>
                <option>San Luis</option>
                <option>Santa Cruz</option>
                <option>Santa Fe</option>
                <option>Santiago del Estero</option>
                <option>Tierra del fuego</option>
                <option>Tucuman</option>
            </select>
                <input class="controlsMiddle" type="password" name="contraseña" value="" placeholder="Contraseña">
                <input class="controlsMiddle" type="password" name="contraseña" value="" placeholder="Confirmar Contraseña">
                <input class="buttons" type="submit" name="ingresar" value="Ingresar">

                <?php
                    if(isset($_POST['ingresar'])){
                        $usuario = $_POST['usuario'];
                        $contraseña = $_POST['contraseña'];
                        include("validar.php");
                    }
                    
                ?>

            </section>
        </form>
            <!--LLAMADA A FOOTER-->
        <?php require_once 'include/footer.php';?> 
</body>


</html>
<!DOCTYPE html>
<html lang="es">
<head>
        <!--LLAMADA A HEAD-->
    <?php require_once  'include/head.php'; ?>
</head>

<body>
    
<?php require_once  'include/navigation.php'; ?>    
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            
            
            <section class ="formLoginRegistro">
                <h5>Formulario Registro</h5>
                <input class="controlsMiddle" type="text" name="usuario" value="" placeholder="Usuario" required>
                <input class="controlsMiddle" type="text" name="correo" value="" placeholder="Correo">
                <input class="controlsTiny" type="number" name="codArea" value="" placeholder="codigo area Ej. (+0343)" required>
                <input class="controlsMiddle" type="number" name="telefono" value="" placeholder="telefono" required>
                <select class="controlsTiny" name="provincia" id="provincia" placeholder="provincia" required>
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
                <input class="controlsMiddle" type="password" name="contraseñaReg" value="" placeholder="Contraseña" required>
                <input class="controlsMiddle" type="password" name="contraseñaReg2" value="" placeholder="Confirmar Contraseña" required>
                <input class="buttons" type="submit" name="botonReg" value="Registrarse">

                <?php
                    if(isset($_POST['botonReg'])){
                        $usuario = $_POST['usuario'];
                        $contraseñaReg = $_POST['contraseñaReg'];
                        $contraseñaReg2 = $_POST['contraseñaReg2'];
                        include("php/validarRegistro.php");
                    }
                    
                ?>

            </section>
        </form>
            <!--LLAMADA A FOOTER-->
        <?php require_once 'include/footer.php';?> 
</body>


</html>
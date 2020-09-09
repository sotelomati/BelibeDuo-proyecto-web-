<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../estilos/styleRegistros.css">
     <!--FNOT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            
            
            <section class ="form-login">
                <h5>Formulario Login</h5>
                <input class="controls" type="text" name="usuario" value="" placeholder="Usuario">
                <input class="controls" type="text" name="correo" value="" placeholder="Coreo">
                <input class="controlsTiny" type="number" name="codArea" value="" placeholder="codigo area Ej. (+0343)">
                <input class="controls" type="number" name="telefono" value="" placeholder="telefono">
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
                <input class="controls" type="password" name="contraseña" value="" placeholder="Contraseña">
                <input class="controls" type="password" name="contraseña" value="" placeholder="Confirmar Contraseña">
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
        <?php require_once '../include/footer.php';?> 
</body>


</html>
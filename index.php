<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once  'include/head.php'; ?>
    <title>Principal</title>
</head>
<body class="body">
    <div class="galeria">
        <div class="contenedorJuegos">
                    <?php
                        include 'modelos/clasejuego.php';
                        
                        $miEstante = new Amadeuz("");
                        $miEstante->mostrarGaleria();
                        $_SERVER['juegos'] = $miEstante;

                        if(isset($_POST['CSGO'])){
                            /*$acronimo = $_POST['acronaux'];
                            $usuario = $_POST['usuario'];
                            $contraseña = $_POST['contraseña'];*/
                            
                            include("php/procesoJuego");
                        }
                        
                    ?>
                    
            </div>
        </div>
    <?php require_once 'include/footer.php';?> 
</body>

</html>
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
                    ?>
            </div>
        </div>
    <?php require_once 'include/footer.php';?> 
</body>

</html>
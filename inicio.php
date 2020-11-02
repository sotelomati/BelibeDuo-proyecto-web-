<!DOCTYPE html>
<html lang="es">
<head>
    <title>Perfil personal</title>
    <?php require_once  'include/head.php'; ?>
</head>
<body class="body">   
    
        <div class="contenedorPrincipal">
            <div class="contenedorInfoUser">
            <?php
                include 'objetos/usuarios.php';
                $usuarios = new usuario($_SESSION['sesionLogin']);
                        
            ?>
                <div class="informacionPersonal">
                    <?php   
                        $usuarios->mostrarInfor();
                        $usuarios->setJuegos();
                    ?>
                </div>

                <div class="listaJuegos">
                <?php $usuarios->getJuegos();?>

                </div>

                <div class="listaAmigos">
                    <?php   
                        $usuarios->traerAmigos();
                        $usuarios->mostrarAmigos();
                    ?>
                </div>

            </div>

            <div class="botonesPersonal">
                <div class="buttonsMiddle">
                <a href="index.php" style="text-decoration:none" class="buttonsMiddle"><?php echo 'Agregar juegos'?></a>
                </div>

                <div class="buttonsMiddle">
                <a style="margin-left= 300px;"href="social.php" style="text-decoration:none" class="buttonsMiddle"><?php echo 'Buscar Amigos'?></a>
                </div>
            </div>
            

            
        </div>
        
    <?php require_once 'include/footer.php';?> 
</body>

</html>
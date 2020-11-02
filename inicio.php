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
                    $usuarios = new usuario($_SESSION['sesionLogin'], 1);
                            
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

                <div class="informacionPersonal">
                    <?php   
                        $usuarios->traerAmigos();
                        $usuarios->mostrarAmigos();
                       
                    ?>
                </div>

            </div>

            <div class="botonesPersonal">
                
                <a href="index.php" style="text-decoration:none" class="personalAction"><?php echo 'Agregar juegos'?></a>
                

                
                <a href="social.php" style="text-decoration:none; margin-left= 300px;" class="personalAction"><?php echo 'Buscar Amigos'?></a>
                
            </div>
            

            
        </div>
        
    <?php require_once 'include/footer.php';?> 
</body>

</html>
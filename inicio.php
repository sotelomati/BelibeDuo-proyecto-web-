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
                <?php $usuarios->mostrarInfor();?>
                </div>

                <div class="listaJuegos">
                <?php $usuarios->getJuegos();?>
                
                </div>

                <div class="listaAmigos">

                </div>

            </div>
            <div class="buttonsMiddle">Agregar Juegos</div>
        </div>
        
    <?php require_once 'include/footer.php';?> 
</body>

</html>
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
                $social = new gestorUsuarios($_SESSION['sesionLogin']);         
            ?>
                <div class="informacionPersonal">
                    <?php
                        $usuarios->mostrarInfor();
                    
                    ?>
                </div>

                

                <div class="listaSocial">
                    <?php   
                        $social->mostrarUsuarios();
                    ?>
                </div>

            </div>
        </div>    

        
    <?php require_once 'include/footer.php';?> 
</body>

</html>
<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Perfil personal</title>
    <?php require_once  'include/head.php'; ?>
</head>
<body class="body">   
        <div class="contenedorPrincipal">
        <div class="container-all" id="modal">
                <div class="popup">
                    <div class="container-text">
                        <h1>Seleccione la imagen a cambiar:</h1>
                        <a href="inicio.php?action=change&id=avatarFemale.png"><img src="estilos/images/avatar/avatarFemale.png" alt=""></a>
                        <a href="inicio.php?action=change&id=avatarMale.png"><img src="estilos/images/avatar/avatarMale.png" alt=""></a>
                        <a href="inicio.php?action=change&id=apache.png"><img src="estilos/images/avatar/apache.png" alt=""></a>
                        <a href="inicio.php?action=change&id=bulldog.png"><img src="estilos/images/avatar/bulldog.png" alt=""></a>
                        <a href="inicio.php?action=change&id=ancla.png"><img src="estilos/images/avatar/ancla.png" alt=""></a>
                        <a href="inicio.php?action=change&id=wat.png"><img src="estilos/images/avatar/wat.png" alt=""></a>
                        <a href="inicio.php?action=change&id=jim.png"><img src="estilos/images/avatar/jim.png" alt=""></a>
                        <a href="inicio.php?action=change&id=jesus.png"><img src="estilos/images/avatar/jesus.png" alt=""></a>
                        <a href="inicio.php?action=change&id=lux.png"><img src="estilos/images/avatar/lux.png" alt=""></a>
                        <a href="inicio.php?action=change&id=caca.png"><img src="estilos/images/avatar/caca.png" alt=""></a>
                        <a href="inicio.php?action=change&id=csgo.png"><img src="estilos/images/avatar/csgo.png" alt=""></a>
                        <a href="inicio.php?action=change&id=impaktado.png"><img src="estilos/images/avatar/impaktado.png" alt=""></a>
                        <a href="inicio.php?action=change&id=rick.png"><img src="estilos/images/avatar/rick.png" alt=""></a>
                        <a href="inicio.php?action=change&id=morty.png"><img src="estilos/images/avatar/morty.png" alt=""></a>
                        <a href="inicio.php?action=change&id=triston.png"><img src="estilos/images/avatar/triston.png" alt=""></a>
                        </div>
                    <a href="#" class="btn-close-popup">X</a>
                </div>
            </div>
            <div class="contenedorInfoUser">
                <?php
                    include 'objetos/usuarios.php';
                    $usuarios = new usuario($_SESSION['sesionLogin'], 1);
                    if(isset($_GET['action'])){
                        if($_GET['action']=='change'){  
                            $usuarios->cambiarImagen($_GET['id']); 
                         }
                    }
                            
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
<?php
ob_end_flush();
?>
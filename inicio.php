<!DOCTYPE html>
<html lang="es">
<head>
    <title>Perfil personal</title>
    <?php require_once  'include/head.php'; ?>
</head>
<body class="body">   
    
        <div class="correcto">
            <h1>Ingreso Correctamente</h1>
            <i  class="fas fa-check"></i>    
        </div>  
        <div class="juegos">
            <?php
                //LLAMADA A LA BASE DE DATOS
                
                foreach($juegos as $juego){
                    echo '<div class="juegos"> <h1>'.$juego[0]'</h1></div>'
                }
            ?>
        
        </div>
    <?php require_once 'include/footer.php';?> 
</body>

</html>
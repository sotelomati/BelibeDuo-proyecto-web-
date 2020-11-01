<?php

session_start();
echo $_POST['juegoToDelete'];
echo $_SESSION['correoLogin'];
if(isset($_POST['juegoToDelete'])){
    $elimino =$_POST['juegoToDelete'];
    $identificador= $_SESSION['correoLogin'];

    $con = new mysqli('127.0.0.1','elimina','eliminandoPA', 'trabajopractico1');
        if($con ->connect_errno){
            echo "<p class='error'>* falla coneccion base de datos</p>";    
        }else{
            $eliminaJuego = "DELETE FROM usuario_juego WHERE usuario_juego.id_juego = '$elimino' AND usuario_juego.id_usuario = '$identificador'";
            echo $eliminaJuego;
            $resultado = mysqli_query($con, $eliminaJuego);
            if($resultado){
                echo 'eliminado con esxito';
            }
            $con->close();
        }

       
}
        //echo'<script>alert("El juego no se encutra en la lista");</script>';
    $_SESSION['actualizar'] = true;
    header("location: ../../inicio.php");

    


?>
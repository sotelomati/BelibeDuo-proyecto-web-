<?php
session_start();
echo $_SESSION['correoLogin'];
if(isset($_POST['friendToDelete'])){
    $elimino =$_POST['friendToDelete'];
    $identificador= $_SESSION['correoLogin'];

    $con = new mysqli('127.0.0.1','elimina','eliminandoPA', 'trabajopractico1');
        if($con ->connect_errno){
            echo "<p class='error'>* falla coneccion base de datos</p>";    
        }else{
            $eliminaFriend = "DELETE FROM aliados WHERE aliados.id_usuario1 = '$elimino' AND aliados.id_usuario2 = '$identificador'";
            echo $eliminaFriend;
            $resultado = mysqli_query($con, $eliminaFriend);
            if($resultado){
                echo 'eliminado con esxito';
            }

            $eliminaFriend = "DELETE FROM aliados WHERE aliados.id_usuario2 = '$elimino' AND aliados.id_usuario1 = '$identificador'";
            $resultado = mysqli_query($con, $eliminaFriend);
            ?><br><?php
            echo $eliminaFriend;
            

            $con->close();
        }

       
}
    $_SESSION['actualizar'] = true;
    header("location: ../../inicio.php");

    


?>
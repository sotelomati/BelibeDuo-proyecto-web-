<?php
session_start(); 

if(!isset($_SESSION['sesionLogin'])){
    header("location: ../../login.php");
}
else{
    if(isset($_POST['juegoToAdd'])){
        $identificador = $_SESSION['correoLogin'];
        $agregar = $_POST['juegoToAdd']; 
        
        $con = new mysqli('127.0.0.1','modifica','modificandoPA', 'trabajopractico1');
        if($con ->connect_errno){
            echo "<p class='error'>* falla coneccion base de datos</p>";    
        }else{
            $agregaJuego = "INSERT INTO usuario_juego (id_juego, id_usuario) VALUES ('$agregar','$identificador')";
            $resultado = mysqli_query($con, $agregaJuego);
            
            $con->close();
        }
    }
    header("location: ../../inicio.php");
}


?>
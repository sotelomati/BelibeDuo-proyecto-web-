<?php
session_start(); 

if(!isset($_SESSION['sesionLogin'])){
    header("location: ../../login.php");
}
else{
    if(isset($_POST['friendToAdd'])){
        $identificador = $_SESSION['correoLogin'];
        $agregar = $_POST['friendToAdd']; 
        
        $con = new mysqli('127.0.0.1','modifica','modificandoPA', 'trabajopractico1');
        if($con ->connect_errno){
            echo "<p class='error'>* falla coneccion base de datos</p>";    
        }else{
            $agregaAmigo = "INSERT INTO aliados (id_usuario1, id_usuario2) VALUES ('$agregar','$identificador')";
            $resultado = mysqli_query($con, $agregaAmigo);
            
            $con->close();
        }
    }
    header("location: ../../inicio.php");
}


?>
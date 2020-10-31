<?php
class Usuario{
    private $nombre;
    private $correo;
    private $ubicacion;
    private $misJuegos;
    private $amigos; 
}

public function __construct($nombreUser, $correoUser, $ubicacionUser){
    $this->nombre = $nombreUser;
    $this->correo = $correoUser;
    $this->ubicaion = $ubicacionUser;
    
    $this->setJuegos();
}

public function setJuegos(){
    include '../modelos/clasejuego.php';

    $this->misJuegos = new amadeuz($this->correo);
    $this->misJuegos->mostrarGaleria();
}

public function traerAmigos(){
    $this->cantidad = 0;
    $con = new mysqli('127.0.0.1','lectura','leyendoPA', 'trabajopractico1');

    if($con ->connect_errno){
        echo "<p class='error'>* falla coneccion base de datos</p>";    
    }else{
        $leeAmigos = "SELECT nombre, correo FROM amigos INNER JOIN usuarios ON amigos.id_usuario1 = usuario.Id_usuario WHERE amigos.id_usuario1 LIKE '$this->correo'";
        $resultado = mysqli_query($con, $leeAmigos);
        $i=0;
    if($resultado){
        while($row = $resultado->fetch_array()){
            $oJuego = new Juego($row['Id_juego'], $row['nombre'], $row['descripcion']);
            $this->estanteria[$i]=$oJuego;
            $i++;
            $this->cantidad++;
            }
        }
        $con->close();
    }
}


?>

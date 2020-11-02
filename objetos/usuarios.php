<?php
class Usuario{
    private $nombre;
    private $correo;
    private $ubicacion;
    private $misJuegos;
    private $amigos; 
    private $cantidadAmigos;


public function __construct($nombreUser){
    $con = new mysqli('127.0.0.1','lectura','leyendoPA', 'trabajopractico1');

    if($con ->connect_errno){
        echo "<p class='error'>* falla coneccion base de datos</p>";    
    }else{
        $infoPersonal = "SELECT correo, ubicaciones.nombre FROM usuarios
        INNER JOIN ubicaciones
        on usuarios.id_ubicacion = ubicaciones.id_ubicacion
        WHERE usuarios.nombre LIKE '$nombreUser'";

        $resultado = mysqli_query($con, $infoPersonal);
        $row = $resultado->fetch_array();
        
        $this->nombre = $nombreUser;
        $this->correo = $row[0];
        $this->ubicacion = $row['nombre'];
        $_SESSION['correoLogin'] = $row[0];
        $con->close();
}
}

public function setJuegos(){
    include 'juegos.php';
    $this->misJuegos = new gestorJuegos($this->correo);
}

public function getJuegos(){
    $this->misJuegos->mostrarGaleriaPersonal();
}

public function traerAmigos(){
    $this->cantidadAmigos = 0;
    $con = new mysqli('127.0.0.1','lectura','leyendoPA', 'trabajopractico1');

    if($con ->connect_errno){
        echo "<p class='error'>* falla coneccion base de datos</p>";    
    }else{
        $leeAmigos = "SELECT amigo FROM contactos WHERE Id_usuario LIKE '$this->correo'";
        $resultado = mysqli_query($con, $leeAmigos);
        $i=0;
    if($resultado){
        while($row = $resultado->fetch_array()){
            $oAmigo = new usuario($row['amigo']);
            $this->amigos[$i]=$oAmigo;
            $i++;
            $this->cantidadAmigos++;
            }
        }
        $con->close();
    }
}

public function mostrarAmigos(){
    for($i = 0; $i<$this->cantidadAmigos; $i++){
        $this->amigos[$i]->mostrarInfor();
    }
}

public function mostrarInfor(){
    echo'
    <div class="user">
        <img src="estilos\images\avatar\avatarMale.png">
        <p style="color: white;"> Nombre:'.$this->nombre.'</p>
        <p style="color: white;"> Correo:'.$this->correo.'</p>
        <p style="color: white;"> Ubicacion:'.$this->ubicacion.'</p>
    </div>
    ';
}

public function deleteJuego($juegoToEliminar){
    $eliminar =$this->misJuegos->deleteJuego($juegoToEliminar);
    if($eliminar != NULL){
        $con = new mysqli('127.0.0.1','modifica','modificandoPA', 'trabajopractico1');
        if($con ->connect_errno){
            echo "<p class='error'>* falla coneccion base de datos</p>";    
        }else{
            $eliminaJuego = "DELETE FROM `usuario_juego` WHERE usuario_juego.id_juego LIKE '$eliminar' AND usuario_juego.id_usuario LIKE '$this->correo'";
            $resultado = mysqli_query($con, $eliminaJuego);
        }
        $con->close();
        echo' <script>alert("juego eliminado con exito");</script>';
    }else{
        echo'<script>alert("El juego no se encutra en la lista");</script>';
    }
    
}
}


?>

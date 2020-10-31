<?php
class Usuario{
    private $nombre;
    private $correo;
    private $ubicacion;
    private $misJuegos;
    private $amigos; 


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
        
        $this->setJuegos();
}
}

public function setJuegos(){
    include 'modelos/clasejuego.php';
    $this->misJuegos = new amadeuz($this->correo);
}

public function getJuegos(){
    $this->misJuegos->mostrarGaleriaPersonal();
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

public function mostrarInfor(){
    echo'
    <div class="user">
        <img src="estilos\images\avatar\avatarMale.png">
        <p> Nombre:'.$this->nombre.'</p>
        <p> Correo:'.$this->correo.'</p>
        <p> Ubicacion:'.$this->ubicacion.'</p>
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

        echo' <script>alert("juego eliminado con exito");</script>';
    }else{
        echo'<script>alert("El juego no se encutra en la lista");</script>';
    }
}
}


?>

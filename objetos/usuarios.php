<?php

class gestorUsuarios{
    private $propietario;
    private $usuarios;
    private $cantidadUsuarios;
    

    public function __construct($idUser){
        $this->propietario = new usuario($idUser);
        $this->propietario->traerAmigos();
        $con = new mysqli('127.0.0.1','lectura','leyendoPA', 'trabajopractico1');
        $this->cantidadUsuarios = 0;
        if($con ->connect_errno){
            echo "<p class='error'>* falla coneccion base de datos</p>";    
        }else{
            $nombreUser= "SELECT nickname FROM usuarios";
            $resultado = mysqli_query($con, $nombreUser);
            
            $usuarioNuevo;
            while($row = $resultado->fetch_array()){
                if($row['nickname'] != $idUser){
                    if(!$this->propietario->isFriend($row['nickname'])){
                        $usuarioNuevo = new Usuario($row['nickname']);
                        $this->usuarios[$this->cantidadUsuarios] = $usuarioNuevo;
                        $this->cantidadUsuarios++;
                    }
                }
            }
            $con->close();
        }
    }

    public function mostrarUsuarios(){
        for($i = 0; $i < $this->cantidadUsuarios; $i++){
            $this->usuarios[$i]->mostrarAsFriend();
        }
    }
}

class Usuario{
    private $nombre;
    private $correo;
    private $sexo;
    private $ubicacion;
    private $misJuegos;
    private $amigos; 
    private $cantidadAmigos;


public function __construct($nombreUser, $principal=0){
    $con = new mysqli('127.0.0.1','lectura','leyendoPA', 'trabajopractico1');

    if($con ->connect_errno){
        echo "<p class='error'>* falla coneccion base de datos</p>";    
    }else{
        $infoPersonal = "SELECT correo, ubicaciones.nombre, sexo FROM usuarios
        INNER JOIN ubicaciones
        on usuarios.id_ubicacion = ubicaciones.id_ubicacion
        WHERE usuarios.nickname LIKE '$nombreUser'";

        $resultado = mysqli_query($con, $infoPersonal);
        $row = $resultado->fetch_array();
        
        $this->nombre = $nombreUser;
        $this->correo = $row[0];
        $this->sexo = $row['sexo'];
        $this->ubicacion = $row['nombre'];
        if($principal){
            $_SESSION['correoLogin'] = $row[0];
        }
        
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

public function isFriend($supuesto){
    for($j = 0; $j<$this->cantidadAmigos; $j++){
        if($this->amigos[$j]->getNombre() == $supuesto){
            return true;
        }
    }
}

public function getNombre(){
    return $this->nombre;
}

public function traerAmigos(){
    $this->cantidadAmigos = 0;
    $con = new mysqli('127.0.0.1','lectura','leyendoPA', 'trabajopractico1');

    if($con ->connect_errno){
        echo "<p class='error'>* falla coneccion base de datos</p>";    
    }else{
        $leeAmigos = "SELECT id_usuario1, id_usuario2 FROM aliados";
        $resultado = mysqli_query($con, $leeAmigos);
        $i=0;
        $amigosCorreo;
        if($resultado){
            while($row = $resultado->fetch_array()){

                if($this->correo == $row['id_usuario1']){
                    $amigosCorreo[$this->cantidadAmigos] = $row['id_usuario2']; 
                    $this->cantidadAmigos++;
                    
                }elseif($this->correo == $row['id_usuario2']){
                    $amigosCorreo[$this->cantidadAmigos] = $row['id_usuario1']; 
                    $this->cantidadAmigos++;
                    
                }
                $i++;
                }
        }

        for($j = 0; $j<$this->cantidadAmigos; $j++){
            $resultado = mysqli_query($con, "SELECT nickname FROM usuarios WHERE correo like '$amigosCorreo[$j]'");
            $row = $resultado->fetch_array();

            $oAmigo = new usuario($row['nickname']);
            $this->amigos[$j]=$oAmigo;
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
        <img src="estilos\images\avatar\avatar'.$this->sexo.'.png">
        <p style="color: white;"> Nombre:'.$this->nombre.'</p>
        <p style="color: white;"> Correo:'.$this->correo.'</p>
        <p style="color: white;"> Ubicacion:'.$this->ubicacion.'</p>
    </div>
    ';
}

public function mostrarAsFriend(){
    echo'
    <form class="frame" action="objetos/procesos/agregarAmigo.php" method="POST" >
        <div class="amigoSocial">
            <img src="estilos\images\avatar\avatar'.$this->sexo.'.png">
            <p style="color: white;"> Nombre:'.$this->nombre.'</p>
            <p style="color: white;"> Correo:'.$this->correo.'</p>
            <p style="color: white;"> Ubicacion:'.$this->ubicacion.'</p>
            <input name="friendToAdd" type="hidden" value="'.$this->correo.'">
        </div>
        <input class="buttons" type="submit" id="'.$this->acronimo.'" name="addFriend" value="Agregar">
    </form>
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

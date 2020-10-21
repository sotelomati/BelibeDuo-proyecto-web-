<?php
    

    if(isset($_POST['ingresar'])){
        if($_SESSION['palabra2'] == md5($captcha)){

            if(empty($usuario)){
                echo "<p class='error'>* Agrega tu nombre </p>";
            }
            if(empty($contraseña)){
                echo "<p class='error'>* Agrega tu contraseña </p>";
            }

            if(($usuario == "fcytuader") && ($contraseña == "programacionavanzada")){
                echo "<font color='blue'>INGRESO CORRECTAMENTE</font>";
                //CREO LA SESION sesionLogin con USUARIO
                $_SESSION['sesionLogin'] = $usuario;
                cambiarPagina("inicio.php");
                }
            else{
                echo "<p class='error'>* Usuario o Contraseña incorrecto </p>";
            }
        }
        else{
            echo "<p class='error'>* captcha incorrecto</p>";
        }
    }

    if(isset($_POST['botonReg'])){
        if(!empty($usuarioNuevo)){
            if(!empty($contraseñaReg) && !empty($contraseñaReg2)){
                if($contraseñaReg == $contraseñaReg2){
                    $con = new mysqli('127.0.0.1','modifica','modificandoPA', 'trabajopractico1');

                    if($con ->connect_errno){
                        echo "<p class='error'>* falla coneccion base de datos</p>";    
                    }else{
                        /*$buscaIdUbicacion = "SELECT id_ubicacion FROM ubicaciones WHERE nombre like ".$provincia;
                        $id_ubicacion = $con->query($buscaIdUbicacion);*/
                       
                        $agregar = "INSERT INTO usuarios(correo, nombre, contraseña, id_ubicacion) VALUES ('$correo', '$usuarioNuevo', '$contraseñaReg', '7')";
                        $con->query($con, $agregar);
    
                        $agregaTelefono = "INSERT INTO telefonos(numero, cod_area, id_usuario)VALUES('$correo', '$codArea', '$numeroReg')";
    
                        $con->query($con, $agregaTelefono);

                        $con->close();
                    }
                }
            }else{
                echo "<p class='error'>* las contraseñas no coinciden</p>";    
            }
        }else{
            echo "<p class='error'>* usuario no valido</p>";
        }

    }

    function cambiarPagina($ruta){
        header("location: http://localhost/loginPA/".$ruta);
    }
    
?>
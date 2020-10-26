<?php
    

    if(isset($_POST['ingresar'])){
        if($_SESSION['palabra2'] == md5($captcha)){

            if(empty($usuario)){
                echo "<p class='error'>* Agrega tu nombre </p>";
            }
            if(empty($contraseña)){
                echo "<p class='error'>* Agrega tu contraseña </p>";
            }
            $consultar = "SELECT contraseña FROM usuarios WHERE nombre like '$usuario'";
            $contraBD = mysqli_fetch_row(consultaBD($consultar));

            if($contraBD['0'] ==  hash('sha256', $contraseña)){
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
        if(!empty($usuarioNuevo) && $usuarioNuevo != ""){
            if(!empty($contraseñaReg) && !empty($contraseñaReg2)){
                if($contraseñaReg == $contraseñaReg2){
                    $con = new mysqli('127.0.0.1','modifica','modificandoPA', 'trabajopractico1');

                    if($con ->connect_errno){
                        echo "<p class='error'>* falla coneccion base de datos</p>";    
                    }else{

                        $buscaIdUbicacion = "SELECT * FROM ubicaciones WHERE nombre like '$provincia'";
                        $id_ubicacion = mysqli_query($con, $buscaIdUbicacion);
                        $fila = mysqli_fetch_row($id_ubicacion);
                        

                        $agregar = "INSERT INTO usuarios(correo, nombre, contraseña, id_ubicacion) VALUES ('$correo', '$usuarioNuevo', '$contraseñaReg', '$fila[0]')";;
                        $resultado = mysqli_query($con, $agregar);
                        if($resultado){
                            echo "<script>alert('se ha registrado el usuario');</script>";
                        }else{
                            echo "<script>alert('No se pudo registrar');</script>";
                        }
    
                        $agregaTelefono = "INSERT INTO telefonos(numero, cod_area, id_usuario)VALUES('$numeroReg', '$codArea', '$correo')";
    
                        $resultadoTelefono = mysqli_query($con, $agregaTelefono);
                        if($resultadoTelefono){
                            echo "<script>alert('se ha registrado el usuario');</script>";
                        }else{
                            echo "<script>alert('No se pudo registrar');</script>";
                        }

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

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    
    function consultaBD($consulta){
        $con = new mysqli('127.0.0.1','lectura','leyendoPA', 'trabajopractico1');

        if($con ->connect_errno){
            echo "<p class='error'>* falla coneccion base de datos</p>";    
        }else{
            return mysqli_query($con, $consulta);
        }
    }
?>
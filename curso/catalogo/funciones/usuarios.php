<?php

    /*
     * CRUD de usuarios
     */

    function listarUsuarios() : mysqli_result
    {
        $link = conectar();
        $sql = "SELECT idUsuario, usuNombre, usuApellido,
                        usuEmail,
                        rol
                FROM usuarios u
                JOIN roles r 
                  ON u.idRol = r.idRol";
            //WHERE idUsuario != ".$_SESSION['idUsuario'];

        $resultado = mysqli_query($link, $sql);
        return $resultado;
    }

function verUsuarioPorID(  ) : array
{
    $idUsuario = $_GET['idUsuario'];
    $link = conectar();
    $sql = "SELECT idUsuario, usuNombre, usuApellido,
                        usuEmail,
                        u.idRol, rol
                FROM usuarios u 
                JOIN roles r 
                    ON r.idRol = u.idRol
                WHERE idUsuario = ".$idUsuario;

    $resultado = mysqli_query($link, $sql);
    $usuario = mysqli_fetch_assoc( $resultado );
    return $usuario;
}


    function registrarUsuario() : bool
    {
        $usuNombre = $_POST['usuNombre'];
        $usuApellido = $_POST['usuApellido'];
        $usuEmail = $_POST['usuEmail'];
        $usuClave = $_POST['usuClave'];
        $claveHash = password_hash($usuClave, PASSWORD_DEFAULT);
        $link = conectar();
        $sql = "INSERT INTO usuarios
                    ( usuNombre, usuApellido, usuEmail, usuClave ) 
                  VALUE 
                    ( 
                     '".$usuNombre."',
                     '".$usuApellido."',
                     '".$usuEmail."',
                     '".$claveHash."'
                     )";

        try {
            $resultado = mysqli_query($link, $sql);
            return $resultado;
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
    }

    function modificarUsuario() : bool
    {
        $usuNombre = $_POST['usuNombre'];
        $usuApellido = $_POST['usuApellido'];
        $usuEmail = $_POST['usuEmail'];
        $idRol = $_POST['idRol'];
        $idUsuario = $_POST['idUsuario'];
        $link = conectar();
        $sql = "UPDATE usuarios 
                    SET usuNombre = '".$usuNombre."',
                        usuApellido = '".$usuApellido."',
                        usuEmail = '".$usuEmail."',
                        idRol = ".$idRol."
                  WHERE idUsuario = ".$idUsuario;
        try {
            $resultado = mysqli_query($link, $sql);
            return $resultado;
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
    }

    function modificarClave() : bool
    {
        //capturamos clave actual SIN ENCRIPTAR
        $usuClave = $_POST['clave'];
        /** obtenemos clave encriptada */
        $link = conectar();
        $sql = "SELECT usuClave 
                  FROM usuarios 
                  WHERE idUsuario = ".$_SESSION['idUsuario'];
        try {
            $resultado = mysqli_query($link, $sql);
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
        /* compraramos la clave sin encriptar: enviada por el usuario
            con la clave encriptada de la tabla usuarios
         */
        $usuario = mysqli_fetch_assoc($resultado);
        if( !password_verify( $usuClave, $usuario['usuClave'] ) ){
            // si no coinciden -> redireccion
            header('location: formModificarClave.php?error=1');
            return false;
        }
        else{
            //clave actual y clave en tabla usuarios coinciden
            /* comparamos que NO coincidan las nuevas claves */
            if( $_POST['newClave'] != $_POST['newClave2'] ){
                // si no coinciden -> redireccion
                header('location: formModificarClave.php?error=2');
                return false;
            }
            /* acá sabemos que la clave actual esta OK
                y que la clave nueva y repite también coinciden
             */
            /* encriptamos claver nueva y almacenamos en tabla usuarios */
            $pwHash = password_hash($_POST['newClave'], PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios 
                        SET usuClave = '".$pwHash."'
                        WHERE idUsuario = ".$_SESSION['idUsuario'];
            try {
                return mysqli_query($link, $sql);
            }catch ( Exception $e ){
                echo $e->getMessage();
                return false;
            }

        }
    }
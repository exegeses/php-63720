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
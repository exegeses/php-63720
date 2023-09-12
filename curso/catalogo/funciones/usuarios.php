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
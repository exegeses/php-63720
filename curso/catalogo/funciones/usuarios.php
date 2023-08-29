<?php

    /*
     * CRUD de usuarios
     */

    function listarUsuarios()
    {}

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
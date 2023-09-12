<?php

    function login()
    {
        $usuEmail = $_POST['usuEmail'];
        $usuClave = $_POST['usuClave'];
        $link = conectar();
        $sql = "SELECT idUsuario, usuNombre, usuApellido, 
                       idRol, usuClave
                   FROM usuarios
                   WHERE usuEmail = '".$usuEmail."'
                     AND usuActivo = 1";
        try {
            $resultado = mysqli_query( $link, $sql );
            $cantidad = mysqli_num_rows($resultado);
        }
        catch ( Exception $e ){
            echo $e->getMessage();
        }
        //si $cantidad == 0  -> se loguó MAL
        //si $cantidad == 1  -> se loguó OK
        if( $cantidad == 0 ){
            //redirección a formLogin.php enviando error = 1
            header('location: formLogin.php?error=1');
        }
        else{
            /*acá sabemos que el email esta OK
             y que el usuario está activo*/
            // verificamos contraseña
            $usuario = mysqli_fetch_assoc($resultado);
            if( !password_verify( $usuClave, $usuario['usuClave'] ) ){
                ## la contraseña está mal
                //redirección a formLogin.php enviando error = 1
                header('location: formLogin.php?error=1');
                return;
            }
            /* acá ya sabemos: se logueó bien y está activo */
            ####### RUTINA DE AUTENTICACIÓN  ##########
            $_SESSION['login'] = 1;

            $_SESSION['idUsuario'] = $usuario['idUsuario'];
            $_SESSION['usuNombre'] = $usuario['usuNombre'];
            $_SESSION['usuApellido'] = $usuario['usuApellido'];
            $_SESSION['usuEmail'] = $usuEmail;
            $_SESSION['idRol'] = $usuario['idRol'];

            //redirección a admin.php
            header('location: admin.php');
        }

    }
    function logout() : void
    {
        //eliminamos variables de sesión
        session_unset();
        //eliminamos la sesión
        session_destroy();
        //redirecci´´on con demora
        header( 'refresh:3;url=index.php' );
    }
    function autenticar() : void
    {
        if( !isset( $_SESSION['login'] ) ){
            header('location: formLogin.php?error=2');
        }
    }

/**
 * función para redireccionar a un usuario que no sea administrador
 * @return void
 */
    function noAdmin() : void
    {
        if( $_SESSION['idRol'] != 1 ){
            header('location: noAdmin.php');
        }
    }

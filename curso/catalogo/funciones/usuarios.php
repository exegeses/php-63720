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

function generarClave( $length = 6 ) : string
{
    $chars = [
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
        "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
        1,2,3,4,5,6,7,8,9,0
    ];
    $codigo = '';
    $cantidad = count( $chars ) - 1;
    for( $n = 0; $n < $length; $n++ ){
        $codigo .= $chars[ rand( 0, $cantidad ) ];
    }
    return $codigo;
}

function almacenarCodigo( $codigo ) : bool
{
    $email = $_POST['usuEmail'];
    $link = conectar();
    $sql = "INSERT INTO password_resets
                VALUES
                    (
                     DEFAULT,
                     '".$codigo."',
                     '".$email."',
                     DEFAULT,
                     DEFAULT
                    )";
    try {
        $resultado = mysqli_query($link, $sql);
        return $resultado;
    }
    catch (Exception $e){
        echo $e->getMessage();
        return false;
    }
}


function enviarMail( $codigo ) : bool
{
    //capturamos datos enviados por el form
    $email = $_POST['usuEmail'];

    //configuramos datos de email a enviar
    $destinatario = 'marcos@dropjar.com';
    $asunto = 'Solicitud de modificación de contraseña';
    $cuerpo = '<div style="border: 12px; 
                               box-shadow: 0px 0px 8px #ccc;
                               padding: 24px;
                               font-family: Tahoma;
                               font-size: 1.2em;
                               width: 450px; margin:auto
                               text-align: center">';
    $cuerpo .= 'Copie y pegue este código <br>';
    $cuerpo .= '<b style="font-size:2.5em; margin: 64px;">';
    $cuerpo .= $codigo.'</b></div>';

    #encabezados adicionales
    $headers = 'From: contacto@empresa.com'. "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    //enviamos el emaiL
    if( mail( $destinatario, $asunto, $cuerpo, $headers ) ){
        return true;
    }
    return false;
}

function mailResetPass() : bool
{
    $usuEmail = $_POST['usuEmail'];
    /* chequear que el email exista */
    $link = conectar();
    $sql = "SELECT 1 FROM usuarios
               WHERE usuEmail = '".$usuEmail."'";
    $resultado = mysqli_query($link, $sql);
    $cantidad = mysqli_num_rows($resultado);

    if( $cantidad ){
        $codigo = generarClave();
        almacenarCodigo( $codigo );
        enviarMail( $codigo );
        return true;
    }
    return false;

}
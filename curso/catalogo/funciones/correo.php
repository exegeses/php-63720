<?php

    function enviarMail() : bool
    {
        //capturamos datos enviados por el form
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $consulta =  $_POST['consulta'];

        //configuramos datos de email a enviar
        $destinatario = 'marcos@dropjar.com';
        $asunto = 'Email enviado desde nuestra sistema';
        $cuerpo = '<div style="border: 12px; 
                               box-shadow: 0px 0px 8px #ccc;
                               padding: 24px;
                               font-family: Tahoma;
                               font-size: 1.2em;
                               width: 450px; margin:auto">';
        $cuerpo .= 'Nombre: '.$nombre.'<br>';
        $cuerpo .= 'Email: '.$email.'<br>';
        $cuerpo .= 'Consulta: '.$consulta.'</div>';

        #encabezados adicionales
        $headers = 'From: contacto@empresa.com'. "\r\n";
        $headers .= 'Reply-To: '.$email."\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

        //enviamos el emaiL
        if( mail( $destinatario, $asunto, $cuerpo, $headers ) ){
            return true;
        }
        return false;
    }
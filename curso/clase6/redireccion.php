<?php

    if( !isset( $_GET['ir'] ) ) {
        // redireccion inmediata
        //header('location: https://www.duckduckgo.com');

        //redirección con demora
        header('refresh:3;url=https://www.nada.com');
        echo 'redirección en 3 segundos';
    }
    else{
        echo $_GET['ir'], ' existe';
    }
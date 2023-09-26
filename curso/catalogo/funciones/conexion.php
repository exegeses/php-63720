<?php

    const SERVER    = 'localhost';
    const USUARIO   = 'root';//'id21312485_catalogo';
    const CLAVE     = 'root';//'Catalogo-1';
    const BASE      = 'catalogo63720';//'id21312485_catalogo';

    function conectar() : mysqli
    {
        $link = mysqli_connect(
            SERVER,
            USUARIO,
            CLAVE,
            BASE
        );
        return $link;
    }
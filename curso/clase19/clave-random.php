<?php

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

    echo generarClave( );


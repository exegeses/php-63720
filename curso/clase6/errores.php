<?php


    $n = 5;
    $n2 = 0;

    try {
        //intentamos hacer ...
        $resultado = $n / $n2;
    }
    catch ( Error $e )
    {
        echo 'archivo: ', $e->getFile(), '<br>';
        echo 'nro Línea: ', $e->getLine(), '<br>';
        echo 'mensaje: ', $e->getMessage(), '<br>';

        echo 'No se puede dividir por 0';
    }


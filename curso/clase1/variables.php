<?php

    $numero = 249;
    $curso = 'PHP y MySQL';

/*
    tipos de datos
        escalares
            boolean     true   1
                        false  0
            integer     666
            float       7.5
            string      'cadena'

        compuestos
            array       []
            objeto
            callable
            iterable
*/
?>
    <h1>Variables en PHP</h1>
<?php
    echo 'El número es: ' , $numero;
?>
    <p>
        Nuestro curso se llama
        <?php echo $curso ?>
        <hr>
        <?= $curso ?>
    </p>
<?php
    //sobreescribimos la variable número
    $numero = 581;
    echo $numero;
?>
<hr>
<?php
    echo $numero = 325;
?>

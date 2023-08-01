<?php
    //declaración
    function strong( string $frase ) : string
    {
        $mensaje = '<b>'.$frase.'</b><br>';
        return $mensaje;
    }
    function sumar( float $n1, float $n2 ) : float
    {
        $resultado = $n1 + $n2;
        return $resultado;
    }
    function calcularCuadrado( float $numero ) : float
    {
        $resultado = $numero * $numero;
        return  $resultado;
    }
    function restar( float $n1, float $n2 ) : float
    {
        return $n1 - $n2;
    }
    function esPar( int $numero ) : bool
    {
        if( $numero % 2 == 0 ){
            //return 'es par';
            return true;
        }
        //return 'es impar';
        return false;
    }


    include '../layout/header.php';
?>
    <main class="container py-3">
        <h1>Funciones en php</h1>
<?php
    echo strong('hola mundo');
    echo strong('otro texto');
    echo strong( 99 );
?>
    <hr>
<?php
    echo sumar( 2, 4.5 );
?>
    <hr>
<?php
    echo sumar( calcularCuadrado( 2 ), restar( 7, 2 ) );
?>
    <hr>
<?php
    echo esPar( 22 );
?>
    </main>
<?php
    include '../layout/footer.php';
?>
<?php
include '../layout/header.php';
?>

    <main class="container py-3">
        <h1>Fecha en PHP</h1>

<?php
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    /* mostrar fecha
     * formato:  Miércoles 26/07/2023
     * */
    $diaMes = date('d');
    $mes = date('m');
    $anio = date('Y');
    echo $diaMes, '/', $mes, '/', $anio;
?>
    <br>
<?php
    $diaSemana = date('w');
    switch ( $diaSemana ){
        case 0:
            $diaSemana = 'Domingo';
            break;
        case 1:
            $diaSemana = 'Lunes';
            break;
        case 2:
            $diaSemana = 'Martes';
            break;
        case 3:
            $diaSemana = 'Miércoles';
            break;
        case 4:
            $diaSemana = 'Jueves';
            break;
        case 5:
            $diaSemana = 'Viernes';
            break;
        default:
            $diaSemana = 'Sábado';
            break;
    }


    $fecha = date('d/m/Y H:i:s');
    echo $diaSemana, ' ',  $fecha;
?>
    <hr>
Unix Timestamp
<?php
    //cantidad de milisegundos transcurridos
    // desde 01/01/1970
    echo time();
?>

    </main>
<?php
include '../layout/footer.php';
?>
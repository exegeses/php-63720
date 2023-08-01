<?php
include '../layout/header.php';
?>

    <main class="container py-3">
        <h1>Casteo de variables</h1>
<?php
    $nombre = 'marcos';
    echo 'Tu nombre es: $nombre';// no castea la variable
    echo '<br>';
    echo "Tu nombre es: $nombre";// si castea la variable (ESTÁ MAL)
    echo '<br>';
    echo 'Tu nombre es: ', $nombre;
?>
        
        
    </main>
<?php
include '../layout/footer.php';
?>
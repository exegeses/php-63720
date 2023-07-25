<?php
    include '../layout/header.php';
?>

    <main class="container py-3">
        <h1>Condicionales</h1>
<?php
    $numero = $_POST['numero'];
    if( $numero < 100 ){
        echo '<img src="imgs/ok.png">';
    }
    else{
        echo '<img src="imgs/error.png">';
    }
?>
    <hr>
<?php
    if( $numero < 100 ){
?>
        <img src="imgs/ok.png">
<?php
    }
    else{
?>
        <img src="imgs/error.png">
<?php
        }
?>
    <hr>
<?php
    $img = 'error';
    if ( $numero < 100 ){
        $img = 'ok';
    }
?>
    <img src="imgs/<?= $img ?>.png">
    </main>
<?php
    include '../layout/footer.php';
?>
<?php
    include '../layout/header.php';
?>
    <main class="container">
        <h1>Proceso de datos enviados por un form</h1>
    <?php
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        echo 'Tu nombre es: ', $nombre, '<br>';
        echo 'Tu email es: ', $email;

    ?>

    </main>
<?php
    include '../layout/footer.php';
?>

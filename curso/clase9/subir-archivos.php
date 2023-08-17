<?php
include '../layout/header.php';
?>

    <main class="container py-3">
        <h1>Subida archivos</h1>
<?php
    //$archivo = $_POST['archivo'];
    $archivo = $_FILES['archivo'];
    echo '<pre>';
    print_r($archivo);
    echo '</pre>';
?>
nombre: <?= $_FILES['archivo']['name'] ?><br>
peso: <?= $_FILES['archivo']['size'] ?> bytes
<hr>
<?php
    $temp = $_FILES['archivo']['tmp_name'];
    $ruta = 'productos/';
    $extension = pathinfo( $_FILES['archivo']['name'], PATHINFO_EXTENSION );
    $nombre = time().'.'.$extension;
    ##### mover archivo desde /tmp a nuestra carpeta /productos
    move_uploaded_file( $temp, $ruta.$nombre );
?>        

    </main>
<?php
include '../layout/footer.php';
?>
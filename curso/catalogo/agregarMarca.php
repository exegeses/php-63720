<?php
    //require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    $chequeo = agregarMarca( $_POST['mkNombre'] );
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Alta de una marca</h1>

<?php
    $mensaje = 'No se pudo agregar la marca';
    $css = 'danger';
    if ( $chequeo ){
        $mensaje = 'Marca agregada correctamente';
        $css = 'success';
?>        
        <div class="alert alert-<?= $css ?> col-6 mx-auto">
            <?= $mensaje ?>
            <br>
            <a href="adminMarcas.php" class="btn btn-secondary">
                Volver a panel de marcas
            </a>
        </div>
<?php
    }
?>
    </main>

<?php
    include 'layout/footer.php';
?>
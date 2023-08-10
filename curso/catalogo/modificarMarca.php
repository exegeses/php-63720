<?php
    //require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    $chequeo = modificarMarca();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de una marca</h1>

<?php
    $mensaje = 'No se pudo modificar la marca';
    $css = 'danger';
    if ( $chequeo ){
        $mensaje = 'Marca modificada correctamente';
        $css = 'success';
?>        
        <div class="alert alert-<?= $css ?> col-6 mx-auto">
            <?= $mensaje ?>
        </div>
<?php
    }
?>
    </main>

<?php
    include 'layout/footer.php';
?>
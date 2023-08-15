<?php
    //require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    $chequeo = eliminarMarca( $_POST['idMarca'] );
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Baja de una marca</h1>

<?php

    $mensaje = 'No se pudo eliminar la marca';
    $css = 'danger';
    if ( $chequeo ){
        $mensaje = 'Marca eliminada correctamente';
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
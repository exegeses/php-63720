<?php
    //require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/productos.php';
    $chequeo = agregarProducto();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Alta de un producto</h1>

<?php
    $mensaje = 'No se pudo agregar el producto';
    $css = 'danger';
    if ( $chequeo ){
        $mensaje = 'Producto agregado correctamente';
        $css = 'success';
?>        
        <div class="alert alert-<?= $css ?> col-6 mx-auto">
            <?= $mensaje ?>
            <br>
            <a href="adminProductos.php" class="btn btn-secondary">
                Volver a panel de productos
            </a>
        </div>
<?php
    }
?>
    </main>

<?php
    include 'layout/footer.php';
?>
<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
        autenticar();
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $chequeo = modificarClave();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de contraseña</h1>

<?php
    $mensaje = 'No se pudo modificar la contraseña';
    $css = 'danger';
    if ( $chequeo ){
        $mensaje = 'Contraseña modificada correctamente';
        $css = 'success';
?>        
        <div class="alert alert-<?= $css ?> col-6 mx-auto">
            <?= $mensaje ?>
            <br>
            <a href="adminUsuarios.php" class="btn btn-light">
                volver a panel de usuarios
            </a>
        </div>
<?php
    }
?>
    </main>

<?php
    include 'layout/footer.php';
?>
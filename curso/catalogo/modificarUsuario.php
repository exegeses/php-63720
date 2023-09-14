<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
        autenticar();
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $chequeo = modificarUsuario();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de usuario</h1>

<?php
    $mensaje = 'No se pudo modificar el usuario';
    $css = 'danger';
    if ( $chequeo ){
        $mensaje = 'Usuario modificado correctamente';
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
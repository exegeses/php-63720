<?php
    //require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $chequeo = registrarUsuario();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Registro de usuario</h1>

<?php
    $mensaje = 'No se pudo registrar el usuario';
    $css = 'danger';
    if ( $chequeo ){
        $mensaje = 'Usuario registrado correctamente';
        $css = 'success';
?>        
        <div class="alert alert-<?= $css ?> col-6 mx-auto">
            <?= $mensaje ?>
            <br>
        </div>
<?php
    }
?>
    </main>

<?php
    include 'layout/footer.php';
?>
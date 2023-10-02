<?php
    require 'config/config.php';
    require 'funciones/correo.php';
    $check = enviarMail();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container">
        <h1>Formulario de contacto</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
<?php
    $mensaje = 'No se pudo enviar el email';
    if( $check ){
        $mensaje = 'Gracias '.$_POST['nombre'].' por contactarnos';
    }
        echo $mensaje;
?>
        </div>

    </main>

<?php  include 'layout/footer.php';  ?>
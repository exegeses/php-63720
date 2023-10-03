<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $check = mailResetPass();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Reestablecer contraseña</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
<?php
    $mensaje = 'Dirección de correo incorrecta';
    if( $check ){
        $mensaje = "Hemos enviado un email con el 
                    código de verificación, chequee su coreo
                    para cambiar la contraseña."
?>
        <div class="alert text-danger bg-light p-4 col-8 mx-auto shadow">
            <?= $mensaje ?>
        </div>
        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            <form action="formResetPass.php" method="post">
                Ingrese el código enviado <br>
                <input type="text" name="codigo" class="form-control my-3">
                <button class="btn btn-dark">enviar</button>
            </form>
        </div>
<?php
    }
?>
        </div>



    </main>

<?php  include 'layout/footer.php';  ?>
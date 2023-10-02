<?php
    require 'config/config.php';
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Reestablecer contraseña</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            <form action="mailResetPass.php" method="post">

                <label for="usuEmail">Usuario (email)</label>
                <input type="email" name="usuEmail"
                       class='form-control' id="usuEmail" required>
                <br>
                <button class="btn btn-dark my-2 px-4">
                    Enviar
                </button>
            </form>
        </div>

<?php
        $mensaje = 'Dirección de correo incorrecta';
        if( isset($_GET['error']) ){
?>        
        <div class="alert text-danger bg-light p-4 col-8 mx-auto shadow">
            <?= $mensaje ?>
        </div>
<?php
        }
?>

    </main>

<?php  include 'layout/footer.php';  ?>
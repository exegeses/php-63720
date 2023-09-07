<?php
    require 'config/config.php';
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Ingreso a sistema</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            <form action="login.php" method="post">

                <label for="email">Usuario (email)</label>
                <input type="email" name="usuEmail"
                       class='form-control' id="email" required>
                <br>
                <label for="clave">Contraseña</label>
                <input type="password" name="usuClave"
                       class='form-control' id="clave" required>
                <br>
                <button class="btn btn-dark my-2 px-4">
                    Ingresar
                </button>
            </form>
        </div>
<?php
        if( isset($_GET['error']) ){
            $error = $_GET['error'];

            $mensaje = match( $error ){
                '1' => 'Usuario y/o clave incorrectos (o usuario desactivado)',
                '2' => 'Debe loguearse para realizar esta acción'
            };

?>
        <div class="alert bg-light p-4 col-8 text-danger mx-auto shadow">
            <?= $mensaje ?>
        </div>
<?php
        }
?>
    </main>

<?php  include 'layout/footer.php';  ?>
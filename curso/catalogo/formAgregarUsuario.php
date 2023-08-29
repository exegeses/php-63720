<?php
    //require 'config/config.php';
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Registro de usuarios</h1>


        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            <form action="registrarUsuario.php" method="post">

                <div class='form-group mb-2'>
                    <label for="usuNombre">Nombre</label>
                    <input type="text" name="usuNombre"
                           class='form-control' id="usuNombre" required>
                </div>
                <div class='form-group mb-2'>
                    <label for="usuApellido">Apellido</label>
                    <input type="text" name="usuApellido"
                           class='form-control' id="usuApellido" required>
                </div>
                <div class='form-group'>
                    <label for="usuEmail">Email</label>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="email" name="usuEmail"
                               class="form-control" id="usuEmail" required>
                    </div>
                </div>

                <div class='form-group'>
                    <label for="usuClave">Contraseña</label>
                    <input type="password" name="usuClave"
                           class='form-control' id="usuClave" required>
                </div>

                <button class='btn btn-dark my-3 px-4'>Agregar usuario</button>
                <a href="adminUsuarios.php" class='btn btn-outline-secondary'>
                    Volver a panel de usuarios
                </a>
            </form>

        </div>

    </main>

<?php  include 'layout/footer.php';  ?>
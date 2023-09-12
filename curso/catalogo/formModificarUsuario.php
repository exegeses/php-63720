<?php
    require 'config/config.php';
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Modificacíon de un usuario</h1>


        <div class='alert bg-light p-4 col-8 mx-auto shadow-sm'>
            <form action="modificarUsuario.php" method="post">

                <div class='form-group mb-2'>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre"
                           value="<?= 'nombre' ?>"
                           class='form-control' id="nombre" required>
                </div>
                <div class='form-group mb-2'>
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido"
                           value="<?= 'apellido' ?>"
                           class='form-control' id="apellido" required>
                </div>
                <div class='form-group'>
                    <label for="email">Email</label>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="email" name="email"
                               value="<?= 'email' ?>"
                               class="form-control" id="email" required>
                    </div>
                </div>

                <div class='form-group mb-2'>
                    <label for="rol">Rol</label>
                    <select name="idRol" id="rol" class='form-control'>
                        <option value="x">rol</option>
                    </select>
                </div>

                    <input type="hidden" name="idUsuario" value="<?= 'idUsuario' ?>">

                <button class='btn btn-dark my-3 px-4'>Modificación usuario</button>
                <a href="adminUsuarios.php" class='btn btn-outline-secondary'>
                    Volver a panel de usuarios
                </a>
            </form>

        </div>

    </main>

<?php  include 'layout/footer.php';  ?>
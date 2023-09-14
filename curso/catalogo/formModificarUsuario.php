<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
        autenticar();

    require 'funciones/conexion.php';

    if ( $_SESSION['idRol'] == 1 ){
        require 'funciones/roles.php';
        require 'funciones/usuarios.php';
        $roles = listarRoles();
        $usuario = verUsuarioPorID();
    }
    else{
        $usuario['usuNombre'] = $_SESSION['usuNombre'];
        $usuario['usuApellido'] = $_SESSION['usuApellido'];
        $usuario['usuEmail'] = $_SESSION['usuEmail'];
        $usuario['idUsuario'] = $_SESSION['idUsuario'];
        $usuario['idRol'] = $_SESSION['idRol'];
    }
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de un usuario</h1>


        <div class='alert bg-light p-4 col-8 mx-auto shadow-sm'>
            <form action="modificarUsuario.php" method="post">

                <div class='form-group mb-2'>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="usuNombre"
                           value="<?= $usuario['usuNombre']; ?>"
                           class='form-control' id="nombre" required>
                </div>
                <div class='form-group mb-2'>
                    <label for="apellido">Apellido</label>
                    <input type="text" name="usuApellido"
                           value="<?= $usuario['usuApellido']; ?>"
                           class='form-control' id="apellido" required>
                </div>
                <div class='form-group'>
                    <label for="email">Email</label>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="email" name="usuEmail"
                               value="<?= $usuario['usuEmail'] ?>"
                               class="form-control" id="email" required>
                    </div>
                </div>
<?php
     if ( $_SESSION['idRol'] == 1 ){
?>
                <div class='form-group mb-2'>
                    <label for="rol">Rol</label>
                    <select name="idRol" id="rol" class='form-control'>
<?php
            while( $rol = mysqli_fetch_assoc( $roles ) ){
?>
                        <option <?= ( $usuario['idRol'] == $rol['idRol'] )? 'selected':'' ?> value="<?= $rol['idRol'] ?>"><?= $rol['rol'] ?></option>
<?php
            }
?>
                    </select>
                </div>
<?php
     }
?>
                    <input type="hidden" name="idUsuario" value="<?= $usuario['idUsuario'] ?>">

                <button class='btn btn-dark my-3 px-4'>Modificación usuario</button>
                <a href="adminUsuarios.php" class='btn btn-outline-secondary'>
                    Volver a panel de usuarios
                </a>
            </form>

        </div>

    </main>

<?php  include 'layout/footer.php';  ?>
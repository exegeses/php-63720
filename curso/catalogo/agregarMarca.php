<?php
    //require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    $chequeo = agregarMarca( $_POST['mkNombre'] );
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Alta de una marca</h1>

<?php
    if ( $chequeo ){
?>        
        <div class="alert alert-success col-6 mx-auto">
            Marca agregada correctamente
        </div>
<?php
    }else{
?>
        <div class="alert alert-danger col-6 mx-auto">
            No se pudo agregar la marca
        </div>
<?php
    }
?>
    </main>

<?php
    include 'layout/footer.php';
?>
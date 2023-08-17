<?php
include '../layout/header.php';
?>

    <main class="container py-3">
        <h1>Formulario para enviar archivos</h1>

        <div class="alert col-6 shadow mx-auto">
        <form action="subir-archivos.php" method="post" enctype="multipart/form-data">
            <input type="file" name="archivo" class="form-control">
            <button class="btn btn-success">publicar</button>
        </form>
        </div>

    </main>
<?php
include '../layout/footer.php';
?>
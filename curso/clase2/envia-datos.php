<?php
    include '../layout/header.php';
?>
    <main class="container">
        <h1>Formulario de envío</h1>
        <form action="procesa-datos.php" method="post">
            <input type="text" name="nombre"
                   class="form-control">
            <input type="email" name="email"
                   class="form-control">
            <button class="btn btn-dark">enviar</button>
        </form>

    </main>
<?php
    include '../layout/footer.php';
?>
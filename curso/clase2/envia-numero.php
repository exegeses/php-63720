<?php
    include '../layout/header.php';
?>
    <main class="container py-3">
        <h1>Envíe un número</h1>

        <div class="alert col-6 mx-auto shadow">
            <form action="procesa-numero.php" method="post">
                <input type="number" name="numero"
                       class="form-control">
                <button class="btn btn-dark">enviar</button>
            </form>
        </div>

    </main>
<?php
    include '../layout/footer.php';
?>
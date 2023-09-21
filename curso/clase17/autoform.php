<?php
/*$buscar = 'x';
if( isset($_GET['buscar']) ){
    $buscar = $_GET['buscar'];
}*/
$buscar = $_GET['buscar'] ?? 'def';


include '../layout/header.php';
?>

    <main class="container py-3">
        <h1>Autoform</h1>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <input type="text" name="buscar" class="form-control">
            <button class="btn btn-dark">buscar</button>
        </form>

        <div class="col-4 mx-auto p-4 shadow">
            resultado de la búsqueda por: <?= $buscar ?>
        </div>

    </main>
<?php
include '../layout/footer.php';
?>
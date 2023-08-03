<?php
    require 'conectarConServer.php';
    $sql = "SELECT * FROM marcas ORDER BY idMarca";
    $resultado = mysqli_query( $link, $sql );

    include '../layout/header.php';
?>
    <main class="container py-3">
        <h1>Listado de marcas</h1>
<?php
    // función auxiliar para convertir un elemento
    // del objeto a un array asociativo
    while( $marca = mysqli_fetch_assoc($resultado) ){
        echo $marca['idMarca'], ' ', $marca['mkNombre'], '<br>';
    }
?>

    </main>
<?php
    include '../layout/footer.php';
?>
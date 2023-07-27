<?php
include '../layout/header.php';
?>

    <main class="container py-3">
        <h1>Bucles en PHP</h1>

        <select name="anio">
<?php
    $fin = 1960;
    $n = date('Y');
    while( $n >= $fin ){
?>
            <option value="<?= $n ?>"><?= $n ?></option>
<?php
        $n--;
    }
?>
        </select>
    <hr>
<?php
    $marcas = ['Motorolla','Samsung','Xiaomi','iPhone','Nokia','Huawei'];
    $cantidad = count($marcas);
?>
    <ul>
<?php
    for( $i = 0; $i < $cantidad; $i++ ) {
?>
        <li><?= $marcas[$i] ?></li>
<?php
    }
?>
    </ul>
<hr>
        
    <ul>
<?php
        //foreach ( coleccion as auxiliar )
        foreach ( $marcas as $marca ) {
?>        
        <li><?= $marca ?></li>
<?php
        }
?>        
    </ul>
        

    </main>
<?php
include '../layout/footer.php';
?>
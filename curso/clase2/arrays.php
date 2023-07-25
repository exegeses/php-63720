<?php
    include '../layout/header.php';
?>
    <main class="container py-3">
        <h1>Arrays en PHP</h1>
<?php
    $marcas = ['Motorolla','Samsung','Xiaomi','iPhone','Nokia','Huawei'];
    echo $marcas[2];
?>
    <pre>
        <?php
            print_r($marcas);
        ?>
    </pre>

<?php
    $marcas = [
                5 => 'Motorolla',
                'Samsung',
                13 => 'Xiaomi',
                'iPhone',
                'Nokia',
                'Huawei'
               ];
?>
    <pre>
    <?php
        print_r($marcas);
    ?>
    </pre>

<?php
    $marcas = [
                'Motorolla' => 'G5',
                'Samsung' => 'S20Fe',
                'Xiaomi' => 'Mi10',
                'iPhone' => '14 Pro',
                'Nokia' => '1100',
                'Huawei' => 'P8'
              ];
?>
    <pre>
    <?php
        print_r($marcas);
    ?>
    </pre>
    </main>
<?php
    include '../layout/footer.php';
?>
<?php
$locaciones2 =
    [
        'Cambodia'=>'angkor',
        'Turquía'=>'azul',
        'Rusia'=>'basil',
        'Dubai'=>'burj',
        'Italia'=>'colosseo',
        'Chile'=>'easter',
        'Francia'=>'eiffel',
        'Egipto'=>'gizah',
        'Vietnam'=>'ha-long',
        'USA'=>'liberty',
        'Peru'=>'machu',
        'Australia'=>'opera',
        'Tailandia'=>'palace',
        'Jordania'=>'petra',
        'España'=>'sagrada',
        'Grecia'=>'santorini',
        'India'=>'taj',
        'China'=>'wall'
    ];
    include '../layout/header.php';
?>
    <link rel="stylesheet" href="css/styles.css">
    <main class="container py-3">
    <section id="locaciones">
        <h1>Locaciones</h1>
<?php
    foreach ( $locaciones2 as $llave => $valor ){
?>        
        <article>
            <img src="locaciones/<?= $valor ?>.jpg">
            <h2><?= $llave ?></h2>
        </article>
<?php
    }
?>        
    </section>
    </main>
<?php
include '../layout/footer.php';
?>
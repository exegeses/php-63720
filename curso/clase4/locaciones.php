<?php
    $fotos =
        [
            'angkor', 'azul', 'basil', 'burj',
            'colosseo', 'easter', 'eiffel',
            'gizah', 'ha-long', 'liberty',
            'machu', 'opera', 'palace', 'petra',
            'sagrada', 'santorini', 'taj',
            'wall'
        ];
    $paises =
        [
            'Cambodia', 'Turquía', 'Rusia',
            'Dubai', 'Italia', 'Chile',
            'Francia', 'Egipto', 'Vietnam',
            'USA', 'Peru', 'Australia',
            'Tailandia', 'Jordania', 'España',
            'Grecia', 'India', 'China'
        ];
    $descripciones =
        [
            'Angkor Wat, Angkor',
            'Mezquita azul, Estambul',
            'Catedral de San Basilio, Moscu',
            'Burj Khalifa, Dubai',
            'El Coliseo, Roma', 'Isla de Pascua, Chile',
            'Tour Eiffel, París',
            'Gran Pirámide de Guiza, Guiza',
            'Hạ Long Bay, Quang Ninh, Vietnam',
            'Estatua de la Libertad, New York',
            'Machu Picchu, Perú',
            'Opera House, Sydney', 'Grand Palace, Bangkok', 'petra',
            'La Sagrada Familia, Barcelona',
            'Santorini, Archipiélago de las Cícladas',
            'Taj Mahal, Agra',
            'La Gran Muralla, Jinshanling'
        ];
    $cantidad = count($fotos);
    include '../layout/header.php';
?>
    <link rel="stylesheet" href="css/styles.css">
    <main class="container py-3">
        <section id="locaciones">
        <h1>Locaciones</h1>

<?php
    for ( $i = 0; $i < $cantidad; $i++ ){
?>
            <article>
                <img src="locaciones/<?= $fotos[$i] ?>.jpg">
                <h2><?= $paises[$i] ?></h2>
                <p><?= $descripciones[$i] ?></p>
            </article>
<?php
    }
?>

        </section>
    </main>
<?php
    include '../layout/footer.php';
?>
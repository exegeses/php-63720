<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    require 'funciones/categorias.php';
    require 'funciones/productos.php';
    $marcas = listarMarcas();
    $categorias = listarCategorias();
    $productos = buscarProductos( );
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Catálogo de productos</h1>


        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
        <div class="row g-3">
            <div class="col-sm-7">
                <input type="text" name="search" class="form-control" placeholder="Nombre de producto">
            </div>
            <div class="col-sm">
                <select name="idMarca" class="form-select">
                    <option value="0">Todas las Marcas</option>
        <?php
                while ( $marca = mysqli_fetch_assoc($marcas) ){
        ?>
                    <option value="<?= $marca['idMarca'] ?>"><?= $marca['mkNombre'] ?></option>
        <?php
                }
        ?>            
                </select>
            </div>
            <div class="col-sm">
                <select name="idCategoria" class="form-select">
                    <option value="0">Todas las Categoría</option>
        <?php
                while ( $categoria = mysqli_fetch_assoc( $categorias ) ){ 
        ?>            
                    <option value="<?= $categoria['idCategoria'] ?>"><?= $categoria['catNombre'] ?></option>
        <?php
                }
        ?>
                </select>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <button class="btn btn-dark">buscar</button>
        </div>
        </form>

<?php
        if( mysqli_num_rows($productos) == 0 ){
?>
        <div class="row p-3 shadow mt-3">
            No se han encontrado productos por su busqueda realidada:
            <?= $_GET['search'] ?>
        </div>
<?php
        }
?>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 py-5">

<?php
        while ( $producto = mysqli_fetch_assoc( $productos ) ){
?>        
            <article class="col d-flex align-items-start">
                <div class="m-1 producto">
                    <img src="productos/<?= $producto['prdImagen'] ?>">
                    <h2><?= $producto['prdNombre'] ?></h2>
                    <span class="precio">$<?= $producto['prdPrecio'] ?></span>
                    <p>
                        Marca: <?= $producto['mkNombre'] ?> <br>
                        Categoría: <?= $producto['catNombre'] ?> <br>
                    </p>
                </div>
            </article>
<?php
        }
?>

        </div>
        
    </main>
    <script>
        const idMarca = document.querySelector('#idMarca');
        idMarca.addEventListener(
            'change',
            (event) => {
                /*const resultado = document.querySelector(".resultado");
                resultado.textContent = `Te gusta el sabor ${event.target.value}`;*/
                alert('epa!');
                //alert(event.target.value);
            }
        )
    </script>


<?php
    include 'layout/footer.php';
?>
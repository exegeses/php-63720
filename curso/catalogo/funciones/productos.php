<?php

    function listarProductos() : mysqli_result
    {
        $link = conectar();
        $sql = "SELECT *, mkNombre, catNombre 
                    FROM productos p
                    JOIN marcas m 
                      ON p.idMarca = m.idMarca
                    JOIN categorias c 
                      ON c.idCategoria = p.idCategoria";
        $resultado = mysqli_query($link, $sql);
        return  $resultado;
    }

    function subirImagen() : string
    {
        //si no enviaron archivo
        $prdImagen = 'noDisponible.png';

        // si enviaron archivo y esta todo ok
        if( $_FILES['prdImagen']['error'] == 0 ) {
            $temp = $_FILES['prdImagen']['tmp_name'];
            $ruta = 'productos/';
            $extension = pathinfo($_FILES['prdImagen']['name'], PATHINFO_EXTENSION);
            $prdImagen = time() . '.' . $extension;
            ##### mover archivo desde /tmp a nuestra carpeta /productos
            move_uploaded_file($temp, $ruta . $prdImagen);
        }

        return $prdImagen;
    }

    function agregarProducto( ) : bool
    {
        $link = conectar();
        $prdNombre = $_POST['prdNombre'];
        $prdPrecio = $_POST['prdPrecio'];
        $idMarca = $_POST['idMarca'];
        $idCategoria = $_POST['idCategoria'];
        $prdDescripcion = $_POST['prdDescripcion'];
        $prdImagen = subirImagen();

        $sql = "INSERT INTO productos
                    VALUES
                        ( DEFAULT,
                            '".$prdNombre."',
                            ".$prdPrecio.",
                            ".$idMarca.",
                            ".$idCategoria.",
                           '".$prdDescripcion."',
                           '".$prdImagen."',
                          DEFAULT
                         )";
        try {
            $resultado = mysqli_query($link,$sql);
            return $resultado;
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
    }
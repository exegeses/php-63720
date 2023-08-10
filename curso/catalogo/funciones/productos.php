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
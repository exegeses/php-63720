<?php

    function listarCategorias() : mysqli_result
    {
        $link = conectar();
        $sql = "SELECT * FROM categorias";
        $resultado = mysqli_query( $link, $sql );
        return $resultado;
    }

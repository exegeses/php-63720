<?php

    /*######
      *  CRUD de marcas
     * */

    function listarMarcas() : mysqli_result | bool
    {
        $link = conectar();
        $sql = "SELECT * 
                    FROM marcas 
                    ORDER BY idMarca";
        $resultado = mysqli_query( $link, $sql );
        return $resultado;
    }


/*
 *  listarMarcas()
    verMarcaPorID()
    agregarMarca()
    modificarMarca()
    eliminarMarca()
 * */
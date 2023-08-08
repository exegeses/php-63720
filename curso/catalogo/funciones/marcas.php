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

    function agregarMarca( $mkNombre ) : bool
    {
        $link = conectar();
        $sql = "INSERT INTO marcas
                        ( mkNombre )
                    VALUES
                        ( '".$mkNombre."' )";
        try {
            $resultado = mysqli_query( $link, $sql );
            return $resultado; //true
        }
        catch ( Exception $e ){
            //echo $e->getMessage();
            return false;
        }
    }


/*
 *  listarMarcas()
    verMarcaPorID()
    agregarMarca()
    modificarMarca()
    eliminarMarca()
 * */
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

    function verMarcaPorID( string $idMarca ) : array
    {
        $link = conectar();
        $sql = 'SELECT * 
                    FROM marcas
                    WHERE idMarca = '.$idMarca;
        $resultado = mysqli_query($link, $sql);
        return mysqli_fetch_assoc( $resultado );
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

    function modificarMarca() : bool
    {
        $mkNombre = $_POST['mkNombre'];
        $idMarca =  $_POST['idMarca'];

        $link = conectar();
        $sql = "UPDATE marcas 
                    SET mkNombre = '".$mkNombre."'
                    WHERE idMarca = ".$idMarca;
        try {
            $resultado = mysqli_query($link, $sql);
            return $resultado;
        }
        catch ( Exception $e ){
            //echo $e->getMessage();
            return false;
        }
    }


    /**
     * Función para verificar si existen productos
     * asociados a una marca
     * @param string $idMarca
     * @return bool
     */
    function verificarProductoPorMarca( string $idMarca ) : int
    {
        $link = conectar();
        $sql = "SELECT 1 FROM productos
                    WHERE idMarca = ".$idMarca;
        try{
            $resultado = mysqli_query( $link, $sql );
            $cantidad = mysqli_num_rows( $resultado );
            return $cantidad;
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            $cantidad = 0;
            return $cantidad;
        }
    }

    function eliminarMarca( string $idMarca ) : bool
    {
        $link = conectar();
        $sql = "DELETE FROM marcas
                    WHERE idMarca = ".$idMarca;
        try {
            $resultado = mysqli_query( $link,  $sql );
            return $resultado;
        }
        catch ( Exception $e ){
            echo $e->getMessage();
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
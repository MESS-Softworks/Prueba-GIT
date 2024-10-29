<?php

function obtener_peliculas(){
    try{
        //Importar las credenciales
        require 'database.php'; 

        //Consulta SQL 
        $sql = "SELECT * FROM pelicula;";

        //Realizar la consulta
        $consulta = mysqli_query($conexion, $sql);

        //Acceder a los resultados
        return $consulta;


    } catch(\Throwable $th){
        var_dump($th);
    }
}

function obtener_Disponibilidad($idF) {
    try {
        // Importar las credenciales
        require 'database.php';

        // Consulta SQL
        $sql = "SELECT * FROM funcion_asientos WHERE Id_F = $idF;";

        // Realizar la consulta
        $consulta = mysqli_query($conexion, $sql);

        return $consulta;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}

function obtener_Funciones($idPeli){
    try {
        // Importar las credenciales
        require 'database.php';

        // Consulta SQL
        $sql = "SELECT * FROM funcion WHERE Id_Peli = $idPeli;";

        // Realizar la consulta
        $consulta = mysqli_query($conexion, $sql);

        return $consulta;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}



?>
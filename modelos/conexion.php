<?php

class Conexion {

    #static  --- clase
    static public function conectar(){
        #PDO ("nombre del servidor; nombre bd","usuario","contraseña")

        $link = new PDO("mysql:host=167.71.249.82:9001;dbname=clep5fk3f001c9apbhir61qnq","clep5fk3c001a9apb5j319b5a","PSn86q88WHAHwyVgSJ83k7jW");

        $link -> exec("set names utf8");

        return $link;
    }

    function conectar_PostgreSQL( $idRegistro, $pass, $host, $bd )
	{
        $contraseña = "";
        $idRegistro = "parzibyte";
        $nombreBaseDeDatos = "alit_burguer";
        # Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
        $rutaServidor = "127.0.0.1";
        $puerto = "3306";
        $base_de_datos = new PDO("mysql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", 
        $idRegistro, $contraseña);
        $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		

		return $base_de_datos;
	}

    
}
<?php

require_once './datos/ConexionBD.php';

class nivelesCarrera{

		public static function getAll() {
            //Desglosar parámetros JSon

            echo "Hola mundo";
            return
    	    /* select * from NivelesCarrera; */

            //Preparar comando SQL
    	    $comando = "select * from NivelesCarrera";

    	    $sentencia = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($comando);

            //Asigar valores a parámetros
		    // $sentencia->bindParam(1, $correo);

            //Ejecutar sentencia
		    if ($sentencia->execute())
		        return $sentencia->fetch(PDO::FETCH_ASSOC);
		    else
		        return null;

		}

        public static function getId($params) {
            //Desglosar parámetros JSon
            $id = $params->id;
            return $id;
           
            /* select * from NivelesCarrera; */

            //Preparar comando SQL
            $comando = "select * from NivelesCarrera where id = ?";
            $comando = "select * from NivelesCarrera where id = :id";
            

            $sentencia = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($comando);

            //Asigar valores a parámetros
            $sentencia->bindParam(1, $id);
            //$sentencia->bindParam(2, $val);
            //$sentencia->bindParam(3, $val);
            $sentencia->bindParam('id', $$id, PDO::PARAM_INT);

        

            //Ejecutar sentencia
            if ($sentencia->execute())
                return $sentencia->fetch(PDO::FETCH_ASSOC);
            else
                return null;

        }

        public static function getMany($params) {
            //Desglosar parámetros JSon
            $id = $params->id;

            /* select * from NivelesCarrera; */

            //Preparar comando SQL
            $comando = "select * from NivelesCarrera where id = ?";
            $comando = "select * from NivelesCarrera where id = :id";
            

            $sentencia = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($comando);

            //Asigar valores a parámetros
            $sentencia->bindParam(1, $id);
            //$sentencia->bindParam(2, $val);
            //$sentencia->bindParam(3, $val);
            $sentencia->bindParam('id', $$id, PDO::PARAM_INT);

        

            //Ejecutar sentencia
            if ($sentencia->execute())
                return $sentencia->fetch(PDO::FETCH_ASSOC);
            else
                return null;

        }
 }




/*

	 private function obtenerUsuarioPorCorreo($correo)
{
    $comando = "SELECT " .
        self::NOMBRE . "," .
        self::CONTRASENA . "," .
        self::CORREO . "," .
        self::CLAVE_API .
        " FROM " . self::NOMBRE_TABLA .
        " WHERE " . self::CORREO . "=?";

    $sentencia = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($comando);

    $sentencia->bindParam(1, $correo);

    if ($sentencia->execute())
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    else
        return null;
}

*/
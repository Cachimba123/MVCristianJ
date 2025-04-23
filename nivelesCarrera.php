<?php

require_once './datos/ConexionBD.php';

class nivelesCarrera{

		public static function getAll() {
            //Desglosar parámetros JSon
    	    /* select * from NivelesCarrera; */

            //Preparar comando SQL
    	    $comando = "select * from nivelescarrera";

    	    $sentencia = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($comando);

            //Asigar valores a parámetros
		    // $sentencia->bindParam(1, $correo);

            //Ejecutar sentencia
		    if ($sentencia->execute())
                return $sentencia->fetchAll(PDO::FETCH_ASSOC);
		    else
		        return null;

		}

        public static function getId($params) {
            //Desglosar parámetros JSon
            $id = $params[0];
            /* select * from NivelesCarrera; */

            //Preparar comando SQL
            // $comando = "select * from NivelesCarrera where id = ?";
            $comando = "select * from nivelescarrera where id = ?";
            

            $sentencia = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($comando);

            //Asigar valores a parámetros
            $sentencia->bindParam(1, $id);
            //$sentencia->bindParam(2, $val);
            //$sentencia->bindParam(3, $val);
            // $sentencia->bindParam('id', $id, PDO::PARAM_INT);

        

            //Ejecutar sentencia
            if ($sentencia->execute())
                return $sentencia->fetch(PDO::FETCH_ASSOC);
            else
                return null;

        }

        public static function getMany($id1, $id2) {
            //Desglosar parámetros JSon
            /* $id1 = $params[0];
            $id2 = $params[1]; */
            /* select * from NivelesCarrera; */

            //Preparar comando SQL
            $comando = "select * from NivelesCarrera where id = ? or id = ?";
            // $comando = "select * from NivelesCarrera where id = :id";
            
            $sentencia = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($comando);

            //Asigar valores a parámetros
            $sentencia->bindParam(1, $id1);
            $sentencia->bindParam(2, $id2);
            //$sentencia->bindParam(3, $val);
            // $sentencia->bindParam('id', $id, PDO::PARAM_INT);

        

            //Ejecutar sentencia
            if ($sentencia->execute()){
                    while($nivel=$sentencia->fetch(PDO::FETCH_ASSOC)){
                        echo "ID: " . $nivel['id'] . " - Nombre: " . $nivel['nombre'] . "<br>";
                    }
                    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            }
            else
                return null;

        }

        public static function postNivelCarrera($body){
            //Desglosar parámetros JSon
            $nombre=$body->nombre;
            /* select * from NivelesCarrera; */

            //Preparar comando SQL
            $comando = "insert into nivelescarrera (nombre) values (?)";
            // $comando = "select * from NivelesCarrera where id = :id";
            
            $sentencia = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($comando);

            //Asigar valores a parámetros
            $sentencia->bindParam(1, $nombre);
            //$sentencia->bindParam(3, $val);
            // $sentencia->bindParam('id', $id, PDO::PARAM_INT);

        

            //Ejecutar sentencia
            if ($sentencia->execute()){
                    $id=ConexionBD::obtenerInstancia()->obtenerBD()->lastInsertId();
                    return [
                        'status' => 'success',
                        'message' => 'Nivel de carrera creado exitosamente'
                    ];
            }
            else
                return null;

        }

        public static function putNivelesCarrera($id,$body){
            //Desglosar parámetros JSon
            $nombre=$body->nombre;
            /* select * from NivelesCarrera; */

            //Preparar comando SQL
            $comando = "update nivelescarrera set nombre = ? where id = ?";
            // $comando = "select * from NivelesCarrera where id = :id";
            
            $sentencia = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($comando);

            //Asigar valores a parámetros
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $id);
            // $sentencia->bindParam('id', $id, PDO::PARAM_INT);

        

            //Ejecutar sentencia
            if ($sentencia->execute()){
                    $id=ConexionBD::obtenerInstancia()->obtenerBD()->lastInsertId();
                    return [
                        'status' => 'success',
                        'message' => 'Nivel de carrera modificado exitosamente'
                    ];
            }
            else
                return null;

        }

        public static function deleteNivelesCarrera($id) {
            //Desglosar parámetros JSon
            /* $id1 = $params[0];
            $id2 = $params[1]; */
            /* select * from NivelesCarrera; */

            //Preparar comando SQL
            $comando = "delete from nivelescarrera where id = ?";
            // $comando = "select * from NivelesCarrera where id = :id";
            
            $sentencia = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($comando);

            //Asigar valores a parámetros
            $sentencia->bindParam(1, $id);
            //$sentencia->bindParam(3, $val);
            // $sentencia->bindParam('id', $id, PDO::PARAM_INT);

        

            //Ejecutar sentencia
            if ($sentencia->execute()){
/*                     while($nivel=$sentencia->fetch(PDO::FETCH_ASSOC)){
                        echo "ID: " . $nivel['id'] . " - Nombre: " . $nivel['nombre'] . "<br>";
                    } */
                    return $sentencia->fetch(PDO::FETCH_ASSOC);
            }
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
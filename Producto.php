<?php
	class producto{
		// property declaration
	    public $var = 'a default value';

	    	    // method declaration

	    //-------------------------------
	    //No se puede sobrecargar métodos en php

	    /*
	    public static function get($id) {
	        echo "Ejecutaste persona::get({$id})";
	    }
	    
	    public static function get($idIni, $idFin) {
	        echo "Ejecutaste persona::get({$id})";
	    }

	    public static function get() {
	        echo "Ejecutaste persona::get({$id})";
	    }
		*/

	    //-----------------

	    public static function getId($id) {
	        echo "Ejecutaste producto::getId({$id})";
	    }
	    
	    public static function getMany($idIni, $idFin) {
	        echo "Ejecutaste producto::getMany({$idIni} {$idFin})";
	    }

	    public static function getAll() {
	        echo "Ejecutaste producto::getAll()";
	    }

	    // Otro escenario: Un método único get que recibe un solo parámetro de tipo array

	    /*
	    public static function get($arrayparams) {

	    	if (count($arrayparams) == 0)
					self::getAll();
				else  
					if (count($arrayparams) == 1)
						self::getId($parameters[0]);
					else
						if (count($arrayparams) == 2)
							self::getMany($parameters[0], $parameters[1]);
						//else return;
							
	        echo "Ejecutaste persona::get({$id})";
	    }
	    */

	}
?>


















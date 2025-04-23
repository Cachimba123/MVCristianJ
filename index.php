<?php

	/***
	 * Modificar el código para que las funciones sean métodos de una clase llamada Producto.
	 * Usar una función php para llamar al método correspondiente de la clase Producto,
	 * dependiendo del método http usado en la solicitud. Ejemplo:
	 * 
	 *     Petición				|		Método a ejecutar
	 * -------------------------------------------------------------
	 * GET localhost/producto/1       	Producto::get(10) 
	 * POST localhost/producto/		  	Producto::post({"id":2, "nombre":"laptop", "precio":10000})
	 *  body: 
	 * 		{"id":2, 
	 * 		 "nombre":"laptop", 
	 * 		 "precio":10000}
	 * 
	 * PUT localhost/producto/		  	Producto::post({"id":2, "nombre":"Computadora de escritorio", "precio":15000})
	 *  body: 
	 * 		{"id":2, 
	 * 		 "nombre":"Computadora de escritorio", 
	 * 		 "precio":15000}
	 * 
	 * DELETE localhost/producto/2    	Producto::delete(2) 
	 */

	include_once('Producto.php');
	include_once('nivelesCarrera.php');
	

	$recursos_validos = array('producto', 'persona', 'nivelesCarrera');
	echo "Hola mundo<br/>";
	echo $_GET['PATH_INFO'];
	echo "<br/> {$_SERVER['REQUEST_METHOD'] } ";


	$parameters = explode('/',$_GET['PATH_INFO']);
	$recurso = $parameters[0];
	//valido si el recurso es válido
	//if (!($recurso in $recursos_validos))
	//	exit(0);

	$parameters = array_slice($parameters, 1);

	//$recurso = array_shift($parameters);
	//echo "<br/><br/>" . $parameters . '<br/>';
	//print_r($parameters);

	echo "<br/><br/>";
    print_r($parameters);
	echo "<br/><br/>";

	$request_method = strtolower($_SERVER['REQUEST_METHOD']);

	echo "<hr><br/><br/>"; 

	function getproducto($id){
		return "<br/>Se ejecutó getproducto: {$id} <br/>";
	}

	function postproducto($obj){
		return "<br/>Se ejecutó postproducto <br/>";
	}

	function deleteproducto($id){
		return "<br/>Se ejecutó deleteproducto <br/>";
	}

	function putproducto($obj){
		return "<br/>Se ejecutó putproducto <br/>";
	}
	

/* 	$resultado = call_user_func(strtolower($request_method . $recurso), $parameters[0]);

	echo $resultado . "<br />"; */

/*
	
	if (method_exists($recurso, $request_method)) {
		$resultado = call_user_func(array($recurso, $request_method), $parameters[0]);

		
		//	GET localhost:8080/producto/2/3
	
		$nombre_clase = $recurso;   //$recurso='producto'
		$nombre_clase::$request_method($parameters[0]);
		//    producto::get(2);

	}
*/


	echo "<br /> parameters[0]" . $parameters[0];
	echo "<br /> isset: " . isset($parameters); 
	echo "<br /> isnull: " . is_null($parameters);
	echo "<br /> empty: " . empty($parameters);
	echo "<br /> count: " . count($parameters)  . "<br />";

	print "validar con empty: ";
	print empty($parameters) ? "verdadero" : "falso";
	print "<br />";

	print "validar con isnull: ";
	print is_null($parameters) ? "verdadero" : "falso";
	print "<br />";


/*
get localhost/producto/par1/par2
pathinfo = producto/par1/par2
$recurso = producto
$parameters [par1, par2]
*/

	$nombre_clase = $recurso;  

	switch ($request_method){
		case 'get': {
			if (count($parameters) == 0)
				 print_r($nombre_clase::getAll());
			else  
				if (count($parameters) == 1)
					print_r($nombre_clase::getId($parameters[0]));
				else
					if (count($parameters) == 2)
						print_r($nombre_clase::getMany($parameters[0], $parameters[1]));
					else
						exit(1);
			break;
		}
		case 'post':{
			$body= file_get_contents('php://input');
			try {
				$body = json_decode($body, false, 512, JSON_THROW_ON_ERROR);
			} catch (JsonException $e) {
				http_response_code(400);
				echo "JSON inválido: " . $e->getMessage();
				exit;
			}
			print_r($nombre_clase::postNivelCarrera($body));
			break;
		}
		case 'put': {
			$body= file_get_contents('php://input');
			try {
				$body = json_decode($body, false, 512, JSON_THROW_ON_ERROR);
			} catch (JsonException $e) {
				http_response_code(400);
				echo "JSON inválido: " . $e->getMessage();
				exit;
			}

			if(count($parameters) == 1)
				print_r($nombre_clase::putNivelesCarrera($parameters[0],$body));
			break;
		}
		case 'delete': {
			if(count($parameters) == 1)
				print_r($nombre_clase::deleteNivelesCarrera($parameters[0]));
			else
				exit(1);
			break;
		}
		default:{

		}

	} //switch

	/*
	//$resultado = call_user_func_array('modificar_variable_global', array(&$mi_variable_global, 2));
	


	$mi_variable_global = 10;
 
	// definimos una función que modificará la variable global
	function modificar_variable_global(&$variable, $otro_parametro) {
		$variable = $variable * $otro_parametro; 

		//global $mi_variable_global;
		$mi_variable_global = 15;

		return "Valor retornado: " . $mi_variable_global;
	}

	// llamamos a la función pasando como referencia la variable global
	//$resultado = modificar_variable_global($mi_variable_global, 2);

	//$resultado = call_user_func('modificar_variable_global', &$mi_variable_global, 2);

	// imprimimos la variable global
	//echo $mi_variable_global; // salida: 20

	*/
?> 
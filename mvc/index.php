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

	require_once 'Producto.php';

	echo "Hola mundo<br/>";
	
	// Capturar la ruta desde PATH_INFO
	$path_info = $_GET['PATH_INFO'] ?? '';

	// Dividir la URL
	$parameters = explode('/', trim($path_info, '/'));

	$recurso = $parameters[0] ?? null;
	$id = $parameters[1] ?? null;

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$data = file_get_contents("php://input");
	$body = json_decode($data, true);

	echo "<br> Método: {$requestMethod} ";
	echo "<br> Recurso: {$recurso} ";
	echo "<br> ID: {$id} ";
	echo "<hr><br><br>";

	$producto = new Producto();

	if ($recurso === 'producto') {

		$resultado = null;

		if ($requestMethod === 'GET' && $id) {

			$resultado = $producto->get($id);

		} elseif ($requestMethod === 'POST' && $body) {

			$resultado = $producto->post($body);

		} elseif ($requestMethod === 'PUT' && $body) {

			$resultado = $producto->put($body);

		} elseif ($requestMethod === 'DELETE' && $id) {

			$resultado = $producto->delete($id);

		} else {

			$resultado = "Solicitud incorrecta";

		}

		echo $resultado . "<br>";
		
	} else {

		echo "Recurso no encontrado <br>";

	}

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
<?php
echo "Hola mundo<br/>";
echo $_GET['PATH_INFO'];
echo "<br> {$_SERVER['REQUEST_METHOD']}";


	echo "<br><br><br>";

	$mi_variable_global = 10;

	function modificar_variable_global($variable, $otro_parametro){

		global $mi_variable_global;

		$mi_variable_global = $mi_variable_global * $otro_parametro;

	 }

	// llamamos a la función como referencia de variable global
	modificar_variable_global($mi_variable_global, 2);

	echo $mi_variable_global;

?>
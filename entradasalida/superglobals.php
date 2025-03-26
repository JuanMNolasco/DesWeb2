<?php

//Generar una respuesta http (Response)
	http_response_code(404);
	//header('Location: http://www.locahost:8080');

	header('Content-Description: File Transfer');
	header('Content-Type: text/html');
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: 0');
	//header('Content-Length: 1024');
	header('Pragma: public');


//Leer datos de la peticion http (Request)
	echo '¡Hola ' . htmlspecialchars($_GET["nombre"]) . " " .htmlspecialchars($_GET["apPaterno"]) . '! <br/>';

	if (isset($_POST["profesion"]) && isset($_POST["edad"])) {
		echo '¡Hola ' . htmlspecialchars($_POST["profesion"]) . " " .htmlspecialchars($_POST["edad"]) . '! <br/>';
	}

	echo 'Body: ' . file_get_contents('php://input');
	print("<br/><br/>");

	//Cómo leer los headers de la peticion http
	print("Impresión de apache_request_headers<br/>");
	$headers = apache_request_headers();

	foreach ($headers as $header => $value) {
	    echo "$header: $value <br />\n";
	}
	print("<br/><br/>");

	print("Impresión de getallheaders<br/>");
	foreach (getallheaders() as $nombre => $valor) {
	    echo "$nombre: $valor<br />\n";
	}

	//Superglobals
	print("<br/><br/>");
	print('$_REQUEST: <br/>');
	print_r($_REQUEST);
	print("<br/>");

	foreach ($_REQUEST as $llave => $valor) {
	    echo "$llave: $valor<br/>";
	}

	print("<br/><br/>");
	print('$GLOBALS: <br/>');
	//print_r($GLOBALS);
	
	foreach ($GLOBALS as $llave => $valor) {
	    echo "$llave: ";
	    print_r($valor);
	    echo("<br/>");
	}

	print("<br/><br/><br/>");
	
	print("\$_SERVER: <br/>");
	//var_dump($_SERVER);
	//print("<br/><br/><br/>");
	//print_r($_SERVER);
	foreach ($_SERVER as $llave => $valor) {
	    echo "$llave: $valor<br/>";
	}


?>


















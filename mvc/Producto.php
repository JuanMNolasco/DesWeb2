<?php

	class Producto {

		// property declaration
	    public $var = 'a default value';

	    // method declaration
	    public function displayVar() {

	        echo $this->var;

	     }

	    public function get($id) {

	        return "<br/>Se ejecutó GET producto con ID: {$id} <br/>";

	     }

	    public function post($obj) {

	        return "<br/>Se ejecutó POST producto con datos: " . json_encode($obj) . "<br/>";

	     }

	    public function put($obj) {

	        return "<br/>Se ejecutó PUT producto con datos: " . json_encode($obj) . "<br/>";

	     }

	    public function delete($id) {

	        return "<br/>Se ejecutó DELETE producto con ID: {$id} <br/>";

	     }
	}

 ?>

















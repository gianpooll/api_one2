<?php

if (isset($_GET['ruta'])) {
	$url = explode('/', $_GET['ruta']);
	$listaUrl = ['auth', 'user'];
	$file = dirname(__DIR__) . "/src/Routes/" . $url[0] . ".php";
	if (!in_array($url[0], $listaUrl)) {
		echo "La ruta no existe";
		exit;
	}else{
		if (file_exists($file)) {
			require_once $file;
			exit;
		}else {
			echo "El archivo no existe";
		}
		//print_r($file);
	}
	
}else{
	echo "Ruta no existe";
}
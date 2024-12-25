<?php

use App\Config\ErrorLog;
use App\Config\ResponseHttp;

require_once dirname(__DIR__) . "/vendor/autoload.php";

ErrorLog::activateErrorLog();

if (isset($_GET['ruta'])) {
	$url = explode('/', $_GET['ruta']);
	$listaUrl = ['auth', 'user'];
	$file = dirname(__DIR__) . "/src/Routes/" . $url[0] . ".php";
	if (!in_array($url[0], $listaUrl)) {
		echo json_encode(ResponseHttp::estado400());
		exit;
	}else{
		if (file_exists($file)) {
			require_once $file;
			exit;
		}else {
			echo json_encode(ResponseHttp::estado400());
		}
		//print_r($file);
	}
	
}else{
	echo json_encode(ResponseHttp::estado400());
}
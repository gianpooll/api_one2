<?php

namespace App\DB;
use PDO;
use PDOException;
use App\Config\ResponseHttp;

require_once __DIR__.'/DataDb.php';

class ConexionDb {

	private static $host;
	private static $user;
	private static $password;

	final public static function from($host, $user, $password){
		self::$host =				$host;
		self::$user =				$user;
		self::$password =		$password;
	}

	final public static function getConect(){
		try {
			$opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
			$pdo = new PDO(self::$host, self::$user, self::$password, $opt);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			error_log("Conexión exitosa");
			return $pdo;
		} catch (PDOException $e) {
			error_log("Error en la conexión: ".$e->getMessage());
			die(json_encode(ResponseHttp::estado500()));
		}
	}

}
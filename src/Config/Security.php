<?php

namespace App\Config;

use Dotenv\Dotenv;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class Security {

	private static $jwt_data;

	final public static function secretKey(){
		$dotenv = Dotenv::createImmutable(dirname(__DIR__,2));
		$dotenv->load();
		return $_ENV['SECRET_KEY'];
	}

	final public static function createPassword(string $pw){
		$pass = password_hash($pw, PASSWORD_DEFAULT);
		return $pass;
	}

	final public static function verifyPassword(string $pw, string $hash){
		if (password_verify($pw, $hash)) {
			return true;
		} else {
			error_log("La contraseña no coincide");
			return false;
		}	
	}

	final public static function createToken(string $key, array $data){
		$payload = [
			"iss" => "http://example.org",
			"aud" => "http://example.com",
			"iat" => 1356999524,
			"nbf" => 1357000000,
			"exp" => 1357000000 + 3600,
			'data' => $data
		];
		$jwt = JWT::encode($payload, $key, 'HS256');
		return $jwt;
	}

	final public static function verifyToken(array $token, string $key){
		if (!isset($token['autorization'])) {
			die(json_encode(ResponseHttp::estado400()));
		} else {
			try {
				$jwt = explode(" ", $token['autorization']);
				$data = JWT::decode($jwt[1], new Key($key, 'HS256'));
				self::$jwt_data = $data;
				return $data;
				exit();
			} catch (\Exception $th) {
				error_log("Error en el token: ".$th->getMessage());
				die(json_encode(ResponseHttp::estado401('Token no válido')));
			}
		}		
	}

	final public static function getJwtData(){
		$jwt_decode_array = json_decode(json_encode(self::$jwt_data), true);
		return $jwt_decode_array['data'];
	}

}
<?php

namespace App\Config;

class ResponseHttp {

	public static $mensaje = array(
		'estado' => '',
		'mensaje' => ''
	);

	final public static function estado200(string $res) {
		http_response_code(200);
		self::$mensaje['estado'] = 'Ok';
		self::$mensaje['mensaje'] = $res;
		return self::$mensaje;
	}

	final public static function estado201(string $res = 'Recurso creado') {
		http_response_code(201);
		self::$mensaje['estado'] = 'Created';
		self::$mensaje['mensaje'] = $res;
		return self::$mensaje;
	}

	final public static function estado400(string $res = 'Solicitud incorrecta') {
		http_response_code(400);
		self::$mensaje['estado'] = 'Bad Request';
		self::$mensaje['mensaje'] = $res;
		return self::$mensaje;
	}

	final public static function estado401(string $res = 'No autorizado') {
		http_response_code(401);
		self::$mensaje['estado'] = 'Unauthorized';
		self::$mensaje['mensaje'] = $res;
		return self::$mensaje;
	}

	final public static function estado403(string $res = 'Prohibido') {
		http_response_code(403);
		self::$mensaje['estado'] = 'Forbidden';
		self::$mensaje['mensaje'] = $res;
		return self::$mensaje;
	}

	final public static function estado404(string $res = 'No encontrado') {
		http_response_code(404);
		self::$mensaje['estado'] = 'Not Found';
		self::$mensaje['mensaje'] = $res;
		return self::$mensaje;
	}

	final public static function estado405(string $res = 'Método no permitido') {
		http_response_code(405);
		self::$mensaje['estado'] = 'Method Not Allowed';
		self::$mensaje['mensaje'] = $res;
		return self::$mensaje;
	}

	final public static function estado500(string $res = 'Error interno del servidor') {
		http_response_code(500);
		self::$mensaje['estado'] = 'Internal Server Error';
		self::$mensaje['mensaje'] = $res;
		return self::$mensaje;
	}
}
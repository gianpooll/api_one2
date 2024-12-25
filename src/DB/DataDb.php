<?php

use App\DB\ConexionDb;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__,2));
$dotenv->load();

$data = array(
	'host' => $_ENV['HOST'],
	'user' => $_ENV['USER'],
	'password' => $_ENV['PASSWORD'],
	'db' => $_ENV['DB'],
	'port' => $_ENV['PORT']
);

$host = 'mysql:host='.$data['host'].';dbname='.$data['db'].';port='.$data['port'];

ConexionDb::from($host, $data['user'], $data['password']);
<?php

use App\Config\Security;
use App\DB\ConexionDb;

//echo json_encode(Security::secretKey());
//echo "\n";
//echo json_encode(Security::createPassword('123456'));
//echo "\n";
//$pass = Security::createPassword('123456');

/* if (Security::verifyPassword('123456', $pass)) {
	echo json_encode("Contraseña correcta");
} else {
	echo json_encode("Contraseña incorrecta");
}

echo "\n"; */	

//echo json_encode(Security::createToken(Security::secretKey(), ['id' => 1, 'name' => 'Juan']));

ConexionDb::getConect();

<?php
/**
 * Get the client
 */
require_once __DIR__ . '/rest-php-sdk-master/src/autoload.php';

/**
 * Define configuration
 */

/* Username, password and endpoint used for server to server web-service calls */
//(En el Back Office) Copiar Usuario
Lyra\Client::setDefaultUsername("XXXXXXXX");
//(En el Back Office) Copiar Contraseña de test
Lyra\Client::setDefaultPassword("testpassword_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
//(En el Back Office) Copiar Contraseña de Nombre del servidor API REST
Lyra\Client::setDefaultEndpoint("https://api.micuentaweb.pe");

/* publicKey and used by the javascript client */
//(En el Back Office) Copiar Clave pública de test
Lyra\Client::setDefaultPublicKey("XXXXXXXX:testpublickey_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");

/* SHA256 key */
//(En el Back Office) Clave HMAC-SHA-256 de test
Lyra\Client::setDefaultSHA256Key("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
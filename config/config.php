<?php
// Initialisation des constantes permettant la connexion à la bdd
// dsn = Data Source Name

define('DSN', 'mysql:host=localhost;dbname=zzzhospital;charset=utf8_general_ci');
define('LOGIN', 'zzz');
define('PASSWORD', 'zzz');


define('REGEX_NO_NUMBER',"^[A-Za-z-éèêëàâäôöûüç' ]+$");
// define('REGEX_ZIPCODE','^[0-9]{5}$');
// define('REGEX_LINKEDIN','^(https:\/\/)?((www\.|fr\.)?([a-zA-Z0-9\.\/=\?\-]*))$');
define('REGEX_DATE','^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$');
// define('REGEX_TEXTAREA','^[a-zA-Z\n\r]*$');

define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);

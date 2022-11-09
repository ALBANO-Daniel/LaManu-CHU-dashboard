<?php
// Initialisation des constantes permettant la connexion à la bdd
// dsn = Data Source Name
session_start();
require_once(__DIR__ . '/../helpers/SessionFlash.php');
// add class of session flash..


define('DSN', 'mysql:host=localhost;dbname=zzzhospital;charset=utf8');
define('LOGIN', 'zzz');
define('PASSWORD', 'zzz');


define('REGEX_NO_NUMBER',"^[A-Za-z-éèêëàâäôöûüç' ]+$");
define('REGEX_ONLY_NUMBER','^[0-9]*$');
// define('REGEX_ZIPCODE','^[0-9]{5}$');
// define('REGEX_LINKEDIN','^(https:\/\/)?((www\.|fr\.)?([a-zA-Z0-9\.\/=\?\-]*))$');
define('REGEX_DATE','^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$');
// define('REGEX_TEXTAREA','^[a-zA-Z\n\r]*$');

define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);


                                                                //
//  translate TIME obj
$formatLongFR = new IntlDateFormatter(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    null,
    null,
    "'LE' dd LLLL Y 'a' HH (EEEE)"
);

            //named arg.. PHP 8
            // $formatShortFR = new IntlDateFormatter(
                // locale: 'fr_FR',
                // pattern: "dd LLLL Y"
            // );

$formatShortFR = new IntlDateFormatter(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    null,
    null,
    'dd LLLL Y'
);
// to make capitalize inside regex time
// "'le' dd '<span class=\"up\"> 'LLLL'</span> ..." 
                                                                //


<?php 
// date_default_timezone_set('Europe/Istanbul');
try {

    $db= new PDO("mysql:host=127.0.0.1; dbname=game", 'gamedb', 'gamepw');
    $db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");


// echo "veritabanı bağlantısı başarılı";
}

catch (PDOExpception $e) {


    echo $e->getMessage();
}

?>


<?php
header('Content-Type: text/html; Charset=UTF-8');
date_default_timezone_set('Europe/Istanbul');

define('MYSQL_HOST',	'37.247.108.143');
define('MYSQL_DB',		'zetas_ucp');
define('MYSQL_USER',	'eastlandrp');
define('MYSQL_PASS',	'80*65djmQ');

include 'db.php';

?>
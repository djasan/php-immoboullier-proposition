<?php
require 'config/dbConfig.php';

//$dsn = "mysql:host=" . DBHOST .";dbname=" . DBNAME . ";charset:" . DBCHARSET . "";//
$dsn = 'mysql:host=' . DBHOST .';dbname=' . DBNAME . ';charset:' . DBCHARSET . '';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$connexion = new PDO($dsn,DBUSERNAME,DBUSERPASSWORD,$options);
<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

date_default_timezone_set('Asia/Kolkata');

$SERVER = "remotemysql.com";
$USER = "hqa6wWo6nN";
$PASSWORD = "hGXrEsdF3P";
$DBNAME = "hqa6wWo6nN";


$conn = new mysqli($SERVER,$USER,$PASSWORD,$DBNAME) OR die("Connection Problems") ;

?>
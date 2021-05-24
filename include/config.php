<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

date_default_timezone_set('Asia/Kolkata');

$SERVER = "remotemysql.com";
$USER = "URPPIcJUN1";
$PASSWORD = "Hk4ou5T01K";
$DBNAME = "URPPIcJUN1";


$conn = new mysqli($SERVER,$USER,$PASSWORD,$DBNAME) OR die("Connection Problems") ;

?>
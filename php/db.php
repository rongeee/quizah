<?php

$db_server = "localhost";
$db_database = "tehvogww_ron";
$db_username = "tehvogww_ron";
$db_password = 'QvNds6JTjQhPt3P';

$dsn = "mysql:host=$db_server;dbname=$db_database;charset=utf8";
try {
  $pdo = new PDO($dsn, $db_username, $db_password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e->getMessage();
}
<?php

$db_server = "localhost";
$db_database = "quizah";
$db_username = "root";
$db_password = 'root';

$dsn = "mysql:host=$db_server;dbname=$db_database;charset=utf8";
try {
  $pdo = new PDO($dsn, $db_username, $db_password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e->getMessage();
}
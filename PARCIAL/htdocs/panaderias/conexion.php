<?php

$server = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'BDS_Final';

try {
  $pdo = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
?>
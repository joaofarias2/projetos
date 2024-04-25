<?php

$host = 'localhost';
$db_name = 'mercearia';
$username = 'root';
$password = '1234567';

require_once 'Database.php';

$database = new Database($host, $db_name, $username, $password);
$conn = $database->connect();
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

function getDatabaseConnection($connConfig)
{
    try {
        $dsn = "mysql:host={$connConfig['ip']};dbname={$connConfig['dbname']};charset=utf8mb4";
        return new PDO($dsn, $connConfig['user'], $connConfig['pass'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
if(!isset($databaseConfig)) {
    $databaseConfig = ['ip' => "localhost", 'dbname' => "web_nro", 'user' => "root", 'pass' => "88888888"];
}

$conn = getDatabaseConnection($databaseConfig);
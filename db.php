<?php
require_once 'env.php';

$db_connection = DB_CONNECTION;
$db_name       = DB_DATABASE;
$db_host       = DB_HOST;
$db_port       = DB_PORT;
$db_user       = DB_USERNAME;
$db_password   = DB_PASSWORD;
$db_charset    = DB_CHARSET;
$dsn = "{$db_connection}:dbname={$db_name};host={$db_host};port={$db_port};charset={$db_charset};";

$pdo = null;

try {
    $pdo = new PDO($dsn, $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
    exit;
}

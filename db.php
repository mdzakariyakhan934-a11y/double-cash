<?php
session_start();

$host = "mysql-2298e29e-mdzakariyakhan934-d309.k.aivencloud.com";
$user = "avnadmin";
$pass = "AVNS_ilLzevUpr3em0mhq4PL";
$dbname = "defaultdb";
$port = 18484;

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>

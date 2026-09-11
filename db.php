<?php
session_start();

$host = "mysql-2298e29e-mdzakariyakhan934-d309.k.aivencloud.com";
$user = "avnadmin";
$pass = "AVNS_ilLzevUpr3em0mhq4PL";
$dbname = "defaultdb";
$port = 18484; // আপনার Aiven-এর বর্তমান Port

$conn = mysqli_init();
$conn->ssl_set(NULL, NULL, NULL, NULL, NULL);
$conn->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);

if (!$conn->real_connect($host, $user, $pass, $dbname, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>

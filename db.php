<?php
session_start();

$host = "mysql-2298e29e-mdzakariyakhan934-d309.k.aivencloud.com";
$user = "avnadmin";
$pass = "AVNS_ilLzevUpr3em0mhq4PL";
$dbname = "defaultdb";
$port = 18480;

$conn = mysqli_init();
$conn->options(MYSQLI_OPT_CONNECT_TIMEOUT, 10);
$conn->ssl_set(NULL, NULL, NULL, NULL, NULL);

if (!$conn->real_connect($host, $user, $pass, $dbname, $port, NULL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT)) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>

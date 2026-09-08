<?php
session_start();

$host = "mysql-2298e29e-mdzakariyakhan934-d309.k.aivencloud.com;
$user = "your_db_user"avnadmin;     // আপনার ডাটাবেস ইউজারনেম
$pass = "your_db_password"AVNS_ilLzevUpr3em0mhq4PL; // আপনার ডাটাবেস পাসওয়ার্ড
$dbname = "your_db_name"defaultdb;   // আপনার ডাটাবেসের নাম

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>

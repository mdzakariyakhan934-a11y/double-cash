<?php
session_start();

$host = "localhost";
$user = "your_db_user";     // আপনার ডাটাবেস ইউজারনেম
$pass = "your_db_password"; // আপনার ডাটাবেস পাসওয়ার্ড
$dbname = "your_db_name";   // আপনার ডাটাবেসের নাম

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>

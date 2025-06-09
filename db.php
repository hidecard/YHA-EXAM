<?php
$host = "ls-f648654d5665fd1bcfb7baffc31292fdf84a2d97.cvcsikg401qf.ap-southeast-1.rds.amazonaws.com";
$port = 3306;
$username = "dbmasteruser";
$password = "hidecard";
$dbname = "StudentYHA";

$conn = new mysqli($host, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
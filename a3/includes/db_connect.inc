<?php
// db_connect.inc
if ($_SERVER['SERVER_NAME'] == 'localhost') {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skillswap";
} else {
$servername = "talsprddb02.int.its.rmit.edu.au";
$username = "s4097208";
$password = 'p@$$w0rd';
$dbname = "s4097208";
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>
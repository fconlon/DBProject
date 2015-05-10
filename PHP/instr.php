<?php
include 'printTables.php';

// informatoin about the database you will connect to
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbproject";
		
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

printTable($conn, "Table Before", "instructor");

$date = date("F jS Y");
$sql = "INSERT INTO instructor (name, ten_status, type, id, join_date) VALUES (\"$_POST[firstname] $_POST[lastname]\", \"$_POST[ten_status]\", \"$_POST[type]\", \"$_POST[id]\", \"$date\");";

if ($conn->query($sql) === TRUE) {
    printTable($conn, "Table After", "instructor");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
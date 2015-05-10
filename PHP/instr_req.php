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

printTable($conn, "Table Beforee", "instr_req");

$sql = "INSERT INTO instr_req(course_code, id, title, justification, year) VALUES(\"$_POST[course_code]\", \"$_POST[id]\", \"$_POST[title]\", \"$_POST[justification]\", $_POST[year]);";

if ($conn->query($sql) === TRUE) {
    printTable($conn, "Table After", "instr_req");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
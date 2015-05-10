<?php
include 'printTables.php';

// information about the database you will connect to
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

//query to insert into section_info table
$sql = "Select * FROM instr_courses WHERE year=$_POST[year] AND semester=\"$_POST[semester]\" AND iid=\"$_POST[id]\";";

printQuery($conn, "Courses for next semester", $sql);

$conn->close();
?>
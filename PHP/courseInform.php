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

printTable($conn, "Table Before", "course");

if(count($_POST) == 4)
    $sql = "INSERT INTO course (course_code, title, req, catalog) VALUES (\"$_POST[course_code]\", \"$_POST[title]\", \"Y\", $_POST[catalog]);";
else
    $sql = "INSERT INTO course (course_code, title, req, catalog) VALUES (\"$_POST[course_code]\", \"$_POST[title]\", \"N\", $_POST[catalog]);";

if ($conn->query($sql) === TRUE) {
    printTable($conn, "Table After", "course");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
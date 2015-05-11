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

$sql = "SELECT name FROM instructor WHERE id=\"$_POST[id]\";";
$result = $conn->query($sql);
$header = $result->fetch_assoc();

$sql = "SELECT c.course_code, title, semester, year, room, current
        FROM section_info s, enrollment e, course c, instr_assign i
        WHERE c.course_code=s.course_code AND e.crn=s.crn AND i.crn = s.crn AND iid=\"$_POST[id]\" AND year>2015-$_POST[yearsBack];";

printQuery($conn, $header["name"], $sql);

$conn->close();
?>
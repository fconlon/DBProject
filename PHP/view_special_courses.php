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

$sql = "SELECT c.course_code, title, semester, year, room, current, name
        FROM section_info s, enrollment e, instr_assign ia, instructor i, course c
        WHERE  s.crn=e.crn AND ia.crn=s.crn AND id=iid AND s.course_code=c.course_code AND year>2015-$_POST[yearsBack] AND (c.course_code=\"CS5331\" OR c.course_code=\"CS5332\");";

printQuery($conn, "Special Courses", $sql);

$conn->close();
?>
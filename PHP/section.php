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

$_POST["room"] = trim($_POST["room"]);
//query to insert into the assignment table 
$sql = "INSERT INTO assignment(crn, room, course) VALUES(\"$_POST[crn]\", \"$_POST[room]\", \"$_POST[course_code]\")";

//display table before and after
printTable($conn, "Assignment Table Before", "assignment");
if ($conn->query($sql) === TRUE) {
    printTable($conn, "Assignment Table After", "assignment");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//query to insert into section_info table
$sql = "INSERT INTO section_info(time, days, crn, section_num, semester, year) VALUES(\"$_POST[time]\",\"$_POST[days]\",\"$_POST[crn]\",\"$_POST[section]\",\"$_POST[semester]\",\"$_POST[year]\");";

//display table before and after
printTable($conn, "Section_info Table Before", "section_info");
if ($conn->query($sql) === TRUE) {
    printTable($conn, "Section_info Table After", "section_info");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT capacity FROM room_capacity WHERE room=\"$_POST[room]\";";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//query to insert into enrollment table 
$sql = "INSERT INTO enrollment(current, max, crn) VALUES(\"$_POST[cur]\", \"$row[capacity]\",\"$_POST[crn]\");";

//display table before and after
printTable($conn, "Enrollment Table Before", "enrollment");
if ($conn->query($sql) === TRUE) {
    printTable($conn, "Enrollment Table After", "enrollment");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//close connection
$conn->close();
?>
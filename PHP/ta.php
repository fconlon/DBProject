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

//query to insert into the ta table 
$sql = "INSERT IGNORE INTO ta(name, id) VALUES(\"$_POST[TAFirstName] $_POST[TALastName]\", \"$_POST[tid]\");";

//display table before and after
printTable($conn, "TA Table Before", "ta");
if ($conn->query($sql) === TRUE) {
    printTable($conn, "TA Table After", "ta");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//query to update the assignment table
$sql = "INSERT INTO ta_assign(crn, tid, hours) VALUES($_POST[crn], \"$_POST[tid]\", \"$_POST[hours]\");";

//display table before and after
printTable($conn, "TA_assign Before", "ta_assign");
if ($conn->query($sql) === TRUE) {
    printTable($conn, "TA_assign After", "ta_assign");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//close connection
$conn->close();
?>
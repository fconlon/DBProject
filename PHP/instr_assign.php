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
$sql = "INSERT INTO instr_assign(crn, iid, new) VALUES(\"$_POST[crn]\", \"$_POST[id]\",";

if (count($_POST) == 3)
    $sql .= "\"Y\")";
else
    $sql .= "\"N\")";

//display table before and after
printTable($conn, "Instr_Assign Table Before", "instr_assign");
if ($conn->query($sql) === TRUE) {
    printTable($conn, "Instr_assign Table After", "instr_assign");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//close connection
$conn->close();
?>
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

printTable($conn, "Table Beforee", "instr_load_pref");

$sql = "INSERT INTO instr_load_pref(id, load_pref) VALUES(\"$_POST[id]\", $_POST[load]) ON DUPLICATE KEY UPDATE load_pref=VALUES(load_pref);";

if ($conn->query($sql) === TRUE) {
    printTable($conn, "Table After", "instr_load_pref");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
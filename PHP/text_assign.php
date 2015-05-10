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

printTable($conn, "Textbook Before", "textbook");

$sql = "INSERT INTO textbook(title, author, edition, isbn, publisher) VALUES(\"$_POST[title]\", \"$_POST[author]\", \"$_POST[edition]\", \"$_POST[isbn]\", \"$_POST[publisher]\");";

if ($conn->query($sql) === TRUE) {
    printTable($conn, "Textbook After", "textbook");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE section_info SET text_isbn=\"$_POST[isbn]\" WHERE crn=$_POST[crn];";

printTable($conn, "Section_info Before", "section_info");

if ($conn->query($sql) === TRUE) {
    printTable($conn, "Section_info After", "section_info");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
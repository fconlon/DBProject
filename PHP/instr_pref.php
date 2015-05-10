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

$sql = "CREATE TABLE IF NOT EXISTS $_POST[id]$_POST[year](course_code VARCHAR(10), pref INT(1), PRIMARY KEY (course_code), 
        FOREIGN KEY (course_code) REFERENCES course(course_code));";
if ($conn->query($sql) === TRUE) {
    printTable($conn, "Current Pref Table", "$_POST[id]$_POST[year]");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "DROP TRIGGER IF EXISTS $_POST[id]$_POST[year]_pref;";
$conn->query($sql);

$sql = "CREATE TRIGGER $_POST[id]$_POST[year]_pref
        BEFORE INSERT ON $_POST[id]$_POST[year]
        FOR EACH ROW
        BEGIN
        IF NEW.pref<0 OR NEW.pref>3 THEN
        SET NEW.pref=NULL;
        END IF;
        END;";

if($conn->query($sql) ===TRUE){
    echo "Confirm trigger<br>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO $_POST[id]$_POST[year](course_code, pref) values(\"$_POST[course]\", $_POST[pref]) ON DUPLICATE KEY UPDATE pref=VALUES(pref);";

if ($conn->query($sql) === TRUE) {
    printTable($conn, "Updated Pref Table", "$_POST[id]$_POST[year]");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
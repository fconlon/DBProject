<?php
function printTable($conn, $header){
    $sql = "SELECT * FROM course;";
    $result = $conn->query($sql);

    echo "<style>
    table{
        border-collapse: collapse;
    }

    #tbl th, td {
        border: 1px solid black;
        padding: 5px;
    }
    </style>";
    
    echo "<h1>$header</h1><table id=\"tbl\"><tr><th>Course Code</th><th>Title</th><th>Required?</th><th>Catalog</th></tr>";
    
    foreach($result as $row ){
        echo "<tr>";
        foreach($row as $field){
            echo "<td>$field</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";
}

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

printTable($conn, "Table Before");

if(count($_POST) == 4)
    $sql = "INSERT INTO course (course_code, title, req, catalog) VALUES (\"$_POST[course_code]\", \"$_POST[title]\", \"Y\", $_POST[catalog]);";
else
    $sql = "INSERT INTO course (course_code, title, req, catalog) VALUES (\"$_POST[course_code]\", \"$_POST[title]\", \"N\", $_POST[catalog]);";

if ($conn->query($sql) === TRUE) {
    printTable($conn, "Table After");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
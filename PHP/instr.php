<?php
function printTable($conn, $header){
    $sql = "SELECT * FROM instructor;";
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
    
    echo "<h1>$header</h1><table id=\"tbl\"><tr><th>Name</th><th>Tenured Status</th><th>Title</th><th>Id</th><th>Join Date</th></tr>";
    
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

$date = date("F jS Y");
$sql = "INSERT INTO instructor (name, ten_status, type, id, join_date) VALUES (\"$_POST[firstname] $_POST[lastname]\", \"$_POST[ten_status]\", \"$_POST[type]\", \"$_POST[id]\", \"$date\");";

if ($conn->query($sql) === TRUE) {
    printTable($conn, "Table After");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
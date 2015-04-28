<?php
function printTable($conn, $header, $table){
    //get the attribute list 
    $sql = "DESCRIBE $table;";
    $result = $conn->query($sql);
    
    //output the title of the table and the attributes as a header row
    echo "<h1>$header</h1><table id=\"tbl\"><tr>";
    
    foreach($result as $att){
        echo "<th>$att[Field]</th>";
    }
    echo "</tr>";
    
    //get the table from the database
    $sql = "SELECT * FROM $table;";
    $result = $conn->query($sql);
    
    //output the table
    foreach($result as $row ){
        echo "<tr>";
        foreach($row as $field){
            echo "<td>$field</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";
}
//styling for tables
echo "<style>
    table{
        border-collapse: collapse;
    }

    #tbl th, td {
        border: 1px solid black;
        padding: 5px;
    }
    </style>";

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
$sql = "INSERT INTO ta(name, id, hours) VALUES(\"$_POST[TAFirstName] $_POST[TALastName]\", \"$_POST[tid]\", \"$_POST[hours]\")";

//display table before and after
printTable($conn, "TA Table Before", "ta");
if ($conn->query($sql) === TRUE) {
    printTable($conn, "TA Table After", "ta");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//query to update the assignment table
$sql = "UPDATE assignment SET tid=\"$_POST[tid]\" WHERE crn=\"$_POST[crn]\"";

//display table before and after
printTable($conn, "Assignment Table Before", "assignment");
if ($conn->query($sql) === TRUE) {
    printTable($conn, "Assignment Table After", "assignment");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//close connection
$conn->close();
?>
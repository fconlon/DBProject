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

//query to insert into the assignment table 
$sql = "INSERT INTO assignment(crn, room, course) VALUES(\"$_POST[crn]\", \"$_POST[building] $_POST[room]\", \"$_POST[course_code]\")";

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

//query to insert into enrollment table 
$sql = "INSERT INTO enrollment(current, max, crn) VALUES(\"$_POST[cur]\", \"$_POST[max]\",\"$_POST[crn]\");";

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
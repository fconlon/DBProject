<?php
echo "<style>
    table{
        border-collapse: collapse;
    }

    #tbl th, td {
        border: 1px solid black;
        padding: 5px;
    }
    </style>";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbproject";
    
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM instr_courses WHERE iid = \"R00534137\";";
$result = $conn->query($sql);

echo "<table id=\"tbl\"><tr>";
$fields = $result->fetch_fields();

foreach($fields as $field){
    echo "<th>$field->name</th>";
}
echo "</tr>";

foreach($result as $row){
    echo "<tr>";
    foreach($row as $att){
        echo "<td>$att</td>";
    }
    echo "</tr>";
}
echo "</table>";

/*
$sql = "DESCRIBE assignment;";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

echo $row['Field'];

echo "<table id=\"tbl\"><tr>";
foreach($result as $row){
    echo "<th>$row[Field]</th>";
}
echo "</tr></table>";
/*
function printTable(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbproject";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT * F";
    $result = $conn->query($sql);
    
    echo "<table><tr><th>Name</th><th>Tenured Status</th><th>Title</th><th>Id</th><th>Join Date</th></tr></table?";
    
    foreach($result as $row ){
        echo "<tr>";
        foreach($row as $field){
            echo "<td>$field</td>";
        }
        echo "</tr>";
    }
}*/
//echo "Hello World!</br>";
//echo date("F jS Y");
//printTable();
//$conn->close();
?>
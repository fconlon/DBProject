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

function printQuery($conn, $header, $sql){
    $result = $conn->query($sql);

    echo "<h1>$header</h1><table id=\"tbl\"><tr>";
    
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
}
?>
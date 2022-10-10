<?php

function getConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password,"student_database");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function TotalStuds(&$conn)
{
    $sql = "SELECT * FROM `stud_data`";
    $result = $conn->query($sql);
    $cnt = $result->num_rows;
    return $cnt;
}

function ComputeStatus(&$conn)
{
        $sql = "SELECT COUNT(*) AS ST FROM INFORMATION_SCHEMA.Columns where TABLE_NAME = 'stud_data'";
        $result = $conn->query($sql);
        $numcol = 0;
        if ($result->num_rows>0) 
        {
            // output data of each row
            while($row=$result->fetch_assoc()) 
            {   
                $numcol = $row["ST"];
            }
        }
        else 
        {
            echo "0 results";
        }
        return $numcol;
}
?>

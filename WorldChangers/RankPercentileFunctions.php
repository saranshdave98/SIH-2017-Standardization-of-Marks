<?php

function AddRankPercentileCols(&$conn)
{
    $sql = "ALTER TABLE stud_data ADD PHYSICS_RANK INT";
    $sql2 = "ALTER TABLE stud_data ADD CHEMISTRY_RANK INT";
    $sql3 = "ALTER TABLE stud_data ADD MATHEMATICS_RANK INT";
    $sql4 = "ALTER TABLE stud_data ADD ENGLISH_RANK INT";
    $sql5 = "ALTER TABLE stud_data ADD COMPUTER_RANK INT";
    $sql6 = "ALTER TABLE stud_data ADD PHYSICS_PERCENTILE DOUBLE";
    $sql7 = "ALTER TABLE stud_data ADD CHEMISTRY_PERCENTILE DOUBLE";
    $sql8 = "ALTER TABLE stud_data ADD MATHEMATICS_PERCENTILE DOUBLE";
    $sql9 = "ALTER TABLE stud_data ADD ENGLISH_PERCENTILE DOUBLE";
    $sql10 = "ALTER TABLE stud_data ADD COMPUTER_PERCENTILE DOUBLE";
    
    $conn->query($sql);
    $conn->query($sql2);
    $conn->query($sql3);
    $conn->query($sql4);
    $conn->query($sql5);
    $conn->query($sql6);
    $conn->query($sql7);
    $conn->query($sql8);
    $conn->query($sql9);
    $conn->query($sql10);
    
}

function getPhyRankPercentile(&$conn)
{   
    $sql = "SELECT * FROM `stud_data`
    ORDER BY PHYSICS DESC, MATHEMATICS DESC,CHEMISTRY DESC,ENGLISH DESC,DOB DESC,SURNAME DESC,STUDENT_ID ASC";

    $result = $conn->query($sql);
    $rank=1;
    $tot_stu=TotalStuds($conn);
    if ($result->num_rows>0) 
    {
        // output data of each row
        while($row=$result->fetch_assoc()) 
        {   
            $sql1 = "UPDATE stud_data SET PHYSICS_RANK=".$rank." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result1 = $conn->query($sql1);
            $perc=(($tot_stu-($rank-1))/$tot_stu)*100;
            $sql2 = "UPDATE stud_data SET PHYSICS_PERCENTILE=".$perc." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result2 = $conn->query($sql2);
            $rank++;
        }
    }
    else 
    {
        echo "0 results";
    }
}

function getChemRankPercentile(&$conn)
{   
    $sql = "SELECT * FROM `stud_data`
    ORDER BY CHEMISTRY DESC, MATHEMATICS DESC,PHYSICS DESC,ENGLISH DESC,DOB DESC,SURNAME DESC,STUDENT_ID ASC";

    $result = $conn->query($sql);
    $rank=1;
    $tot_stu=TotalStuds($conn);

    if ($result->num_rows>0) 
    {
        // output data of each row
        while($row=$result->fetch_assoc()) 
        {   
            $sql1 = "UPDATE stud_data SET CHEMISTRY_RANK=".$rank." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result1 = $conn->query($sql1);
            $perc=(($tot_stu-($rank-1))/$tot_stu)*100;
            $sql2 = "UPDATE stud_data SET CHEMISTRY_PERCENTILE=".$perc." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result2 = $conn->query($sql2);
            $rank++;
        }
    }
    else 
    {
        echo "0 results";
    }
}

function getMathRankPercentile(&$conn)
{   
    $sql = "SELECT * FROM `stud_data`
    ORDER BY MATHEMATICS DESC, PHYSICS DESC,CHEMISTRY DESC,ENGLISH DESC,DOB DESC,SURNAME DESC,STUDENT_ID ASC";

    $result = $conn->query($sql);
    $rank=1;
    $tot_stu=TotalStuds($conn);

    if ($result->num_rows>0) 
    {
        // output data of each row
        while($row=$result->fetch_assoc()) 
        {   
            $sql1 = "UPDATE stud_data SET MATHEMATICS_RANK=".$rank." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result1 = $conn->query($sql1);
            $perc=(($tot_stu-($rank-1))/$tot_stu)*100;
            $sql2 = "UPDATE stud_data SET MATHEMATICS_PERCENTILE=".$perc." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result2 = $conn->query($sql2);
            $rank++;
        }
    }
    else 
    {
        echo "0 results";
    }
}

function getEngRankPercentile(&$conn)
{   
    $sql = "SELECT * FROM `stud_data`
    ORDER BY ENGLISH DESC, MATHEMATICS DESC,PHYSICS DESC,CHEMISTRY DESC,DOB DESC,SURNAME DESC,STUDENT_ID ASC";

    $result = $conn->query($sql);
    $rank=1;
    $tot_stu=TotalStuds($conn);

    if ($result->num_rows>0) 
    {
        // output data of each row
        while($row=$result->fetch_assoc()) 
        {
            $sql1 = "UPDATE stud_data SET ENGLISH_RANK=".$rank." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result1 = $conn->query($sql1);
            $perc=(($tot_stu-($rank-1))/$tot_stu)*100;
            $sql2 = "UPDATE stud_data SET ENGLISH_PERCENTILE=".$perc." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result2 = $conn->query($sql2);
            $rank++;
        }
    }
    else 
    {
        echo "0 results";
    }
}

function getCompRankPercentile(&$conn)
{   
    $sql = "SELECT * FROM `stud_data`
    ORDER BY COMPUTER DESC, MATHEMATICS DESC, PHYSICS DESC,CHEMISTRY DESC,ENGLISH DESC,DOB DESC,SURNAME DESC,STUDENT_ID ASC";

    $result = $conn->query($sql);
    $rank=1;
    $tot_stu=TotalStuds($conn);

    if ($result->num_rows>0) 
    {
        // output data of each row
        while($row=$result->fetch_assoc()) 
        {
            $sql1 = "UPDATE stud_data SET COMPUTER_RANK=".$rank." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result1 = $conn->query($sql1);
            $perc=(($tot_stu-($rank-1))/$tot_stu)*100;
            $sql2 = "UPDATE stud_data SET COMPUTER_PERCENTILE=".$perc." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result2 = $conn->query($sql2);
            $rank++;
        }
    }
    else 
    {
        echo "0 results";
    }
}

function CalcuRankPercentile(&$conn)
{
    AddRankPercentileCols($conn);
    getPhyRankPercentile($conn);
    getChemRankPercentile($conn);
    getMathRankPercentile($conn);
    getEngRankPercentile($conn);
    getCompRankPercentile($conn);
}

?>
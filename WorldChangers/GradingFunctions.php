<?php

function AddGradeCols(&$conn)
{
    $sql = "ALTER TABLE stud_data ADD PHYSICS_GRADE VARCHAR(45)";
    $sql2 = "ALTER TABLE stud_data ADD CHEMISTRY_GRADE VARCHAR(45)";
    $sql3 = "ALTER TABLE stud_data ADD MATHEMATICS_GRADE VARCHAR(45)";
    $sql4 = "ALTER TABLE stud_data ADD ENGLISH_GRADE VARCHAR(45)";
    $sql5 = "ALTER TABLE stud_data ADD COMPUTER_GRADE VARCHAR(45)";
    $sql6 = "ALTER TABLE stud_data ADD PHYSICS_GRADE_PT INT";
    $sql7 = "ALTER TABLE stud_data ADD CHEMISTRY_GRADE_PT INT";
    $sql8 = "ALTER TABLE stud_data ADD MATHEMATICS_GRADE_PT INT";
    $sql9 = "ALTER TABLE stud_data ADD ENGLISH_GRADE_PT INT";
    $sql10 = "ALTER TABLE stud_data ADD COMPUTER_GRADE_PT INT";
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

function CalculateGradePt(&$Percentile,&$GradDivs)
{
    if(($Percentile>$GradDivs[0])&&($Percentile<=$GradDivs[1]))
    {
        $GradePt = 1;
    }
    else if(($Percentile>$GradDivs[1])&&($Percentile<=$GradDivs[2]))
    {
        $GradePt = 2;
    }
    else if(($Percentile>$GradDivs[2])&&($Percentile<=$GradDivs[3]))
    {
        $GradePt = 3;
    }
    else if(($Percentile>$GradDivs[3])&&($Percentile<=$GradDivs[4]))
    {
        $GradePt = 4;
    }
    else if(($Percentile>$GradDivs[4])&&($Percentile<=$GradDivs[5]))
    {
        $GradePt = 5;
    }
    else if(($Percentile>$GradDivs[5])&&($Percentile<=$GradDivs[6]))
    {
        $GradePt = 6;
    }
    else if(($Percentile>$GradDivs[6])&&($Percentile<=$GradDivs[7]))
    {
        $GradePt = 7;
    }
    else if(($Percentile>$GradDivs[7])&&($Percentile<=$GradDivs[8]))
    {
        $GradePt = 8;
    }
    else if(($Percentile>$GradDivs[8])&&($Percentile<=$GradDivs[9]))
    {
        $GradePt = 9;
    }
    else
    {
        $GradePt = 10;
    }
    return $GradePt;
}

function CalculateGrade(&$GradePt)
{
    $GradeArr = array(0,'F3','F2','F1','D','C2','C1','B2','B1','A2','A1');
    return $GradeArr[$GradePt];
}

function PhyGradingFunction(&$conn)
{
    $sql  = "SELECT COUNT(PHYSICS) as PC FROM stud_data WHERE PHYSICS>=35";
    $result = $conn->query($sql);
    $PassCnt = 0;
    if ($result->num_rows>0) 
    {
        while($row=$result->fetch_assoc()) 
        {   
            $PassCnt=$row["PC"];
        }
    }
    else 
    {
        echo "0 results";
    }
    $tot_stu = TotalStuds($conn);
    $PassPerc = ($PassCnt/$tot_stu)*100;
    $FailPerc = 100 - $PassPerc;
    
    $PassRange = ($PassPerc/7);
    $FailRange = ($FailPerc/3);
    
    $GradDivs = array(0,$FailRange,($FailRange*2),($FailRange*3),(($FailRange*3)+$PassRange),(($FailRange*3)+($PassRange*2)),(($FailRange*3)+($PassRange*3)),(($FailRange*3)+($PassRange*4)),(($FailRange*3)+($PassRange*5)),(($FailRange*3)+($PassRange*6)), (($FailRange*3)+($PassRange*7)));
        
    $sql1 = "SELECT PHYSICS_PERCENTILE,STUDENT_ID FROM `stud_data`";
    $result1 = $conn->query($sql1);
    
    $Grade = 0;
    
    if ($result1->num_rows>0) 
    {
        while($row=$result1->fetch_assoc()) 
        {   
            $Percentile=$row["PHYSICS_PERCENTILE"];
            
            $GradePt = CalculateGradePt($Percentile,$GradDivs);
            $Grade = CalculateGrade($GradePt);
        
            $sql2 = "UPDATE stud_data SET PHYSICS_GRADE='".$Grade."' WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result2 = $conn->query($sql2);
            $sql3 = "UPDATE stud_data SET PHYSICS_GRADE_PT=".$GradePt." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result3 = $conn->query($sql3);
        }
    }
    else 
    {
        echo "0 results";
    }
}


function ChemGradingFunction(&$conn)
{
    $sql  = "SELECT COUNT(CHEMISTRY) as PC FROM stud_data WHERE CHEMISTRY>=35";
    $result = $conn->query($sql);
    $PassCnt = 0;
    if ($result->num_rows>0) 
    {
        while($row=$result->fetch_assoc()) 
        {   
            $PassCnt=$row["PC"];
        }
    }
    else 
    {
        echo "0 results";
    }
    $tot_stu = TotalStuds($conn);
    $PassPerc = ($PassCnt/$tot_stu)*100;
    $FailPerc = 100 - $PassPerc;
    
    $PassRange = ($PassPerc/7);
    $FailRange = ($FailPerc/3);
    
    $GradDivs = array(0,$FailRange,($FailRange*2),($FailRange*3),(($FailRange*3)+$PassRange),(($FailRange*3)+($PassRange*2)),(($FailRange*3)+($PassRange*3)),(($FailRange*3)+($PassRange*4)),(($FailRange*3)+($PassRange*5)),(($FailRange*3)+($PassRange*6)), (($FailRange*3)+($PassRange*7)));
        
    $sql1 = "SELECT CHEMISTRY_PERCENTILE,STUDENT_ID FROM `stud_data`";
    $result1 = $conn->query($sql1);
    
    $Grade = 0;
    
    if ($result1->num_rows>0) 
    {
        while($row=$result1->fetch_assoc()) 
        {   
            $Percentile=$row["CHEMISTRY_PERCENTILE"];
            
            $GradePt = CalculateGradePt($Percentile,$GradDivs);
            $Grade = CalculateGrade($GradePt);
            
            $sql2 = "UPDATE stud_data SET CHEMISTRY_GRADE='".$Grade."' WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result2 = $conn->query($sql2);
            $sql3 = "UPDATE stud_data SET CHEMISTRY_GRADE_PT=".$GradePt." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result3 = $conn->query($sql3);
        }
    }
    else 
    {
        echo "0 results";
    }
}

function MathGradingFunction(&$conn)
{
    $sql  = "SELECT COUNT(MATHEMATICS) as PC FROM stud_data WHERE MATHEMATICS>=35";
    $result = $conn->query($sql);
    $PassCnt = 0;
    if ($result->num_rows>0) 
    {
        while($row=$result->fetch_assoc()) 
        {   
            $PassCnt=$row["PC"];
        }
    }
    else 
    {
        echo "0 results";
    }
    $tot_stu = TotalStuds($conn);
    $PassPerc = ($PassCnt/$tot_stu)*100;
    $FailPerc = 100 - $PassPerc;
    
    $PassRange = ($PassPerc/7);
    $FailRange = ($FailPerc/3);
    
    $GradDivs = array(0,$FailRange,($FailRange*2),($FailRange*3),(($FailRange*3)+$PassRange),(($FailRange*3)+($PassRange*2)),(($FailRange*3)+($PassRange*3)),(($FailRange*3)+($PassRange*4)),(($FailRange*3)+($PassRange*5)),(($FailRange*3)+($PassRange*6)), (($FailRange*3)+($PassRange*7)));
        
    $sql1 = "SELECT MATHEMATICS_PERCENTILE,STUDENT_ID FROM `stud_data`";
    $result1 = $conn->query($sql1);
    
    $Grade = 0;
    
    if ($result1->num_rows>0) 
    {
        while($row=$result1->fetch_assoc()) 
        {   
            $Percentile=$row["MATHEMATICS_PERCENTILE"];
            
            $GradePt = CalculateGradePt($Percentile,$GradDivs);
            $Grade = CalculateGrade($GradePt);
            
            $sql2 = "UPDATE stud_data SET MATHEMATICS_GRADE='".$Grade."' WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result2 = $conn->query($sql2);
            $sql3 = "UPDATE stud_data SET MATHEMATICS_GRADE_PT=".$GradePt." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result3 = $conn->query($sql3);
        }
    }
    else 
    {
        echo "0 results";
    }
}

function EngGradingFunction(&$conn)
{
    $sql  = "SELECT COUNT(ENGLISH) as PC FROM stud_data WHERE ENGLISH>=35";
    $result = $conn->query($sql);
    $PassCnt = 0;
    if ($result->num_rows>0) 
    {
        while($row=$result->fetch_assoc()) 
        {   
            $PassCnt=$row["PC"];
        }
    }
    else 
    {
        echo "0 results";
    }
    $tot_stu = TotalStuds($conn);
    $PassPerc = ($PassCnt/$tot_stu)*100;
    $FailPerc = 100 - $PassPerc;
    
    $PassRange = ($PassPerc/7);
    $FailRange = ($FailPerc/3);
    
    $GradDivs = array(0,$FailRange,($FailRange*2),($FailRange*3),(($FailRange*3)+$PassRange),(($FailRange*3)+($PassRange*2)),(($FailRange*3)+($PassRange*3)),(($FailRange*3)+($PassRange*4)),(($FailRange*3)+($PassRange*5)),(($FailRange*3)+($PassRange*6)), (($FailRange*3)+($PassRange*7)));
        
    $sql1 = "SELECT ENGLISH_PERCENTILE,STUDENT_ID FROM `stud_data`";
    $result1 = $conn->query($sql1);
    
    $Grade = 0;
    
    if ($result1->num_rows>0) 
    {
        while($row=$result1->fetch_assoc()) 
        {   
          $Percentile=$row["ENGLISH_PERCENTILE"];
            
            $GradePt = CalculateGradePt($Percentile,$GradDivs);
            $Grade = CalculateGrade($GradePt);
            
            $sql2 = "UPDATE stud_data SET ENGLISH_GRADE='".$Grade."' WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result2 = $conn->query($sql2);
            $sql3 = "UPDATE stud_data SET ENGLISH_GRADE_PT=".$GradePt." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result3 = $conn->query($sql3);
        }
    }
    else 
    {
        echo "0 results";
    }
}

function CompGradingFunction(&$conn)
{
    $sql  = "SELECT COUNT(COMPUTER) as PC FROM stud_data WHERE COMPUTER>=35";
    $result = $conn->query($sql);
    $PassCnt = 0;
    if ($result->num_rows>0) 
    {
        while($row=$result->fetch_assoc()) 
        {   
            $PassCnt=$row["PC"];
        }
    }
    else 
    {
        echo "0 results";
    }
    $tot_stu = TotalStuds($conn);
    $PassPerc = ($PassCnt/$tot_stu)*100;
    $FailPerc = 100 - $PassPerc;
    
    $PassRange = ($PassPerc/7);
    $FailRange = ($FailPerc/3);
    
    $GradDivs = array(0,$FailRange,($FailRange*2),($FailRange*3),(($FailRange*3)+$PassRange),(($FailRange*3)+($PassRange*2)),(($FailRange*3)+($PassRange*3)),(($FailRange*3)+($PassRange*4)),(($FailRange*3)+($PassRange*5)),(($FailRange*3)+($PassRange*6)), (($FailRange*3)+($PassRange*7)));
        
    $sql1 = "SELECT COMPUTER_PERCENTILE,STUDENT_ID FROM `stud_data`";
    $result1 = $conn->query($sql1);
    
    $Grade = 0;
    
    if ($result1->num_rows>0) 
    {
        while($row=$result1->fetch_assoc()) 
        {   
            $Percentile=$row["COMPUTER_PERCENTILE"];
            
            $GradePt = CalculateGradePt($Percentile,$GradDivs);
            $Grade = CalculateGrade($GradePt);
            
            $sql2 = "UPDATE stud_data SET COMPUTER_GRADE='".$Grade."' WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result2 = $conn->query($sql2);
            $sql3 = "UPDATE stud_data SET COMPUTER_GRADE_PT=".$GradePt." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result3 = $conn->query($sql3);
        }
    }
    else 
    {
        echo "0 results";
    }
}

function Grading(&$conn)
{
    AddGradeCols($conn);
    PhyGradingFunction($conn);
    ChemGradingFunction($conn);
    MathGradingFunction($conn);
    EngGradingFunction($conn);
    CompGradingFunction($conn);
}

?>
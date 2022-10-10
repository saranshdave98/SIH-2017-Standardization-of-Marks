<?php

function AddCGPACols(&$conn)
{
    $sql = "ALTER TABLE stud_data ADD CGPA FLOAT";
    $conn->query($sql);
    $sql1 = "ALTER TABLE stud_data ADD NORMALIZED_SCORE DOUBLE";
    $conn->query($sql1);
    $sql2 = "ALTER TABLE stud_data ADD MERIT_NO INT";
    $conn->query($sql2);
}

function GradeUpgradeAndCGPACalc(&$conn)
{
   
    $sql  = "SELECT STATUS,STUDENT_ID,PHYSICS_GRADE_PT,CHEMISTRY_GRADE_PT,MATHEMATICS_GRADE_PT,ENGLISH_GRADE_PT,COMPUTER_GRADE_PT,PHYSICS_PERCENTILE,CHEMISTRY_PERCENTILE,MATHEMATICS_PERCENTILE,ENGLISH_PERCENTILE,COMPUTER_PERCENTILE FROM STUD_DATA ";
    $result = $conn->query($sql);
    if ($result->num_rows>0) 
    {
        while($row=$result->fetch_assoc()) 
        {   
            $status=$row["STATUS"];
            $PhyGrdPt=$row["PHYSICS_GRADE_PT"];
            $ChemGrdPt=$row["CHEMISTRY_GRADE_PT"];
            $MathGrdPt=$row["MATHEMATICS_GRADE_PT"];
            $EngGrdPt=$row["ENGLISH_GRADE_PT"];
            $CompGrdPt=$row["COMPUTER_GRADE_PT"];
            $PhyPerc=$row["PHYSICS_PERCENTILE"];
            $ChemPerc=$row["CHEMISTRY_PERCENTILE"];
            $MathPerc=$row["MATHEMATICS_PERCENTILE"];
            $EngPerc=$row["ENGLISH_PERCENTILE"];
            $CompPerc=$row["COMPUTER_PERCENTILE"];
            if($status=='P')
            {
                if(($PhyGrdPt>=4)&&($ChemGrdPt>=4)&&($MathGrdPt>=4))
                {
                    if(($CompGrdPt>=4)&&($EngGrdPt<4))
                    {
                        if(($PhyGrdPt == 10)&&($EngGrdPt<4))
                            $EngGrdPt++;
                        if(($ChemGrdPt == 10)&&($EngGrdPt<4))
                            $EngGrdPt++;
                        if(($MathGrdPt == 10)&&($EngGrdPt<4))
                            $EngGrdPt++;
                        if($EngGrdPt<4)
                        {
                            $sql2 = "UPDATE stud_data SET CGPA=0 WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
                            $result2 = $conn->query($sql2);  
                        }
                        else
                        {
                            $sql2 = "UPDATE stud_data SET ENGLISH_GRADE='".'D**'."' WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
                            $result2 = $conn->query($sql2);
                            $sql3 = "UPDATE stud_data SET ENGLISH_GRADE_PT= 4 WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
                            $result3 = $conn->query($sql3);
                        }
                    }
                    else if(($CompGrdPt<4)&&($EngGrdPt>=4))
                    {
                        if(($PhyGrdPt == 10)&&($CompGrdPt<4))
                            $CompGrdPt++;
                        if(($ChemGrdPt == 10)&&($CompGrdPt<4))
                            $CompGrdPt++;
                        if(($MathGrdPt == 10)&&($CompGrdPt<4))
                            $CompGrdPt++;
                        if($CompGrdPt<4)
                        {
                            $sql2 = "UPDATE stud_data SET CGPA=0 WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
                            $result2 = $conn->query($sql2);  
                        }
                        else
                        {
                            $sql2 = "UPDATE stud_data SET COMPUTER_GRADE='".'D**'."' WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
                            $result2 = $conn->query($sql2);
                            $sql3 = "UPDATE stud_data SET COMPUTER_GRADE_PT= 4 WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
                            $result3 = $conn->query($sql3);
                        }
                    }
                    else if(($CompGrdPt<4)&&($EngGrdPt<4))
                    {
                        $sql2 = "UPDATE stud_data SET CGPA=0 WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
                        $result2 = $conn->query($sql2);
                    }
                }
                else
                {
                    $sql2 = "UPDATE stud_data SET CGPA=0 WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
                    $result2 = $conn->query($sql2);
                } 
            }
            else
            {
                $sql2 = "UPDATE stud_data SET CGPA=0 WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
                $result2 = $conn->query($sql2);
            }
            
            if(($PhyGrdPt>=4)&&($ChemGrdPt>=4)&&($MathGrdPt>=4)&&($EngGrdPt>=4)&&($CompGrdPt>=4))
            {
                $CGPA=(($PhyGrdPt+$ChemGrdPt+$MathGrdPt+$EngGrdPt+$CompGrdPt)/5);
                $sql3 = "UPDATE stud_data SET CGPA=".$CGPA." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
                $result3 = $conn->query($sql3);
                $NORMSCORE=(($PhyPerc+$ChemPerc+$MathPerc+$EngPerc+$CompPerc)/5);
                $sql4 = "UPDATE stud_data SET NORMALIZED_SCORE=".$NORMSCORE." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
                $result4 = $conn->query($sql4);
            }
        }
    }
    else 
    {
        echo "0 results";
    }  
}

function getMerit(&$conn)
{   
    $sql = "SELECT CGPA,STUDENT_ID,NORMALIZED_SCORE FROM `stud_data`
    ORDER BY CGPA DESC,NORMALIZED_SCORE DESC,STUDENT_ID ASC";

    $result = $conn->query($sql);
    $Merit=1;
    
    if ($result->num_rows>0) 
    {
        // output data of each row
        while($row=$result->fetch_assoc()) 
        {   
            $CGP=$row["CGPA"];
            
            if($CGP>=4)
            {
            $sql1 = "UPDATE stud_data SET MERIT_NO=".$Merit." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
            $result1 = $conn->query($sql1);
            $Merit++;
            }
            else 
            {
                $NOMERI=0;
                $MERNO = 9999999;
                $sql3 = "UPDATE stud_data SET MERIT_NO=".$MERNO." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
                $result3 = $conn->query($sql3);
                $sql4 = "UPDATE stud_data SET NORMALIZED_SCORE=".$NOMERI." WHERE STUDENT_ID='".$row["STUDENT_ID"]."'";
                $result4 = $conn->query($sql4);
            }
        }
    }
    else 
    {
        echo "0 results";
    }
}

function CalcCGPAAndUpgrd(&$conn)
{
    AddCGPACols($conn);
    GradeUpgradeAndCGPACalc($conn);
    getMerit($conn);
}

?>
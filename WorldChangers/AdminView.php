<html>
    <body>
        
        <h2 style="background-color:rgb(55,58,190)" >
<img src="cb.gif" alt="HTML5 Icon" style="width:67px;height:69px;">

<img valign="top" src="cb1.gif" alt="HTML5 Icon" style="width:263px;height:31px;">
<br>
<img src="cb2.gif" alt="HTML5 Icon" style="width:408px;height:26px;">
        </h2>
<h3  align="right">Examination Results 2017</h3>
 <h1 style="color:blue;" align="center">Senior School Certificate Examination(Class XII)Results 2017</h1><br>
 



 
     

     
      <?php
    
    
    require ('Functions.php');
    
    function AdminView(&$conn)
    {
        
        
        
         $i=0;
       $result = mysqli_query($conn,"SELECT * FROM `stud_data`");
        if ($result->num_rows>0) 
        {
            ?>
            <table border="1"  align="center" cellpadding="8" >
                    <style>
         thead {color:white;}
       </style>
         <thead style="background-color:rgb(55,58,190)"><td>STUDENT_ID</td><td>STUDENT_NAME</td><td>SURNAME</td><td>MOTHERS_NAME</td><td>DATEOFBIRTH</td><td>STATUS</td><td>PHYSICS</td><td>MATHEMATICS</td><td>CHEMISTRY</td><td>ENGLISH</td><td>COMPUTER</td><td>PHYSICS_RANK</td><td>MATHEMATICS_RANK</td><td>CHEMISTRY_RANK</td><td>ENGLISH_RANK</td><td>COMPUTER_RANK</td><td>PHYSICS_PERCENTILE</td><td>MATHEMATICS_PERCENTILE</td><td>CHEMISTRY_PERCENTILE</td><td>ENGLISH_PERCENTILE</td><td>COMPUTER_PERCENTILE</td><td>PHYSICS_GRADE</td><td>MATHEMATICS_GRADE</td><td>CHEMISTRY_GRADE</td><td>ENGLISH_GRADE</td><td>COMPUTER_GRADE</td><td>PHYSICS_GRADE_PT</td><td>MATHEMATICS_GRADE_PT</td><td>CHEMISTRY_GRADE_PT</td><td>ENGLISH_GRADE_PT</td><td>COMPUTER_GRADE_PT</td><td>CGPA</td><td>NORMALIZED_SCORE</td><td>MERIT_NO</td></thead>
      
    
            <?php
            while($row = mysqli_fetch_array($result)) 
            {   
                
                $ID=$row["STUDENT_ID"];
                $Name=$row["STUDENT_NAME"];
                $SName=$row["SURNAME"];
                $DB=$row["DOB"];
                $MName=$row["MOTHERS_NAME"];
                $status=$row["STATUS"];
                $PhyMark=$row["PHYSICS"];
                $ChemMark=$row["CHEMISTRY"];
                $MathMark=$row["MATHEMATICS"];
                $EngMark=$row["ENGLISH"];
                $CompMark=$row["COMPUTER"];
                $PhyPerc=$row["PHYSICS_PERCENTILE"];
                $ChemPerc=$row["CHEMISTRY_PERCENTILE"];
                $MathPerc=$row["MATHEMATICS_PERCENTILE"];
                $EngPerc=$row["ENGLISH_PERCENTILE"];
                $CompPerc=$row["COMPUTER_PERCENTILE"];
                $PhyRank=$row["PHYSICS_RANK"];
                $ChemRank=$row["CHEMISTRY_RANK"];
                $MathRank=$row["MATHEMATICS_RANK"];
                $EngRank=$row["ENGLISH_RANK"];
                $CompRank=$row["COMPUTER_RANK"];
                $PhyGrdPt=$row["PHYSICS_GRADE_PT"];
                $ChemGrdPt=$row["CHEMISTRY_GRADE_PT"];
                $MathGrdPt=$row["MATHEMATICS_GRADE_PT"];
                $EngGrdPt=$row["ENGLISH_GRADE_PT"];
                $CompGrdPt=$row["COMPUTER_GRADE_PT"];
                $PhyGrd=$row["PHYSICS_GRADE"];
                $ChemGrd=$row["CHEMISTRY_GRADE"];
                $MathGrd=$row["MATHEMATICS_GRADE"];
                $EngGrd=$row["ENGLISH_GRADE"];
                $CompGrd=$row["COMPUTER_GRADE"];
                $CGP=$row["CGPA"];
                $NORM=$row["NORMALIZED_SCORE"];
                $MERIT_NO=$row["MERIT_NO"]
                ?>
            <?php
         if($i%2==0)
         {
             ?>
            <tr><td><?php echo $ID; ?></td><td><?php echo $Name;?></td><td><?php echo  $SName; ?></td><td><?php echo $DB; ?></td><td><?php echo  $MName;?></td><td><?php echo $status;  ?></td><td><?php echo $PhyMark;?></td><td><?php echo $MathMark;?></td><td><?php echo $ChemMark;?></td><td><?php echo $EngMark;?></td><td><?php echo $CompMark;?></td><td><?php echo $PhyRank;?></td><td><?php echo $MathRank;?></td><td><?php echo $ChemRank;?></td><td><?php echo $EngRank;?></td><td><?php echo $CompRank;?></td><td><?php echo round($PhyPerc, 4);?></td><td><?php echo $MathPerc;?></td><td><?php echo $ChemPerc;?></td><td><?php echo $EngPerc;?></td><td><?php echo $CompPerc;?></td><td><?php echo $PhyGrd;?></td><td><?php echo $MathGrd;?></td><td><?php echo $ChemGrd;?></td><td><?php echo $EngGrd;?></td><td><?php echo $CompGrd;?></td><td><?php echo $PhyGrdPt;?></td><td><?php echo $MathGrdPt;?></td><td><?php echo $ChemGrdPt;?></td><td><?php echo $EngGrdPt;?></td><td><?php echo $CompGrdPt;?></td><td><?php echo $CGP;?></td><td><?php echo $NORM; ?></td><td><?php echo $MERIT_NO;?></td></tr>
       
      <?php
         }
        else{
            
        ?>
            <tr bgcolor="aliceblue"><td><?php echo $ID; ?></td><td><?php echo $Name;?></td><td><?php echo  $SName; ?></td><td><?php echo $DB; ?></td><td><?php echo  $MName;?></td><td><?php echo $status;  ?></td><td><?php echo $PhyMark;?></td><td><?php echo $MathMark;?></td><td><?php echo $ChemMark;?></td><td><?php echo $EngMark;?></td><td><?php echo $CompMark;?></td><td><?php echo $PhyRank;?></td><td><?php echo $MathRank;?></td><td><?php echo $ChemRank;?></td><td><?php echo $EngRank;?></td><td><?php echo $CompRank;?></td><td><?php echo round($PhyPerc, 4)?></td><td><?php echo $MathPerc;?></td><td><?php echo $ChemPerc;?></td><td><?php echo $EngPerc;?></td><td><?php echo $CompPerc;?></td><td><?php echo $PhyGrd;?></td><td><?php echo $MathGrd;?></td><td><?php echo $ChemGrd;?></td><td><?php echo $EngGrd;?></td><td><?php echo $CompGrd;?></td><td><?php echo $PhyGrdPt;?></td><td><?php echo $MathGrdPt;?></td><td><?php echo $ChemGrdPt;?></td><td><?php echo $EngGrdPt;?></td><td><?php echo $CompGrdPt;?></td><td><?php echo $CGP;?></td><td><?php echo $NORM; ?></td><td><?php echo $MERIT_NO;?></td></tr>
       <?php
        }
        $i++;
        ?>
            
            
    <?php
            }
            
            ?>
           </table>
           <?php
  
        }
        
        else 
        {
         
            echo "SORRY NO DATABSE COMPUTED"; 
            }
            
    }
        
    
        $conn=getConnection();
        AdminView($conn);
    ?>

   
        
 
    </body>
</html>
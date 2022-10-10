<html>
    <body bgcolor="#ffffff" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" link="#3333cc" vlink="#3333cc" alink="#3333cc" onLoad="newwin()">

<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#373abe">

  <tr align="left" valign="top"> 

    <td width="5%"><IMG height=69 src="cb.gif" width=67></td>

    <td width="95%" valign="center"> 

      <table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr align="right" valign="bottom"> 

          <td><font size="2" face="Arial, Helvetica, sans-serif" color="#ffffff"><b><font size="3">http://cbseresults.nic.in</font></b></font></td>

        </tr>

        <tr> 

          <td><IMG height=31 src="cb1.gif" width=263></td>

        </tr>

      </table>

    </td>

  </tr>

</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#373abe" height="30">

  <tr> 

    <td><IMG height=26 src="cb2.gif" width=408><font size="3" face="Arial, Helvetica, sans-serif"><font color="#ffffff"><b><font size="4"> 

      </font></b></font> </font></td>

    <td> 

      <div align="right"><font size="3" face="Arial, Helvetica, sans-serif"><font color="#ffffff"><b><font size="4"> 

        Examination Results 2016</font></b></font></font></div>

    </td>

  </tr>

</table>


<table border="0" width="100%" cellspacing="0" cellpadding="0">

  <tr>

    <td width="100%">    <br>

<br>
<font size="3" face="Arial, Helvetica, sans-serif" color="#3333CC">
<CENTER>
      <font face="Arial, Helvetica, sans-serif" color="#3333CC" size=6><b><u>Grade Points</u></b></font><br><br>
  <B>For Senior School Certificate Examination (Class XII) Results 2016</B><br>
<font face="Arial, Helvetica, sans-serif" color="#3333CC" size=2>(All Regions)</font>
</CENTER>
 </font>
    <br>
    <br>


  

    </td>

  </tr> 

    </table>

 



 
     

     
      <?php
    
    
    require ('Functions.php');
    
    function Scorecard(&$conn)
    {
        
        
        
         $i=0;
       $result = mysqli_query($conn,"SELECT * FROM `stud_data`");
        if ($result->num_rows>0) 
        {
            ?>
            <table style="border:2px solid black;border-collapse:collapse;" id="t1"  align="center" cellpadding="8" >
                    <style>
         thead {color:white;}
       </style>
         <thead style="background-color:rgb(55,58,190)"><td style="border:2px solid black;color:white">STUDENT ID</td><td style="border:2px solid black;color:white">STUDENT NAME</td><td style="border:2px solid black;color:white">PHYSICS GRADE PT</td><td style="border:2px solid black;color:white">MATHEMATICS GRADE PT</td><td style="border:2px solid black;color:white">CHEMISTRY GRADE PT</td><td style="border:2px solid black;color:white">ENGLISH GRADE PT</td><td style="border:2px solid black;color:white">COMPUTER GRADE PT</td></thead>
      
    
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
    <tr><td style="border:2px solid black;"><?php echo $ID; ?></td><td style="border:2px solid black;"><?php echo $Name;?></td><td style="border:2px solid black;"><?php echo $PhyGrdPt;?></td><td style="border:2px solid black;"><?php echo $MathGrdPt;?></td><td style="border:2px solid black;"><?php echo $ChemGrdPt;?></td><td style="border:2px solid black;"><?php echo $EngGrdPt;?></td><td style="border:2px solid black;"><?php echo $CompGrdPt;?></td></tr>
       
      <?php
         }
        else{
            
        ?>
            <tr bgcolor="aliceblue"><td style="border:2px solid black;"><?php echo $ID; ?></td><td style="border:2px solid black;"><?php echo $Name;?></td><td style="border:2px solid black;"><?php echo $PhyGrdPt;?></td><td style="border:2px solid black;"><?php echo $MathGrdPt;?></td><td style="border:2px solid black;"><?php echo $ChemGrdPt;?></td><td style="border:2px solid black;"><?php echo $EngGrdPt;?></td><td style="border:2px solid black;"><?php echo $CompGrdPt;?></td></tr>
       
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
    Scorecard($conn);
    ?>
  <br>
        <br>
         <br>
          <br>
    
      <hr width=75%>
<table width="75%" border="0" cellspacing="0" cellpadding="0" align=center>
  <tr> 
    <td>
      <P>
      <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><b>Note:</b> We have replicated the web page design of
      2016 Examination Result page designed by CBSE just for a more realistic user interface. All the related rights for the original CBSE Examination Result web page design are still reserved by CBSE.&nbsp;<br>
        </font>
      <font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</P></td>
  </tr>
  </table>


<table width="100%">
  <tr bgcolor="#c2dbf8" align="middle" valign="baseline"> 
    <td height="23"> 
      <div align="center"> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><b><A>Developed by WorldChangers</A></b></font></div>
    </td>
  </tr>
</table>      

   
        
 
    </body>
</html>


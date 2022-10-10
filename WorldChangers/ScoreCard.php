<!DOCTYPE html>
<html>

<body bgcolor="#ffffff" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" link="#3333cc" vlink="#3333cc" alink="#3333cc" onLoad="newwin()">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#373abe">

        <tr align="left" valign="top">

            <td width="5%">
                <IMG height=69 src="cb.gif" width=67>
            </td>

            <td width="95%" valign="center">

                <table width="100%" border="0" cellspacing="0" cellpadding="0">

                    <tr align="right" valign="bottom">

                        <td><font size="2" face="Arial, Helvetica, sans-serif" color="#ffffff"><b><font size="3">http://cbseresults.nic.in</font>
                            </b>
                            </font>
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <IMG height=31 src="cb1.gif" width=263>
                        </td>

                    </tr>

                </table>

            </td>

        </tr>

    </table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#373abe" height="30">

        <tr>

            <td>
                <IMG height=26 src="cb2.gif" width=408><font size="3" face="Arial, Helvetica, sans-serif"><font color="#ffffff"><b><font size="4"> 

      </font>
                </b>
                </font>
                </font>
            </td>

            <td>

                <div align="right"><font size="3" face="Arial, Helvetica, sans-serif"><font color="#ffffff"><b><font size="4"> 

        Examination Results 2016</font>
                    </b>
                    </font>
                    </font>
                </div>

            </td>

        </tr>

    </table>


    <table border="0" width="100%" cellspacing="0" cellpadding="0">

        <tr>

            <td width="100%">
                <br>

                <br>
                <font size="3" face="Arial, Helvetica, sans-serif" color="#3333CC">
<CENTER>
  <B>Senior School Certificate Examination (Class XII) Results 2016</B><br>
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
        
        $std=$_POST["rname"];
        $moth=$_POST["mname"];
        
       
       $result = mysqli_query($conn,"SELECT * FROM `stud_data` WHERE STUDENT_ID = '$std' AND MOTHERS_NAME='$moth'");
     
        if ($result->num_rows>0) 
        {
        // output data of each row
            while($row = mysqli_fetch_array($result)) 
            {   
                
                $ID=$row["STUDENT_ID"];
                $Name=$row["STUDENT_NAME"];
                $SName=$row["SURNAME"];
                $DB=$row["DOB"];
                $MName=$row["MOTHERS_NAME"];
                $PhyGrdPt=$row["PHYSICS_GRADE_PT"];
                $ChemGrdPt=$row["CHEMISTRY_GRADE_PT"];
                $MathGrdPt=$row["MATHEMATICS_GRADE_PT"];
                $EngGrdPt=$row["ENGLISH_GRADE_PT"];
                $CompGrdPt=$row["COMPUTER_GRADE_PT"];
                $PhyMark=$row["PHYSICS"];
                $ChemMark=$row["CHEMISTRY"];
                $MathMark=$row["MATHEMATICS"];
                $EngMark=$row["ENGLISH"];
                $CompMark=$row["COMPUTER"];
                $PhyGrd=$row["PHYSICS_GRADE"];
                $ChemGrd=$row["CHEMISTRY_GRADE"];
                $MathGrd=$row["MATHEMATICS_GRADE"];
                $EngGrd=$row["ENGLISH_GRADE"];
                $CompGrd=$row["COMPUTER_GRADE"];
                $CGP=$row["CGPA"];
                $NORM=$row["NORMALIZED_SCORE"];
                $PhyPerc=$row[ "PHYSICS_PERCENTILE"];
                $ChemPerc=$row[ "CHEMISTRY_PERCENTILE"];
                $MathPerc=$row[ "MATHEMATICS_PERCENTILE"];
                $EngPerc=$row[ "ENGLISH_PERCENTILE"];
                $CompPerc=$row[ "COMPUTER_PERCENTILE"];
                
?>       
 <br>
 <br>
 <br>
 <h4 align="left" >  <font size="3" face="Arial, Helvetica, sans-serif">   
 <p style="text-indent:13em">ROLL NO: <?php echo $ID;?></p><p style="text-indent:13em">MOTHERS NAME: <?php echo $MName;?> </p> 
 <p style="text-indent:13em"> NAME: <?php echo $Name; echo "  "; echo $SName;?></p><p style="text-indent:13em">DOB: <?php ECHO $DB; ?></p></font></h4>
                                                     
               
 
 <font size="3" face="Arial, Helvetica, sans-serif">   
<table align="center" style="width:70%; border-collapse:collapse;">
<style>
    thead {color:white;}       
</style>
     <br><br>   
    <thead style="background-color:rgb(55,58,190)"><td style="border: 2px solid black;" align="left">SUBJECT</td><td style="border: 2px solid black;" align="center" >MARKS</td><td style="border: 2px solid black;" align="center" >PERCENTILE</td><td style="border: 2px solid black;" align="center">GRADE</td><td style="border: 2px solid black;" align="center">GRADEPOINT</td></thead>
    <tr><td style="border: 2px solid black;" align="left">PHYSICS</td><td style="border: 2px solid black;" align="center"><?php echo  $PhyMark;?></td><td style="border: 2px solid black;" align="center"><?php echo  round($PhyPerc,4);  ?></td><td style="border: 2px solid black;" align="center"><?php echo $PhyGrd;?> </td><td style="border: 2px solid black;" align="center"><?php echo $PhyGrdPt;?></tr>
     <tr bgcolor="aliceblue"><td style="border: 2px solid black;" align="left">CHEMISTRY</td><td style="border: 2px solid black;" align="center"><?php echo $ChemMark;?></td><td style="border: 2px solid black;" align="center"><?php echo  round($ChemPerc,4);  ?></td><td style="border: 2px solid black;" align="center"><?php echo $ChemGrd;?></td><td style="border: 2px solid black;" align="center"><?php echo $ChemGrdPt;?></tr>
      <tr><td style="border: 2px solid black;" align="left">MATHEMATICS</td><td style="border: 2px solid black;" align="center"><?php echo $MathMark;?></td><td style="border: 2px solid black;" align="center"><?php echo  round($MathPerc,4)?></td><td style="border: 2px solid black;" align="center"><?php echo $MathGrd;?></td><td style="border: 2px solid black;" align="center"><?php echo $MathGrdPt;?></tr> 
      <tr bgcolor="aliceblue"><td style="border: 2px solid black;" align="left">ENGLISH</td><td style="border: 2px solid black;" align="center"><?php echo $EngMark;?></td><td style="border: 2px solid black;" align="center"><?php echo  round($EngPerc,4);  ?></td><td style="border: 2px solid black;" align="center"><?php echo $EngGrd;?></td><td style="border: 2px solid black;" align="center"><?php echo $EngGrdPt;?></tr>
        <tr><td style="border: 2px solid black;" align="left">COMPUTER</td><td style="border: 2px solid black;" align="center"><?php echo $CompMark;?></td><td style="border: 2px solid black;" align="center"><?php echo  round($CompPerc,4);  ?></td><td style="border: 2px solid black;" align="center"><?php echo $CompGrd;?></td><td style="border: 2px solid black;" align="center"><?php echo $CompGrdPt;?></tr>
        <tr style="background-color:rgb(55,58,190);" ><td bgcolor="white"></td><td bgcolor="white"></td><td  style="border: 2px solid black;" align="center" height="10px"><b><h style="color:white"><t>NORMALIZED SCORE: </t><?php echo round($NORM,4);?></h></b></td><td bgcolor="white"></td><td  height="50" style="border: 2px solid black;" align="center"><b><font size="5" style="color:white">CGPA: <?php echo $CGP;?></font></b></td></tr>

 </table>
 </font>
 <br>
 <p style="text-indent:13em;"><a href="GradeDiv.php"><b>Click here to see the grades corresponding to percentile scores.</b></a></p>
        
<?php              
            }
       }
    else 
    {
        
        header("location:index.php?login=fail");
        echo "YOUR CREDENTIALS ARE WRONG";
    }
}
    $conn = getConnection();
    Scorecard($conn);
    ?>
    <br>
    <br>
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
      <div align="center"> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><b><A>Developed by WorldChangers</A></b></font>
                    </div>
            </td>
        </tr>
    </table>
        
</body>
</html>
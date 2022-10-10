
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
    <br><br>
 
    <table border="0" width="100%" cellspacing="0" cellpadding="0">

        <tr>

            <td width="100%">
              
                <font size="3" face="Arial, Helvetica, sans-serif" color="#3333CC">
<CENTER>
    <font  size="6" face="Arial, Helvetica, sans-serif" color="#3333CC"><b><u>Grades Corresponding To Percentiles</u></b></font><br><br>
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
function PhyGradeRange(&$conn)
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
    ?>
    <h3 align="center">PHYSICS</h3>
    <table align="center" height="50px" style="width:90%; border-collapse:collapse;">
        <tr align="center"><td style="border: 3px solid black;"><b>GRADE</b></td><td style="border: 3px solid black;">A1</td><td style="border: 3px solid black;">A2</td><td style="border: 3px solid black;">B1</td><td style="border: 3px solid black;">B2</td><td style="border: 3px solid black;">C1</td><td style="border: 3px solid black;">C2</td><td style="border: 3px solid black;">D</td><td style="border: 3px solid black;">F1</td><td style="border: 3px solid black;">F2</td><td style="border: 3px solid black;">F3</td></tr>

        <tr align="center"><td style="border: 3px solid black;"><b>PERCENTILE RANGE</b></td><td style="border: 3px solid black;"><?php echo round($GradDivs[10],4);?>-<?php echo round($GradDivs[9],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[9],4);?>-<?php echo round($GradDivs[8],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[8],4);?>-<?php echo round($GradDivs[7],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[7],4);?>-<?php echo round($GradDivs[6],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[6],4);?>-<?php echo round($GradDivs[5],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[5],4);?>-<?php echo round($GradDivs[4],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[4],4);?>-<?php echo round($GradDivs[3],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[3],4);?>-<?php echo round($GradDivs[2],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[2],4);?>-<?php echo round($GradDivs[1],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[1],4);?>-<?php echo round($GradDivs[0],4);?></td></tr>
    </table>
    <br>
    
    
 <?php   
}

function ChemGradeRange(&$conn)
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
    ?>
    <h3 align="center">CHEMISTRY</h3>
    <table align="center" height="50px" style="width:90%; border-collapse:collapse;">
        <tr align="center"><td style="border: 3px solid black;"><b>GRADE</b></td><td style="border: 3px solid black;">A1</td><td style="border: 3px solid black;">A2</td><td style="border: 3px solid black;">B1</td><td style="border: 3px solid black;">B2</td><td style="border: 3px solid black;">C1</td><td style="border: 3px solid black;">C2</td><td style="border: 3px solid black;">D</td><td style="border: 3px solid black;">F1</td><td style="border: 3px solid black;">F2</td><td style="border: 3px solid black;">F3</td></tr>

        <tr align="center"><td style="border: 3px solid black;"><b>PERCENTILE RANGE</b></td><td style="border: 3px solid black;"><?php echo round($GradDivs[10],4);?>-<?php echo round($GradDivs[9],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[9],4);?>-<?php echo round($GradDivs[8],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[8],4);?>-<?php echo round($GradDivs[7],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[7],4);?>-<?php echo round($GradDivs[6],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[6],4);?>-<?php echo round($GradDivs[5],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[5],4);?>-<?php echo round($GradDivs[4],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[4],4);?>-<?php echo round($GradDivs[3],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[3],4);?>-<?php echo round($GradDivs[2],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[2],4);?>-<?php echo round($GradDivs[1],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[1],4);?>-<?php echo round($GradDivs[0],4);?></td></tr>
    </table>
    <br>
    
 <?php   
}

function MathGradeRange(&$conn)
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
    ?>
    <h3 align="center">MATHEMATICS</h3>
    <table align="center" height="50px" style="width:90%; border-collapse:collapse;">
        <tr align="center"><td style="border: 3px solid black;"><b>GRADE</b></td><td style="border: 3px solid black;">A1</td><td style="border: 3px solid black;">A2</td><td style="border: 3px solid black;">B1</td><td style="border: 3px solid black;">B2</td><td style="border: 3px solid black;">C1</td><td style="border: 3px solid black;">C2</td><td style="border: 3px solid black;">D</td><td style="border: 3px solid black;">F1</td><td style="border: 3px solid black;">F2</td><td style="border: 3px solid black;">F3</td></tr>

        <tr align="center"><td style="border: 3px solid black;"><b>PERCENTILE RANGE</b></td><td style="border: 3px solid black;"><?php echo round($GradDivs[10],4);?>-<?php echo round($GradDivs[9],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[9],4);?>-<?php echo round($GradDivs[8],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[8],4);?>-<?php echo round($GradDivs[7],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[7],4);?>-<?php echo round($GradDivs[6],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[6],4);?>-<?php echo round($GradDivs[5],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[5],4);?>-<?php echo round($GradDivs[4],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[4],4);?>-<?php echo round($GradDivs[3],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[3],4);?>-<?php echo round($GradDivs[2],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[2],4);?>-<?php echo round($GradDivs[1],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[1],4);?>-<?php echo round($GradDivs[0],4);?></td></tr>
    </table>
    <br>
    
    
 <?php   
}


function EngGradeRange(&$conn)
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
    ?>
    <h3 align="center">ENGLISH</h3>
  <table align="center" height="50px" style="width:90%; border-collapse:collapse;">
        <tr align="center"><td style="border: 3px solid black;"><b>GRADE</b></td><td style="border: 3px solid black;">A1</td><td style="border: 3px solid black;">A2</td><td style="border: 3px solid black;">B1</td><td style="border: 3px solid black;">B2</td><td style="border: 3px solid black;">C1</td><td style="border: 3px solid black;">C2</td><td style="border: 3px solid black;">D</td><td style="border: 3px solid black;">F1</td><td style="border: 3px solid black;">F2</td><td style="border: 3px solid black;">F3</td></tr>

        <tr align="center"><td style="border: 3px solid black;"><b>PERCENTILE RANGE</b></td><td style="border: 3px solid black;"><?php echo round($GradDivs[10],4);?>-<?php echo round($GradDivs[9],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[9],4);?>-<?php echo round($GradDivs[8],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[8],4);?>-<?php echo round($GradDivs[7],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[7],4);?>-<?php echo round($GradDivs[6],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[6],4);?>-<?php echo round($GradDivs[5],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[5],4);?>-<?php echo round($GradDivs[4],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[4],4);?>-<?php echo round($GradDivs[3],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[3],4);?>-<?php echo round($GradDivs[2],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[2],4);?>-<?php echo round($GradDivs[1],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[1],4);?>-<?php echo round($GradDivs[0],4);?></td></tr>
    </table>
    <br>
    
    
 <?php   
}

function CompGradeRange(&$conn)
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
    ?>
    <h3 align="center">COMPUTER</h3>
   <table align="center" height="50px" style="width:90%; border-collapse:collapse;">
        <tr align="center"><td style="border: 3px solid black;"><b>GRADE</b></td><td style="border: 3px solid black;">A1</td><td style="border: 3px solid black;">A2</td><td style="border: 3px solid black;">B1</td><td style="border: 3px solid black;">B2</td><td style="border: 3px solid black;">C1</td><td style="border: 3px solid black;">C2</td><td style="border: 3px solid black;">D</td><td style="border: 3px solid black;">F1</td><td style="border: 3px solid black;">F2</td><td style="border: 3px solid black;">F3</td></tr>

        <tr align="center"><td style="border: 3px solid black;"><b>PERCENTILE RANGE</b></td><td style="border: 3px solid black;"><?php echo round($GradDivs[10],4);?>-<?php echo round($GradDivs[9],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[9],4);?>-<?php echo round($GradDivs[8],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[8],4);?>-<?php echo round($GradDivs[7],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[7],4);?>-<?php echo round($GradDivs[6],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[6],4);?>-<?php echo round($GradDivs[5],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[5],4);?>-<?php echo round($GradDivs[4],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[4],4);?>-<?php echo round($GradDivs[3],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[3],11);?>-<?php echo round($GradDivs[2],11);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[2],4);?>-<?php echo round($GradDivs[1],4);?></td><td style="border: 3px solid black;"><?php echo round($GradDivs[1],4);?>-<?php echo round($GradDivs[0],4);?></td></tr>
    </table>
    <br>
    
    
 <?php   
}




$conn = getConnection();
PhyGradeRange($conn);
ChemGradeRange($conn);
MathGradeRange($conn);
EngGradeRange($conn);
CompGradeRange($conn);

?>
    <br><br><br><br>
    
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

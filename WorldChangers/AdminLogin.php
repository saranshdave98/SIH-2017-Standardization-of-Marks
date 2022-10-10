<!DOCTYPE html>
<html>
    <head>
        
        
    </head>
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
  <B>Senior School Certificate Examination (Class XII) Results 2016</B><br>
<font face="Arial, Helvetica, sans-serif" color="#3333CC" size=2>(All Regions)</font>
</CENTER>
 </font>
    <br>
    <br>


  

    </td>

  </tr> 

    </table>

<form align="center" action="AdminPanel.php" method="post" id="AdminLogin">

<table width=35% align="center" >
      <tr><td align=left><FONT color=black face=Arial size=2><STRONG>Administrator's ID:</STRONG></td><td width="64%">

      <input type="text" placeholder="Admin ID" name="Uname" id="AdminID" style="width: 114px" AUTOCOMPLETE = "off"></td></tr>
      <tr><td align=left><FONT color=black face=Arial size=2><STRONG>Administrator's Password:</STRONG></td><td>

      <input type="password" placeholder="Admin Password" name="Pname" id="AdminPass" style="width: 114px" AUTOCOMPLETE = "off"></td></tr>
        
<tr align=center><td colspan=2 align=center>
<br>
<input type="submit" value="Submit">
<input type="reset" value="Reset">
 <div id="alerttext" style="text-align: center;color: red;">
     <?php
if(isset($_GET["login"]))
{
    if($_GET["login"]=="fail")
    {
        echo "<script>document.getElementById('alerttext').innerHTML='';document.getElementById('alerttext').innerHTML='<br><b>User Id or Password is either empty or wrong!</b>';</script>";
    }
}
?>
 </div>
    </td>
  </tr>

      </table>

</form>



<footer align="center">
    <br><br><br><br>
<FONT color=red face=Arial size=4><b>For Student Result:</b></FONT>
<a href="index.php"><FONT face=Arial size=4>Click Here</FONT></a>
<br><br><br><br><br><br><br><br><br>

</footer>
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

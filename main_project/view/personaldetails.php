<?php 
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
{
	header("Location: index.php?controller=login&function=execute_process");
	//	exit();
}

?>
<html>

<head>
		<script type='text/javascript' src='<?php echo JS_PATH;?>jquery.js'></script>		
		<script type='text/javascript' src='<?php echo JS_PATH;?>jquery.validate.pack.js'></script>
		<script type='text/javascript' src='<?php echo JS_PATH;?>admin_home.js'></script>
		<script type='text/javascript'>
		</script>
		</head>
		<body>
		<div>
		  <center><br><br>
		  <table border='2' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='85%' id='AutoNumber1' height='75%'>
		    <tr border='2'>
		      <td width='100%' colspan='2' bgcolor='#C0C0C0'>  <p align='center'><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		      PERSONAL DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>
		      <a target='_top' href='javascript:update_personal_details()'>Edit</a></td>
		    </tr>
		    <tr>
		      <td><font face='Bookman Old Style'>First Name&nbsp; </font></td>
		      <td>&nbsp;<?php echo $arrData['firstname'];?></td>
		    </tr>
		    <tr>
		      <td><font face='Bookman Old Style'>last Name&nbsp; </font></td>
		      <td>&nbsp;<?php echo $arrData['lastname'];?></td>
		    </tr>
		    <tr>
		      <td><font face='Bookman Old Style'>Father Name&nbsp; </font></td>
		      <td>&nbsp;<?php echo $arrData['fathername'];?></td>
		    </tr>		    		    
		    <tr>
		      <td><font face='Bookman Old Style'>Email Id&nbsp; </font></td>
		      <td>&nbsp;<?php echo $arrData['email'];?></td>
		    </tr>		    		    
		    <tr>
		      <td><font face='Bookman Old Style'>Contact Number&nbsp; </font></td>
		      <td>&nbsp;<?php echo $arrData['number'];?></td>
		    </tr>		    		    
		    <tr>
		      <td><font face='Bookman Old Style'>Date Of Birth&nbsp; </font></td>
		      <td>&nbsp;<?php echo $arrData['dob'];?></td>
		    </tr>		    		    
		    <tr>
		      <td><font face='Bookman Old Style'>Contry&nbsp; </font></td>
		      <td>&nbsp;<?php echo $arrData['country'];?></td>
		    </tr>		    		    
		    <tr>
		      <td><font face='Bookman Old Style'>Address&nbsp; </font></td>
		      <td>&nbsp;<?php echo $arrData['address'];?></td>
		    </tr>		    		    
		    <tr>
		      <td><font face='Bookman Old Style'>Pin&nbsp; </font></td>
		      <td>&nbsp;<?php echo $arrData['pin'];?></td>
		    </tr>		    		    		    		
		    <tr>
		      <td width='100%' colspan='2' bgcolor='#C0C0C0'>
		      <p align='center'>&nbsp;</td>
		    </tr>
		    </table>
		  </center>
		</div>
		</body>

</html>
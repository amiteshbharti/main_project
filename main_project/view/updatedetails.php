<?php 
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
{
	header("Location: index.php?controller=login&function=execute_process");
	//	exit();
}

?>
<html>
	<head>
		
		
	</head>
	<body>
<form  name="f1" id="f1">
		<div id="MyResult">
		</div>
		<div><br>
		  <center>
		  <table border="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" height="70%">
		    <tr>
		      <td width="100%" colspan="2" bgcolor="#C0C0C0">
		      <p align="center"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		     UPDATE PERSONAL DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>
		      </td>
		    </tr>
		    		    
		    <tr>
		      <td><font face="Bookman Old Style">First Name&nbsp; </font></td>
		      <td><input type="text" name="txtfname" value="<?php echo $arrData['firstname'];?>" size="40"></td>
		    </tr>
		    
		    <tr>
		      <td><font face="Bookman Old Style">Last Name&nbsp; </font></td>
		      <td><input type="text" name="txtlname" value="<?php echo $arrData['lastname'];?>" size="40"></td>
		    </tr>
		    
		    <tr>
		      <td><font face="Bookman Old Style">Father Name&nbsp; </font></td>
		      <td width="62%" height="20"><input type="text" name="txtfathername" value="<?php echo $arrData['fathername'];?>" size="40"></td>
		    </tr>
		    
		    <tr>
		      <td><font face="Bookman Old Style">Date of Birth&nbsp;</font></td>
		      <td>
		      <input type="text" name="txtdd" value="<?php echo $arrData['day'];?>" size="5"/>&nbsp;
		      <input type="text" name="txtmm" value="<?php echo $arrData['month'];?>" size="5"/>&nbsp;
		      <input type="text" name="txtyyyy" value="<?php echo $arrData['year'];?>" size="6"/>
		      </td>
		    </tr>
		    		    
		    <tr>
		      <td><font face="Bookman Old Style">Email Id</font></td>
		      <td><input type="text" name="txtemailid" value="<?php echo $arrData['email'];?>" size="40"></td>
		    </tr>
		    <tr>
		      <td><font face="Bookman Old Style">Contact No </font></td>
		      <td><input type="text" name="txtcontactnumber" value="<?php echo $arrData['number'];?>" size="40"></td>
		    </tr>
		    
		    <tr>
		      <td><font face="Bookman Old Style">Address </font></td>
		      <td><input type="text" name="txtaddress" value="<?php echo $arrData['address'];?>" size="40"></td>
		    </tr>
		    
		    <tr>
		      <td><font face="Bookman Old Style">Country </font></td>
		      <td><input type="text" name="txtcountry" value="<?php echo $arrData['country'];?>" size="40"></td>
		    </tr>
		    
		    <tr>
		      <td><font face="Bookman Old Style">State </font></td>
		      <td><input type="text" name="txtstate" value="<?php echo $arrData['state'];?>" size="40"></td>
		    </tr>
		    
		    <tr>
		      <td><font face="Bookman Old Style">Pin </font></td>
		      <td><input type="text" name="txtpin" value="<?php echo $arrData['pin'];?>" size="40"></td>
		    </tr>
		
		    <tr>
		      <td width="100%" colspan="2" bgcolor="#C0C0C0" height="19">
		      <p align="center"><input type="button" value="Update" name="btnupdate" onclick="validate1()"/></td>
		    </tr>
		    </table>
		  </center>
		</div>	
		</form>
z		<script type="text/javascript">
			function funcSearch()
			{
				
				$.ajax({ 
	    		      type: "POST",
	    		      url: 'index.php?controller=updatedetails&function=updateData',
	    		      data: $('#f1').serialize(),
	    		      success: function(response)
	    		      {
						alert(response);
					    personal_details();		  
						}

				});
			

				}
		</script>
</body>
</html>

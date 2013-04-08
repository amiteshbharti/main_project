<!--
@author amitesh
Date: 25 march 2013
signup view page
-->

<?php
/*
include("<?php echo VIEW_PATH;?>header.php");
include("<?php echo VIEW_PATH;?>register_user.php");
*/
?>

<html>

<head>
		<script type="text/javascript" src="<?php echo JS_PATH;?>signup.js">
		</script>


</head>
<center>
<body>
<div>
	
	
<div style="overflow:auto; margin-top:40px;">
	<form name=f1 method="POST" action="index.php?controller=signup&function=fun_saveUser" onsubmit="return validate1()" >
	<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="60%" height="75%">
	  <tr>
		<td width="100%" colspan="2" bgcolor="#C0C0C0">
		<p align="center">
		<b>Sign Up </b>
		</td>
          </tr>
          <tr>
          	   <td width="100%" colspan="2" bgcolor="#C0C0C0">
          	 <!--  <b>	<?php
          	   		foreach($errors as $msg)
				echo "<font style ='color:red;'>".$msg."</font><br>";
			?>		
          	   </b>
		-->
          	   </td>
          </tr>

          <tr>
            <td>First Name </td>
            <td>
            <p><input type="text" name="txtfname" size="44"></td>
          </tr>
          <tr>
            <td>Last Name </td>
            <td><input type="text" name="txtlname" size="44"></td>
          </tr>
          <tr>
            <td>Fathers Name </td>
            <td><input type="text" name="txtfathername" size="44"></td>
          </tr>
          <tr>
            <td>User Name </td>
            <td><input type="text" name="txtuname" size="44"></td>
          </tr>
          <tr>
            <td>Password </td>
            <td><input type="password" name="txtpassword" size="44"></td>
          </tr>
          <tr>
            <td>Re-type Password </td>
            <td>
            <input type="password" name="txtretypepassword" size="44"></td>
          </tr>
          <tr>
            <td>Date of Birth</td>
            <td>
			
					<script>
						document.write("<select name=txtdd>");
						document.write("<option value="+"DD"+">"+"DD"+"</option>");
							for(i=1;i<=31;i++)
								{
									document.write("<option value="+i+">"+i);
								}
						document.write("</select>");
					</script>

					<script>
						document.write("<select name=txtmm>");
						document.write("<option value="+"MM"+">"+"MM"+"</option>");
							for(i=1;i<=12;i++)
								{
									document.write("<option value="+i+">"+i);
								}
						document.write("</select>");
					</script>


					<script>
						document.write("<select name=txtyyyy>");
						document.write("<option value="+"YYYY"+">"+"YYYY"+"</option>");
							for(i=1920;i<=2020;i++)
								{
									document.write("<option value="+i+">"+i);
								}
						document.write("</select>");
					</script>
	
	    </td>
          </tr>
          <tr>
            <td>Email-ID </td>
            <td><input type="text" name="txtemailid" size="44"></td>
          </tr>
          <tr>
            <td>Contact Number </td>
            <td>
            <!--webbot bot="Validation" s-display-name="txtvalidate" s-data-type="Integer" s-number-separators="x" b-value-required="TRUE" i-minimum-length="4" i-maximum-length="14" -->
	    <input type="text" name="txtcontactnumber" size="44" maxlength="14">
	    </td><center>
          </tr>
          <tr>
            <td>Address</td>
            <td>
            	<textarea rows="4" name="txtaddress" cols="33"></textarea>
            </td>
          </tr>
          <tr>
            <td>Country </td>
            <td><select size="1" name="txtcountry">
            <option value="Select Country">Select Country              .
            </option>
            <option value="India">India</option>
            <option value="Us">Us</option>
            <option value="Uk">Uk</option>
            <option value="pakistan">pakistan</option>
            <option value="Australia">Australia</option>
            </select></td>
          </tr>
          <tr>
            <td width="30%">State </td>
            <td width="70%">
            <input type="text" name="txtstate" size="44"></td>
          </tr>
          <tr>
            <td>Pin </td>
            <td>
            <!--webbot bot="Validation" s-data-type="Integer" s-number-separators="x" -->
            <input type="text" name="txtpin" size="44">
            </td>
          </tr>
          <tr>
            <td width="100%" colspan="2">
            <p align="center">
            <input type="submit" value="Submit" name="btnsubmit">
            <input type="reset" value="Reset" name="btnreset">
            <!--<input type="button" value="BackToHome" name="btnbacktohome" onClick="load(' login.php')" > -->   
            <a href="index.php?controller=login" >BackToHome</a>       
            </td>
          </tr>
        </table>
        </form>  
</div>
 <div style="height:20%;position:relative;background: url('images/footer.jpeg') repeat scroll center bottom;">	
</div> 
</body>
</center>
</html>



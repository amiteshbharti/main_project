<?php 
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
{
	header("Location: index.php?controller=login&function=execute_process");
	//	exit();
}

?>

<html>
<head><body>
	<form name="f1" id="f1" >
	<div id="MyResult"></div>
	<div>
  <center><br>

  <table border="2" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="80%">
    <tr>
      <td width="100%" colspan="2" bgcolor="#C0C0C0">
      <p align="center">CHANGE PASSWORD !</td>
    </tr>
    <tr>
      <td width="38%">Old Password :</td>
      <td width="62%">&nbsp;<input type="password" name="txtoldpass" size="20"></td>
    </tr>
    <tr>
      <td width="38%">New password :</td>
      <td width="62%">&nbsp;<input type="password" name="txtnewpass" size="20"></td>
    </tr>
    <tr>
      <td width="38%">Retype New Password:</td>
      <td width="62%">&nbsp;<input type="password" name="txtretypepass" size="20"></td>
    </tr>
    <tr>
      <td width="100%" colspan="2" bgcolor="#C0C0C0">
      <p align="center"><input type="button" value="Update" name="btnupdate" onclick="validatePassword_js()"/>&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="reset" value="Reset" name="B2"></td>
    </tr>
    </table>
  </center>
</div>
</form>
	<script type="text/javascript">
			function updatePassword_ajax()
			{
				
				$.ajax({ 
	    		      type: "POST",
	    		      url: 'index.php?controller=changepassword&function=show_details',
	    		      data: $('#f1').serialize(),
	    		      success: function(response)
	    		      {
						alert(response);
							//	change_password();
					    		  
                         }

				});
				
				
				
				//alert("dsfdf");
			

				}
	</script>
	
</body>
</html>

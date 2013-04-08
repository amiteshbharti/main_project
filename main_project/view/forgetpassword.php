<!--
/**
* This is the captcha implementatin 
*
* This is to to prevent bot to register
*
* LICENSE: Some license information
*
* @category   Zend
* @package    Zend_Magic
* @auther     Amitesh
* @copyright  Copyright (c) osscube.com Inc. (http://www.zend.com)
* @license    http://framework.zend.com/license   BSD License
* @version    $Id:$
* @link       http://framework.zend.com/package/PackageName
* @since      File available since Release 1.5.0
*/
-->


<?php
		
	echo "<center><table class='captcha_code_table'><tr><td></td></tr><tr><td>Password Recovery Window</td></tr></table></center><br/><br/><br/><br/><br/><br/><br/>";
	//$rand.toSting();
       
?>

<html>
		<head>
				
				<script type="text/javascript" src="<?php echo SITE_PATH;?>js/jquery.js"></script>
                               
				<style type="text/css">
						
		
						div.background
						{
								width:500px;
								height:250px;
								background:url('images/forget_bck.jpeg') repeat;
								border:2px solid black;
								margin-left:30%;
						}
						
					      div.transbox
						{
								width:400px;
								height:180px;
								margin:30px 50px;
								background-color:#ffffff;
								border:1px solid black;
								opacity:0.8;
								filter:alpha(opacity=60); /* For IE8 and earlier */
								
								
						}
					   
						 div.transbox table 
						 {
								 font-size: larger;
								 font-family: serif;
								 color: rgb(0,0,255);	
						 }
						 
						 .captcha_code_table
						 {
								  font-size: larger;
								 font-family: serif;
								 font-weight:bold;
								 color:  rgb(0,0,255);
								 background-color: rgb(172,255,255);
						 }
				               #captcha_body
					       {
								width:100%;
								height:100%;
								/*background:url('images/forget_bck.jpeg') repeat;*/
								border:4px solid black;
					       }
					       .captcha_button
					       {
								border:2px solid black;
					       }
				</style>
		</head>
	<body id="captcha_body" >
				
				
				
			<div class="background">
				<div class="transbox">
						<form name='f1'>  
						<table border="1">
							     <tr><td colspan="2" >Have you forgot the password ??</td></tr>
							       <tr><td colspan="2">dont worry...........!!</td></tr>
							       <tr><td colspan="2">Enter the field maintioned below :</td></tr>
							       <tr><td ></td></tr>
						        
							        <tr><td>Enter your username:</td>
							            <td ><input class="captcha_button" size="9" id ="uname" type="text" name="uname"/></td>
							        </tr>
							         <tr><td>Enter your emailid:</td>
							            <td ><input class="captcha_button" size="9" id ="eid" type="text" name="eid"/></td>
							        </tr>
								<tr><td colspan="2"><center><input type="button" id ="sub" name="sub" value="submit"/><input type="reset" value="reset"/></center></td></tr>
						</table>
						   
					   <form>
				</div>
		  </div>
	
				
</body>
		
	<script type="text/javascript">
	    $(document).ready(function() {
			 $("#sub").click(function() {
					eid= $("#eid").val();
					uname= $("#uname").val();
				$.ajax({
					type: "POST",
					 url: 'index.php?controller=login&function=passwordRecovery',
					data: "uname="+uname+"&eid="+eid,
					 success: function(result) {
					//$("div").html(result);
					var response = result;
					
						alert(response);	
					}	
					
			   });  
					
				
		   });
	});
	</script>
		
</html>


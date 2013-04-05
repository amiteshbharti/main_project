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
* @subpackage Wand
* @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
* @license    http://framework.zend.com/license   BSD License
* @version    $Id:$
* @link       http://framework.zend.com/package/PackageName
* @since      File available since Release 1.5.0
*/
-->


<?php
		$min=998888888;
                $max=999999999;
	

	
	$rand =rand($min,$max);
	echo "<center><table class='captcha_code_table'><tr><td></td></tr><tr><td>The given CAPTCHA text is below:</td></tr><tr><td></td></tr><tr><td></td></tr></table><input class='captcha_button' type='button' value=$rand></center><br/><br/><br/><br/><br/>";
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
								background:url('images/captcha.jpg') repeat;
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
					      div.transbox p
						{
								margin:30px 40px;
								font-weight:bold;
								color:#555555;
								
						}
						 div.transbox p table 
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
								/*background:url('images/captcha2.jpg') repeat;*/
								border:2px solid black;
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
						<p>
							<table><tr><td>Are u really a human?</td></tr>
							       <tr><td></td></tr>
							       <tr><td>Enter the above maintioned text below :</td></tr>
							       <tr><td></td></tr>
						        </table>
							<center>
							<table border="1">
							        <tr><td ><input class="captcha_button" size="9" id ="captcha" type="text" name="captcha"/></td></tr>
								<tr><td><input type="button" id ="sub" name="sub" value="submit"/><input type="reset" value="reset"/></td></tr>
							</table>
							</center>
							     
								
								
								
						</p>
						</form>
				</div>
				</div>
		</body>
		
	<script>
		$(document).ready(function() {
		    $("#sub").click(function() {
				captcha= $("#captcha").val();
			$.ajax({
			    type: "POST",
			     url: 'index.php?controller=signup&function=captchaProcessing',
			    data: "captcha="+captcha+"&rand="+"<?php echo $rand?>",
			     success: function(result) {
				//$("div").html(result);
				var response = result;
				if(response == 1)
				{
						
				    window.location = "index.php?controller=signup&function=load_signup";		
				}else{
				    
				    window.location = "index.php?controller=signup&function=captcha&flag=1";
				}
				
			    }
			});  
			
		    });
		});
	</script>
		
</html>


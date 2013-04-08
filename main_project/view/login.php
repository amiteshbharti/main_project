<html>
<head>
<style type="text/css">

</style>

<script type="text/javascript">
<!--
var image1=new Image()
image1.src="../images/con.jpg"
var image2=new Image()
image2.src="../images/hhh.jpg"
var image3=new Image()
image3.src="../images/aj.jpg"
var image4=new Image()
image4.src="../images/jj.jpg"
//-->
</script>
<link rel="shortcut icon" type="image/x-icon" href="/visual/images/favicon.ico" />

<link href="<?php echo SITE_PATH;?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo SITE_PATH;?>css/bootstrap.css" rel="stylesheet" />
<link href="<?php echo SITE_PATH;?>css/Oswald" rel="stylesheet" type="text/css">
<link href="<?php echo SITE_PATH;?>cdd/Droid+Sans" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_PATH;?>css/styl.css"/>
<script type="text/javascript" src="<?php echo SITE_PATH;?>jq/jquery.js"></script>
<script type="text/javascript" src="<?php echo SITE_PATH;?>jq/js.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body,td,th {
	background-color: #272b30;
}
-->
</style></head>
<body>


<div id="home1" >
<?php /*
					if($errors)
					{
						foreach($errors as $key=>$val)
							{
								echo "<font color=white size=2>"." ".$val."</font>";			
							}	
					}
	*/			?>

<table cellpadding="7px">
  
  <tr>
<form action="<?php echo SITE_PATH;?>index.php?controller=login&function=check_details" method="post" id="f1">
       <td><input type="text" class="input-small" name="username" placeholder="Username" style="background-color:  #272b30;color:white;height:40px; width:270px;"></td>
      <td><input type="password" class="input-small" name="passwd" placeholder="Password" style="background-color:  #272b30;color:white;height:40px; width:270px;"></td>
    <td> <button type="submit" id="Button_signin" class="btn" style="background-color:#1589FF;">Go </button></td>

</form>


 <td><button type="submit" class="btn" onClick="window.location='index.php?controller=login&function=loadforgetPassword'" style="background-color:#1589FF;">Forgot Password </button></td>
 <td><button type="submit" class="btn" onClick="window.location='index.php?controller=signup&function=captcha'" style="background-color:#1589FF;">Sign Up!</button></td><td></td><td></td>
 <td><a href="<?php echo SITE_PATH;?>index.php?controller=login&function=about" class="btn btn-info"><i class="icon-exclamation-sign icon-white"></i> About Us</a></td>
 <td><a href="<?php echo SITE_PATH;?>index.php?controller=login&function=contact" class="btn btn-info"><i class="icon-exclamation-sign icon-white"></i> Contact Us</a></td>
   
  </tr>

</table>

</div>       
    
    
    <div id="pic"></div>
<!--
<div id="pic">

<img src="<?php echo IMAGE_PATH;?>con.jpg" name="slide" width="100%" height="543px" />
		


				
<script>

//variable that will increment through the images
var step=1
function slideit(){
//if browser does not support the image object, exit.
if (!document.images)
return
document.images.slide.src=eval("image"+step+".src")
if (step<4)
step++
else
step=1;
								
							 
//call function "slideit()" every 2.5 seconds
setTimeout("slideit()",1500)
}
slideit()
//
</script>

</div>
-->
<div id="end">
	
</div>
</body>
</html>

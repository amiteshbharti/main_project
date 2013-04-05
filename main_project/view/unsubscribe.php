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
	<!--<form method="get" action="<?php echo SITE_PATH;?>index.php?controller=managetest&function=manageUnsubsciption">-->
	<form action="<?php echo SITE_PATH;?>index.php?controller=managetest&function=manageUnsubsciption" method="post" id="f1">
		<center>
		<div>
			<div style="color:#347c2c;">
				<p align="justify"><b>Do you really want to unsubscribe from that site.if yes then you are not able to access any information related to you or your test and etc.so still if you want then enter current password and click on Yes. </b></p>
			</div>
			<div>
				Enter Password: <input type="password" name="pass" >&nbsp;&nbsp;&nbsp;
			<!--	<input type="hidden" name="hidden" value="yes"> -->
				<input type="submit" value="yes">
			</div>
		</div>
		</center>
	</form>
	</body>
</html>

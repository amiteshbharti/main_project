<?php 
if(!isset($_SESSION['username']))
{
	header("Location: index.php?controller=login&function=execute_process");
	exit();
}

?>
<html>
<head>
		<title>
			USER HOME PAGE
		</title>
		<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.validate.pack.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>user_home.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>signup.js"></script>	
		<script type="text/javascript" src="<?php echo JS_PATH;?>update.js"></script>

</head>

	</head>
	<body>
		<div id="id_box">
	     		<div class="block">
				<div class="block-top">
				</div>
			
				<div class="block-bottom"> 
					<ul>

					<li><a href="javascript:personal_details()">Personal Details</a></li>
					<li><a href="javascript:change_password()">Change Password</a></li>
					<li><a href="javascript:start_test()">Start Test</a></li>
					<li><a href="javascript:resume_test()">Resume Test</a></li>
					<li><a href="javascript:check_certifications()">Check Certifications</a></li>
					<li><a href="javascript:unsubscribe()">Unsubscribe</a></li>
					<li class="noborder"><a href="<?php echo SITE_PATH;?>index.php?controller=userhome&function=logout">Logout</a></li>
					</ul>
				</div>
				
			</div>
		<div id="id_box_bottom">
			&nbsp;
		</div>	
	</div>
	<div id="admin_content">
		<?php
			if(isset($_REQUEST['value'])){
			
				echo "<br><br><br><br><center>Test is completed or not exists.</center>";
			
			}
		?>
	</div>	
<!-- <div id="footer">
	</div>  -->	   
	</body>
</html>

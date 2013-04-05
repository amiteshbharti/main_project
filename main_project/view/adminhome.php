<?php 
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
{
	header("Location: index.php?controller=login&function=execute_process");
	//	exit();
}

?>

<html>
	<head>
		<title>
			ADMIN HOME PAGE
		</title>
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.validate.pack.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>admin_home.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>signup.js"></script>	
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
					<li><a href="javascript:list_user()">List All Users</a></li>
					<li><a href="javascript:check_log()">Check Log Files</a></li>
					<li><a href="javascript:manage_test()">Manage Tests</a></li>
					<li><a href="javascript:unsubscribe()">Unsubscribe</a></li>
					<li class="noborder"><a href="<?php echo SITE_PATH;?>index.php?controller=adminhome&function=logout">Logout</a></li>
					</ul>
				</div>
				
			</div>
		<div id="id_box_bottom">
			&nbsp;
		</div>	
	</div> 
	<div id="admin_content">

	</div>
<!-- <div id="footer">
	</div>  -->	
	</body>
</html>


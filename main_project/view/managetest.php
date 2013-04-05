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
	<div style="width:90%;height:58%;">
		<div style="width:30%;float:left;border:1px solid black;">
			<div style="background-color:#C0C0C0;height:10%">
			</div>	
			<div style="background-color:#7D9EC0;height:90%"><br>
				 <ul>
				 	<li><a href="javascript:add_new_test()">Add New Test</a></li><br>
				 	<li><a href="javascript:listing_test()">Enable/Disable Test</a></li><br>
				 	<li><a href="javascript:add_new_question()">Add New Questions</a></li><br>
				 	<li><a href="javascript:view_all_question()">View All Questions</a></li>
				 </ul> 
			</div>			
		</div>	
		<div style="width:100%;border:1px solid black;">
			<div style="background-color:#CC9900;height:10%">
				<b>Test Paper Management&nbsp; &gt;&gt;</b>
			</div>	
			<div id="manage_test" style="height:90%">

			</div>	
		</div>	
	<div>
</body>
</html>


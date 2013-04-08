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
		<div>
			<table border='1' cellpadding='2' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber2'>
			  <tr>
			    <td width='100%' bgcolor='#999966'>
			    <p align='center'><span style='font-size: 8.5pt; color: #333333'><b>
			    <span style='font-family: Verdana'>&nbsp;&nbsp;&nbsp;
			    <a target='_top' href='user_home.php'>BACK TO HOME</a>&nbsp;&nbsp;&nbsp;&nbsp; 
			    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			    <a target='_top' href=\"end_test.php?val=$temp_table_name\">END TEST</a>
			    </span></b></span></td>
			  </tr>
			</table>
		</div>
		<div style=\"background-color:#C0C0C0;\">
		<?php 
			
             //SHOWING QUESTIONS TO USER....................................................
				$i=1;
				echo "<center>";
				for ($i=1;$i<=20;$i=$i+1)
				{
					
				?><b><a href="index.php?controller=usertest&function=quessId&qid=<?php echo $i;?>&val=<?php echo $_SESSION['testname'];?>"><?php echo $i;?></a> </b>
<?php 					
				}
				echo "</center>";
			
		?>
		
	</div><br>
	<div style=\"background-color:#f6f6f5;width:100%;overflow:auto;\">
		
		
	
			
		
	</div>
	<div style=\"position:absolute;background: url('images/footer-fade.jpg') repeat scroll center bottom;width:100%;height:20%;margin-top:17.7%;\">
	</div>
	</body>
	</html>
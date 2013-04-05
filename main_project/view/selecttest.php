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
			<div>
			<form action="<?php echo SITE_PATH;?>index.php?controller=managetest&function=questionsViewed" method="post"><br><br><br><br><br><br>
				<table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="51%" id="AutoNumber1">
					<tr> 
						<td width="100%" colspan="2">Select Test :&nbsp; 
							<select size="1" name="testname">
								<option name="selecttest">select</option>
  <?php
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');

$config = array();
						$config['user'] = 'root';
						$config['pass'] = 'root';
						$config['name'] = 'online_test';
						$config['host'] = 'localhost';
						$config['type'] = 'mysql';
						$config['port'] = null;
						$config['persistent'] = true;
						$db = db::instance($config);

while($row=$arrData->fetch(PDO::FETCH_ASSOC))
{
    
    
?>
                                                                <option value=<?php echo $row['test_name'].'>'.$row['test_name']; } ?></option>
                                                                </select> &nbsp;&nbsp;&nbsp;&nbsp;
							<input type="hidden" name="hidden" value="view">							
							<input type="submit" value="Submit">    
		        		</td>
		        	</tr>
		      </table>
		   </form>
		   </div>
		   <div> 
		   </div>
		 </div>
	</body>
</html>
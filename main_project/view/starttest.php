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
    
<form name="form1" method="post" action="<?php echo SITE_PATH; ?>index.php?controller=usertest&function=testId" onsubmit="validate()"><br/>
	<center>
	<table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="75%" id="AutoNumber1">
		<tr>
			<td width="100%" colspan="2">Select Certification :&nbsp; 
			<select size="1" name="testname">
				<option selected value="select">select</option>
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
    
    
    
                                <option value=<?php echo $row['test_name']; ?>><?php echo $row['test_name']; }?></option>
                                
                                </select> &nbsp;&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
		<tr>
			<td width="100%" colspan="2">
				<center><input type="submit" value="Submit"></center>
			</td>
		</tr>
	</table>
	</center>
</form>
</div> 
<div id="MyResult">
</div>
</body>
</html>

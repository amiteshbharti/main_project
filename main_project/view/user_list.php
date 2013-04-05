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
	<center>
	<body>
<div>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="80%" id="AutoNumber1">
  
  <tr>
    <td width="100%">
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" >
      <tr>
        <td width="100%">

  <table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="101%" id="AutoNumber1" height="21">

<tr>
    <td width="21%" bgcolor="#808080" height="1">
    <span style="font-size: 8.5pt; color: #C0C0C0"><b>
    <span style="font-family: Verdana">User Name</span></b></span></td>
    
    <td width="27%" bgcolor="#808080" height="1">
    <span style="font-size: 8.5pt; color: #C0C0C0"><b>
    <span style="font-family: Verdana">Full Name</span></b></span></td>
    
    <td width="18%" bgcolor="#808080" height="1">
    <span style="font-size: 8.5pt; color: #C0C0C0"><b>
    <span style="font-family: Verdana">Contact No</span></b></span></td>
    
    <td width="35%" bgcolor="#808080" height="1">
    <span style="font-size: 8.5pt; color: #C0C0C0"><b>
    <span style="font-family: Verdana">Location</span></b></span></td>
  </tr>

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

<tr>
			    <td width='21%' bgcolor='#C0C0C0' height='1' align='left'>
				    <span style='font-size: 8.5pt; line-height: 115%; font-family: Verdana; color: black'>
				    <font color='#336699'><span style='line-height: 115%'>
				<?php    echo    $row['user_name']; ?>
				    </span></font></span>
				</td>
				    
			    <td width='27%' bgcolor='#C0C0C0' height='1' align='left'>
				    <span style='font-size: 8.5pt; line-height: 115%; font-family: Verdana; color: black'>
				    <font color='#336699'><span style='line-height: 115%'>
				<?php    echo  $row['first_name']; ?> &nbsp;&nbsp; <?php echo $row['last_name'];  ?>  
				    </span></font></span>
				</td>
				    
				<td width='18%' bgcolor='#C0C0C0' height='1' align='left'>
			    	<span style='font-size: 8.5pt; line-height: 115%; font-family: Verdana; color: black'><font color='#336699'><span style='line-height: 115%'>
			    		<?php echo $row['contact_no']; ?>
			    	</span></font></span>
			    </td>
			    
			    <td width='35%' bgcolor='#C0C0C0' height='1' align='left'>
			    <span style='font-size: 8.5pt; line-height: 115%; font-family: Verdana; color: black'><font color='#336699'><span style='line-height: 115%'>
			  <?php echo $row['state'];?>[<?php echo $row['country']."]"; }?> 	</span></font></span></td>
			</tr>
    </table>        
        </td>
      </tr>
      </table>
    </td>
  </tr>

  <tr>
    <td width="100%" bgcolor="#7D9EC0">
    <p align="center">--- All Rights Reserved ---</td>
  </tr>
</table>
</div>
</body>

</html>
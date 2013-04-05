<?php 
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
{
	header("Location:index.php?controller=login&function=execute_process");
		
}

?>
<html>

	<head>
	</head>
	<center>
	<body>
<div style="overflow:auto;">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="85%">
  
  <tr>
    <td width="100%">
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
      <tr>
        <td width="100%">

	
  <table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="35%">
	
	<tr>
    <td width="15%" bgcolor="#C0C0C0" height="15">
    <span style="font-size: 8.5pt; color: #333333"><b>
    <span style="font-family: Verdana">User Name</span></b></span></td>
    
    <td width="11%" bgcolor="#C0C0C0" height="15">
    <span style="font-size: 8.5pt; color: #333333"><b>
    <span style="font-family: Verdana">I.P. Address</span></b></span></td>
    
    <td width="18%" bgcolor="#C0C0C0" height="15">
    <span style="font-size: 8.5pt; color: #333333"><b>
    <span style="font-family: Verdana">Access Date</span></b></span></td>
    
    <td width="32%" bgcolor="#C0C0C0" height="15">
    <span style="font-size: 8.5pt; color: #333333"><b>
    <span style="font-family: Verdana">Browser Details</span></b></span></td>
    
    <td width="8%" bgcolor="#C0C0C0" height="15">
    <span style="font-size: 8.5pt; color: #333333"><b>
    <span style="font-family: Verdana">Port Used</span></b></span></td>
    
    <td width="16%" bgcolor="#C0C0C0" height="15">
    <span style="font-size: 8.5pt; color: #333333"><b>
    <span style="font-family: Verdana">Machine Name</span></b></span></td>
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
			    <td width='15%' height='19'><span style='font-size: 8.5pt; line-height: 115%; font-family: Verdana; color: black'>
			    <font color='#336699'><span style='line-height: 115%'><?php echo $row['username'];?> </span></font></span></td>
			    
			    <td width='11%' height='19'><span style='font-size: 8.5pt; line-height: 115%; font-family: Verdana; color: black'>
			    <font color='#336699'><span style='line-height: 115%'><?php echo $row['ip_address'];?> </span></font></span></td>
			    
			    <td width='18%' height='19'><span style='font-size: 8.5pt; line-height: 115%; font-family: Verdana; color: black'>
			    <font color='#336699'><span style='line-height: 115%'><?php echo $row['access_date'];?> </span></font></span></td>
			    
			    <td width='32%' height='19'><span style='font-size: 8.5pt; line-height: 115%; font-family: Verdana; color: black'>
			    <font color='#336699'><span style='line-height: 115%'><?php echo $row['browser_details'];?> </span></font></span></td>
			    
			    <td width='8%' height='19'><span style='font-size: 8.5pt; line-height: 115%; font-family: Verdana; color: black'>
			    <font color='#336699'><span style='line-height: 115%'><?php echo $row['port'];?> </span></font></span></td>
			    
			    <td width='16%' height='19'><span style='font-size: 8.5pt; line-height: 115%; font-family: Verdana; color: black'>
			    <font color='#336699'><span style='line-height: 115%'><?php echo $row['machine_name'];}?> </span></font></span></td>
			  </tr>
                          </table>   
 <p>&nbsp;</p>
 <p>&nbsp;</p>
  <p>&nbsp;</td>
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

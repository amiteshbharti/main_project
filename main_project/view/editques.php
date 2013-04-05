<?php 
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
{
	header("Location: index.php?controller=login&function=execute_process");
	//	exit();
}

?>

<html>
<body>

<div>	
			<table border='1' cellpadding='2' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber2'>
			  <tr>
			    <td width='100%' bgcolor='#999966'>
			    <p align='center'><span style='font-size: 8.5pt; color: #333333'><b>
			    <span style='font-family: Verdana'>&nbsp;&nbsp;&nbsp;
			    <a  href='<?php echo SITE_PATH;?>index.php?controller=adminhome&function=loadAdminHome'>BACK TO ADMIN CONTROL PANEL</a>&nbsp;&nbsp;&nbsp;&nbsp; 
			    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 
			    </span></b></span></td>
			  </tr>
			</table>
			 <?php
include 'header.php';
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
			
			<form name='f1' action='<?php echo SITE_PATH;?>index.php?controller=managetest&function=quesUpdate&qid=<?php echo $row["qno"]; ?>' method='post'>  		
 	    	<table border='1' cellpadding='2' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber1'>
			  <tr>
			    <td width='100%' colspan='2'>Question Id :&nbsp;<?php echo $row["qno"]; ?></td>
			  </tr>
			  <tr>
			    <td width='100%' colspan='2'><textarea rows='6' name='question' cols='57'><?php echo $row["question"]; ?></textarea></td>
			  </tr>
			  <tr>
			    <td width='54%'>A:<input type='text' name='A' value='<?php echo $row["A"]; ?>' size='20'></td>
			    <td width='46%'>B:<input type='text' name='B' value='<?php echo $row["B"]; ?>' size='20'></td>
			  </tr>
			  <tr>
			    <td width='54%'>C:<input type='text' name='C' value='<?php echo $row["C"]; ?>' size='20'></td>
			    <td width='46%'>D:<input type='text' name='D' value='<?php echo $row["D"]; ?>' size='20'></td>
			  </tr>
			  
			  
			  
			    <tr>
			    <td width='54%'>Correct Answer :</td>
			    <td width='46%'>
			    <select size='1' name='ans'>
				    <option selected><?php echo $row["ans"]; ?></option>
			  
	  if($row->ans!='A')			    
		echo"    <option value='A'>A</option>";
	  if($row->ans!='B')				    
		echo"    <option value='B'>B</option>";
		  if($row->ans!='C')
		echo"    <option value='C'>C</option>";
	  if($row->ans!='D')				    
		echo"    <option value='D'>D</option>";
		
		 </select></td>
			  </tr>
			
			<?php } ?>
			  <tr>
			    <td width='100%' colspan='2' rowspan='3'>
				    <p align='center'>&nbsp;&nbsp;&nbsp;
				    <input type='submit' value='Update' name='btnupdatequestion'>
			    </td>
			  </tr>
			</table></center>
		</form>
		
		<center>	
		  <table border='1' cellpadding='2' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber2'>
			  <tr>
			    <td width='100%' bgcolor='#999966'>&nbsp; </td>
			  </tr>
			</table>
			</center>
	    </div>
	    <div style='background: url(\"../images/footer.jpeg\") repeat scroll center bottom;width:100%;height:20%;margin-top:12%;'>
	    </div>
	 

</body>

</html>

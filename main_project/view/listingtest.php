<?php 
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
{
	header("Location: index.php?controller=login&function=execute_process");
	//	exit();
}

?>
<html>
    <body>

<div id="MyResult" style="overflow:auto;width:100%;">
  
  	<form name="myForm">
  <table border="2" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="70%" id="AutoNumber1" height="100%">
    <tr>
      <td width="100%" bgcolor="#C0C0C0">
      <p align="center"><b>LISTING CERTIFICATIONS STATUS</b></td>
    </tr>
    <tr>
      <td width="100%">&nbsp;<div align="center">
        <center>
        <table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="97%" id="AutoNumber2">
          <tr>
            <td width="30%" align="center" bgcolor="#CCCCCC">
            <font color="#336699">
            <span style="font-family: Verdana; font-size: 8.5pt">NAME OF </span></font><span style="font-size: 8.5pt; line-height: 115%; font-family: Verdana; color: black"><font color="#336699"><span style="line-height: 115%">
            CERTIFICATION </span></font></span></td>
            <td width="24%" align="center" bgcolor="#CCCCCC">
            <font color="#336699">
            <span style="font-family: Verdana; font-size: 8.5pt">&nbsp;STATUS</span></font></td>
            <td width="44%" align="center" bgcolor="#CCCCCC">
            <font color="#336699">
            <span style="font-family: Verdana; font-size: 8.5pt">ACTION</span></font></td>
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
	
	$a="";
    if($row['test_status']=='ACTIVE')
    {
    	
    	$action='DISABLE';
    
    			
    }    	else if($row['test_status']=='DISABLE')
    {
    	$action='ACTIVE';
				
    }
?>

<tr>
			            <td width='30%' align='center'><font color='#336699'>
			            <span style='font-family: Verdana; font-size: 8.5pt'> <?php echo $row['test_name']; ?> </span></font></td>
			            <td width='24%' align='center'><font color='#336699'>
			            <span style='font-family: Verdana; font-size: 8.5pt'> <?php echo $row['test_status']; ?></span></font></td>
			            <td width='44%' align='center'><font color='#336699'>
			            <span style='font-family: Verdana; font-size: 8.5pt'>
                                    <input type='button' id="b1" value="<?php echo $action?>"  onclick="funcSearch(' <?php echo trim($row['test_name']); ?>','<?php echo trim($action); ?>')">
			            </span></font></td>
			        </tr>
<?php } ?>


        </table>
        </center>
        </div>
      </td></tr></p></td>
      </tr>
  </table>
        </form>
</div>

        <script type="text/javascript">
			function funcSearch(id,val)
			{
//var values	=	stat;
//alert('fsdfds');
				
				$.ajax({ 
	    		      type: "POST",
	    		      url: 'index.php?controller=managetest&function=changeStatus',
	    		      data: 'name='+id+'&value='+val,
	    		      success: function(response)
	    		      {
						//alert("Status Disabled");

						listing_test();	
	    		    	 
					    }

				});
			

				}

			
	</script>


    </body>
</html>
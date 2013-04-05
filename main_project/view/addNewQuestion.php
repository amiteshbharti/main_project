<?php 
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
{
	header("Location: index.php?controller=login&function=execute_process");
	//	exit();
}

?>


<html>
	<head>
	<script type="text/javascript" src="jquery/jquery.js"></script>
	<script type="text/javascript" src="jquery/jquery.validate.pack.js"></script>
	<script type="text/javascript" src="ajaxsbmt.js"></script>
	
	</head>
	<body>
	<div id="MyResult" style="background-color:#C0C0C0;">
	</div>
		<div>	
	<form name="myForm" id="myForm">					
				<table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="70%	%" height="88%">
  					<tr>
    					<td width="100%" colspan="2">Select Test :&nbsp;
		    			<select size="1" name="testname"> 
		    			<option selected>select</option>
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
                                        <option value=<?php echo $row['test_name'].'>'. $row['test_name']; }?></option>
                                        </select>
                                        </td>
  					</tr>
  					<tr>
						<td width="100%" colspan="2">
							<textarea rows="5" cols="50" name="question" id='q'></textarea>
							<!-- <textarea rows="6" name="question" cols="57">
							</textarea> -->
						</td>
				  </tr>
				  <tr>
				  		<td width="46%">A:<input type="text" name="A" id='a' size="20"/>
				  		</td>
    					<td width="46%">B:<input type="text" name="B" id='b' size="20"/>
    					</td>
				  </tr>
  				  <tr>
    					<td width="46%">C:<input type="text" name="C" id='c' size="20"/>
    					</td>
				      <td width="46%">D:<input type="text" name="D" id='d' size="20"/>
				      </td>
				  </tr>
			     <tr>
    					<td width="54%">Correct Answer :
    					</td>
    					<td width="46%">
    						<select size="1" name="ans">
    						<option selected>select</option>
    						<option value="A">A</option>
    						<option value="B">B</option>
    						<option value="C">C</option>
    						<option value="D">D</option>
    						</select>
    					</td>
  				 </tr>
  				 <tr>
    					<td width="100%" colspan="2" rowspan="3">
    						<input type="hidden" name="addtest" value="yes">
    						<input type="button" value="Submit" onclick="funcSearch()">
    						<input type="reset" value="Reset" name="B2">
    					</td>
  				 </tr>
			</table>
		</form>
	</div>
                <script type="text/javascript">
			function funcSearch(id,val)
			{
				
				$.ajax({ 
	    		      type: "POST",
	    		      url: 'index.php?controller=managetest&function=questionAdded',
	    		      data: $("#myForm").serialize(),
	    		      success: function(response)
	    		      {
						alert(response);
						$('#a').val('');
						$('#b').val('');
						$('#c').val('');
						$('#d').val('');
						$('#q').val('');
					    		  
}

				});
			

				}
	</script>

                
	</body>
</html>
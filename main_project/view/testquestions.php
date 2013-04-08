<html>
    <head>
		<title>
		New Question
		</title>
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.validate.pack.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>user_home.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>signup.js"></script>	
<script type="text/javascript">
    window.onbeforeunload = function() {
        return "Dude, are you sure you want to leave? Think of the kittens!";
    exit();
    }
    
    
</script>

	
    </head>
	
    <body>
<div id="questions">
	<form id='myForm'>
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
    
    $qids	=	$row['qtempsrno'];
    $qid=$qids+1;
    $pid=$qids-1;
?>

    
	    <table>
		<tr>
		    <td>
			Q<?php echo $qids; ?>)
		 	 <?php echo $row['question']; ?>
		    </td>
		</tr>
	    </table>
	    <table>
		<tr>
		    <td>
		    A)<?php 
		    if($row['tempans']=='A')
		    {
			echo "<input type='radio' name='R1' id='R1' value='A' checked>${row['A']}";
			}else{ 
			echo "<input type='radio' name='R1' id='R1'' value='A'>${row['A']}";
		    }
			 ?>
		    </td>
		    <td>
		    B)<?php 
		    if($row['tempans']=='B')
		    {
			echo "<input type='radio' name='R1' id='R1' value='B' checked>${row['B']}";
		    }else{ 
			echo "<input type='radio' name='R1' id='R1' value='B'>${row['B']}";
		    }
			 ?>
			 </td>
		</tr>
		
		<tr>
		    <td>
		    C)<?php 
		    if($row['tempans']=='C')
		    {
			echo "<input type='radio' name='R1' id='R1' value='C' checked>${row['C']}";
		    }else{ 
			echo "<input type='radio' name='R1' id='R1' value='C'>${row['C']}";
		    }
			 ?>
		    </td>
		    <td>
		    D)<?php 
		    if($row['tempans']=='D')
		    {
			echo "<input type='radio' name='R1' id='R1' value='D' checked>${row['D']}";
		    }else{ 
			echo "<input type='radio' name='R1' id='R1' value='D'>${row['D']}";
		    }
}
			 ?>		    </td>
		</tr>
		
		
		
	    </table>
	    <table>
		<tr>
		<td>
			    <a href="javascript:previousQues(<?php echo $pid; ?>)">Previous</a>
		    </td>
		
		    <td>
			<a href="javascript:nextQuestion(<?php echo $qid; ?>)">Next</a>
		    </td>

			<td>
			<input type="button" name="Submit" value="submit" onclick="getCalc(<?php echo $qids; ?>)">
		    </td>
		    
		    
		</tr>
		
	    </table>
	    
	</form>
</div>

	<script type="text/javascript">

	//window.setInterval(getCalc(<?php echo $qids; ?>), 100000);	
/*	window.setInterval(function() {
    getCalc(<?php// echo $qids; ?>);
}, 10000);	*/
//setTimeout(function() {getCalc(<?php echo $qids; ?>)}, 10000);

function nextQuestion(id)
			{
				

				
				
			    
			    var ans	=	$("input:radio[name='R1']:checked").val();

			    if ($("#R1:checked").length == 0){
					alert('Please Select any Option First');
					
				}else if (id<1)
			{
			    alert("You are at the first Question");
			}else if (id>20) {
			    alert("You have reached the Last Question.Please Click on Button to end test");
			    $('#questions').load("index.php?controller=usertest&function=updateLast&qid="+id+"&R1="+ans);
					}else{
			
						$('#questions').load("index.php?controller=usertest&function=nextQues&qid="+id+"&R1="+ans);
			}

				}
			function previousQues(id)
			{
				if (id<1)
				{
				    alert("You are at the first Question.Click on Next to see Next Question");
				}
			    var ans	=	$("input:radio[name='R1']:checked").val();
				$('#questions').load("index.php?controller=usertest&function=previousQues&qid="+id+"&R1="+ans);
	

				}

			function getCalc(id)
			{
				var ans	=	$("input:radio[name='R1']:checked").val();
				$('#questions').load("index.php?controller=usertest&function=getCalc&qid="+id+"&R1="+ans);
			
			}
			

	</script>
    </body>
</html>
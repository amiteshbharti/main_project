<?php 
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
{
	header("Location: index.php?controller=login&function=execute_process");
	//	exit();
}

?>

<html>
	
	<body>
		<div style="width:80%;"><br><br><br><br><br>
		<center>
			<div id="MyResult">
			</div><br>
	<form name="f1" id="f1">
				Enter Name of Test&nbsp;
  				<input type="text" name="txttablename" size="20"><br><br>
  				<input type="button" value="Submit" onclick="funcSearch()"> 
			</form>
		</center>
		</div>
                
                <script type="text/javascript">
                    			function funcSearch()
			{
				
				$.ajax({ 
	    		      type: "POST",
	    		      url: 'index.php?controller=managetest&function=testAdded',
	    		      data: $('#f1').serialize(),
	    		      success: function(response)
	    		      {
						var res=response;
						if(res == 1)
						{
							alert ("Test has been created.Click on ADD NEW QUESTION TO ADD QUESTIONS");
							manage_test();
							//window.location	=	"index.php?controller=adminhome&function=loadAdminHome";
							}else
						{
							alert ("ERROR IN CREATING NEW TEST");
						}
						
					    		  
                              }

				});
			

				}

                
                </script>
	</body>      		
</html>  

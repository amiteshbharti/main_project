<html>
    <head>
        <title>
            Certification
        </title>
    </head>
    <body>
        <form action="<?php echo SITE_PATH; ?>index.php?controller=usertest&function=showResult">
           <br/><br/><br/><br/><br/><br/>
        
     <center>
  <table border="2" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="80%">
    
      <td width="38%">Enter Certification Id :</td>
      <td width="62%">&nbsp;<input type="text" name="ids" id="ids" size="20"></td>
    </tr>
  </table>
  <table>
    <tr>
        <td>
            <input type="button" value="submit" onclick="showResult()">
        </td>
    </tr>
  </table>
  </center>   
    </form>
    
    	<script type="text/javascript">

			function showResult()
			{
           			var ans =   $("#ids").val();
                                window.location.assign("index.php?controller=usertest&function=showResult&id="+ans);
			}

        </script>
    </body>
    
    
    
    
    
</html>
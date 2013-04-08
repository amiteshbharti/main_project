	<table border='1' cellpadding='2' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber2'>
			  <tr>
			    <td width='100%' bgcolor='#999966'>
			    <p align='center'><span style='font-size: 8.5pt; color: #333333'><b>
			    <span style='font-family: Verdana'>&nbsp;&nbsp;&nbsp;
			    <a  href='<?php echo SITE_PATH;?>index.php?controller=userhome&function=loadUserHome'>BACK TO Home Page</a>&nbsp;&nbsp;&nbsp;&nbsp; 
			    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 
			    </span></b></span></td>
			  </tr>
			</table>
        
        
        
	
<?php
include VIEW_PATH.'header.php';
?>

<html>
    <head>
        <title>
            Result
        </title>
    </head><br/><br/><br/><br/>
    <body>
        
        <center>
        <table>
          <tr>
            <td>
                <b>Thanks for apptempting the test</b>
            </td>
          </tr>  
        </table>
        <br/><br/><br/>
        </center>
       <center>
        <table>
          <tr>
            <td>
                Subject:
            </td>
            <td>
               <?php echo $arrData['name']; ?>
            </td>
          </tr>
          <tr>
            <td>
                Your Score is :
            </td>
            <td>
               <?php echo $arrData['marks']; ?>
            </td>
          </tr>
          <tr>
            <td>
                Result
            </td>
            <td>
               <?php echo $arrData['result']; ?>
            </td>
          </tr>
          
          <tr>
            <td>
                Your Certification ID is :
            </td>
            <td>
               <u><?php echo $arrData['id']; ?></u> 
            </td>
          </tr>
         </table><br/><br/><br/><br/><br/>
       </center>
        <center>
        <table>
            <tr>
                <td>
                <b>   Note : Please Note Your Certification ID     </b>
                </td>
            </tr>
            <tr>
                <td>
                   You can check copy your 
              certification by logging in your account. The hard copy will be 
              sent at your residential address soon
                </td>
            </tr>
            
        </table>
        
       
       </center>
        <br/><br/><br/><br/>
        <table border='1' cellpadding='2' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber2'>
			  <tr>
			    <td width='100%' bgcolor='#999966'>
			    <p align='center'><span style='font-size: 8.5pt; color: #333333'><b>
			    <span style='font-family: Verdana'>&nbsp;&nbsp;&nbsp;
			    <a  href="<?php echo SITE_PATH;?>index.php?controller=certification&function=userQuesAns&id=<?php echo $arrData['id']; ?>">Show Question And Answers</a>&nbsp;&nbsp;&nbsp;&nbsp; 
			    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 
			    </span></b></span></td>
			  </tr>
			</table>
        
        
    </body>
</html>
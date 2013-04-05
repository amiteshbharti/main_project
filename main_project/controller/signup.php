<?php

/**
* Signup controller 
*
* 
*
* LICENSE: Some license information
*
* @category   Zend
* @package    Zend_Magic
* @subpackage Wand
* @copyright  amitesh
* @license    http://framework.zend.com/license   BSD License
* @version    $Id:$
* @link       http://framework.zend.com/package/PackageName
* @since      25 march 2013
*/



ini_set("display_errors","1");


if(isset($_REQUEST['txtfname'])){
	//as per sir pdo library the value array should be like below
	/*$valArray[] = array(
			'first_name' => 'My First Post', 
			'last_name' => 'txtlname'
			
	);*/
	
	//as per sir pdo library the value array should be like below
	$valArray=array();   			
    
 	$valArray['first_name']=$_REQUEST['txtfname'];
 	$valArray['last_name']=$_REQUEST['txtlname']; 
 	$valArray['father_name']=$_REQUEST['txtfathername']; 
 	$valArray['user_name']=$_REQUEST['txtuname'];
 	$valArray['password']=$_REQUEST['txtpassword']; 
 	//$valArray['$password2']=$_REQUEST['txtretypepassword']; 
 	$valArray['contact_no']=$_REQUEST['txtcontactnumber']; 
 	$valArray['address'] =  $_REQUEST['txtaddress']; 
 	$valArray['country'] = $_REQUEST['txtcountry']; 
 	$valArray['state'] = $_REQUEST['txtstate']; 
 	$valArray['email_id'] = $_REQUEST['txtemailid']; 
 	$valArray['pin'] =$_REQUEST['txtpin']; 
 	$date_array=null; 
 	$date_array['year'] = $_REQUEST['txtyyyy']; 
 	$date_array['month'] =  $_REQUEST['txtmm']; 
 	$date_array['day'] = $_REQUEST['txtdd'];
 	//$date = $date_array['year'].'-'.$date_array['month'].'-'.$date_array['day'];
 	$date=implode('-',$date_array); 
 	$valArray['date_of_birth']=$date;
 	
 	
// 	$finalArr =  array();
 //	$finalArr[] = $valArray;
 	//echo '<pre>';
 	//print_r($valArray);
 	
//   	    	 echo $valArray['$first_name']."<br>";
//  	    	 echo $valArray['$last_name']."<br>";
//  	    	 echo $valArray['$fathers_name']."<br>";
//  	    	 echo $valArray['$user_name']."<br>";
//  	    	 echo $valArray['$password1']."<br>";
//  	    	 //echo $password2."<br>";
//  	    	 echo $valArray['$contact_no']."<br>";
//  	    	 echo $valArray['$address']."<br>";
//  	    	 echo $valArray['$country']."<br>";
//  	    	 echo $valArray['$state']."<br>";
//  	    	 echo $valArray['$pin']."<br>";
//  	    	 echo $valArray['$email']."<br>";
//  	    	 $date = $date_array['year'].'-'.$date_array['month'].'-'.$date_array['day'];
//  	    	 echo $date;
 	

	
}

class signupController
{
	
 	private $_arrVal=array();
 	
    public function __construct()
    {
    	global $valArray;	
     	if(isset($valArray)){
     		$this->_arrVal=$valArray;
     		
     	}
     }

    public function load_signup()
    {
        loadview('header.php');
        loadview('signup.php');
                
    }
    
    
    public function fun_saveUser()
    {
    	//print_r($this->_arrVal) or die('sdfdf');
    	//global $valArray;
    	
    	
    	
    	 loadview('header.php');
    	 $val=loadmodel('signup','saveUser',$this->_arrVal);
    	 if($val)
    	 {
    	//echo 'new user inserted successfully';
    	//echo SITE_PATH;
    	header("Location:".SITE_PATH);
    	echo 'new user inserted successfully';
    	   	
    	
    	 }
    	 else
    	 	echo 'no duplicate entry allowed';

    }
     
   public function captcha()
   {
	 if(isset($_REQUEST['flag']))
         {
	      $flag=$_REQUEST['flag'];
              if($flag==1)
               {
	           loadview('header.php');
		   echo "<center>wrong value try again</center>";
	           loadview('captcha.php');
	  
                }
           }
 	   else{
		   loadview('header.php');
	           loadview('captcha.php');             
		}
    }
   
   public function captchaProcessing()
   {
	        $val	=	array();
		$val['captcha']	=	$_REQUEST['captcha'];
		$val['rand']	=	$_REQUEST['rand'];
		$a		=	loadModel('signup','captchaProcessing',$val);
	  // echo "helllo";
    }


}		//class end
   
?>

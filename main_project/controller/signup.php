<?php

/*
* @classname            signupController
{
*
* This class contain all methods that controls the signup or registrations of all users...
* @package              Zend_Magic
* 
* @author               Arpit Goyal
* @date                 15-03-2013
* @version              version - 2
* @modified-by          Arpit Goyal
* @modification-date    15-03-2013
* ...
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
//  $valArray['$password2']=$_REQUEST['txtretypepassword']; 
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
//  $date = $date_array['year'].'-'.$date_array['month'].'-'.$date_array['day'];
    $date=implode('-',$date_array); 
    $valArray['date_of_birth']=$date;
    
    
    
    
    /***			Serverside Validation				 	******/
    
    $error =array();
    
	if (!empty($valArray['first_name']) && !eregi("^[a-z]*$", $valArray['first_name']))
        $error[]= "The first name can contain only alphabetic && must not be empty ";
    if (!empty($valArray['last_name']) && !eregi("^[a-z]*$", $valArray['last_name']))
        $error[]= "The last name can contain only alphabetic && must not be empty "; 
    if (!empty($valArray['father_name']) && !eregi("^[a-z]*$", $valArray['father_name']))
        $error[]= "The father name can contain only alphabetic && must not be empty "; 
    if (!empty($valArray['state']) && !eregi("^[a-z]*$", $valArray['state']))
        $error[]= "The state name can contain only alphabetic && must not be empty ";
    if(!empty($valArray['address']) && !eregi("^[a-z0-9 \s]*$",$valArray['address']))      // address validation
        $error[]= "The address can contain only alphabetic,digits && must not be empty ";
    if(!empty($valArray['user_name']) && !eregi("^[a-z0-9]*$",$valArray['user_name']))       //username validation
        $error[]= "The user name can contain only alphabets,digits ,spaces && must not be empty";
    if(!empty($valArray['contact_no']) && !eregi("^[0-9]*$",$valArray['contact_no']))
        $error[]= "The contact number can contain only digits && must not be empty ";
    if(!empty($valArray['pin']) && !eregi("^[0-9]*$",$valArray['pin']))
        $error[]= "The pin number can contain only digits && must not be empty";
    
    
    
    //ifereg(
    
    
 	
 	
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
    Private $_errorVal=array();
    
 	
    public function __construct()
    {
    	global $valArray;	
     	if(isset($valArray)){
     	    $this->_arrVal=$valArray;
     		
     	}
     	global $error;
     	if(isset($error)){
     	    $this->_errorVal=$error;
     		
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
    	if((isset( $this->_errorVal))&& (!empty($this->_errorVal))){
			
						foreach($this->_errorVal as $key=>$val)
							{
								echo "<h6 style='color:black' >".$val."</h6>";			
							}	
				
			loadview('signup.php');
			
		}
		else{
			    	
			 $val=loadmodel('signup','saveUser',$this->_arrVal);
			 if($val){
				 loadview('header.php');
                     echo "<center><h2 style='color:black' >New user inserted successfully</h2></center>";	 
             }
			else{
				echo "<center><h2 style='color:black' >User already exist</h2></center>";
				}	 
			  loadview('signup.php');
		 }
			

    }
     
   public function captcha()
   {
       if(isset($_REQUEST['flag'])){
           $flag=$_REQUEST['flag'];
           if($flag==1){
	       loadview('header.php');
	       echo "<center>wrong value try again</center>";
	       loadview('captcha.php');
	  
           }
       }else{
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
//      echo "helllo";
    }


}		//class end
   
?>

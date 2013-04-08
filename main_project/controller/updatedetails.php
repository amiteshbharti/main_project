<?php
ini_set("display_errors","1");
session_start();

/**
* @classname            updatedetailsController
*
* This class contain all methods that controls the updated details of the particular user
* @package              Zend_Magic
* 
* @author               Arpit Goyal
* @date                 15-03-2013
* @version              version - 2
* @modified-by          Arpit Goyal
* @modification-date    15-03-2013
* ...
*/


class updatedetailsController
{
    public function __construct()
    {
        if(empty($_SESSION['username'])){
    	    header("location :".SITE_PATH."index.php");
    	}

    }
    public function showDetails()
    {
    	
    	$ary	=	array();
        $ary	=	loadModel('updatedetails','getPersonalDetails');
 
        loadView('updatedetails.php',$ary);
    }
    
    
    public function updateData()
    {
    	
    	$arayval				=	array();
    	$arayval['fname']		=	$_REQUEST['txtfname'];
    	$arayval['lname']		=	$_REQUEST['txtlname'];
    	$arayval['fathername']	=   $_REQUEST['txtfathername'];
    	$arayval['day']			=	$_REQUEST['txtdd'];
    	$arayval['month']		=	$_REQUEST['txtmm'];
    	$arayval['year']		=	$_REQUEST['txtyyyy'];
    	$arayval['email']		=	$_REQUEST['txtemailid'];
    	$arayval['number']		=	$_REQUEST['txtcontactnumber'];
    	$arayval['address']		=	$_REQUEST['txtaddress'];
    	$arayval['country']		=	$_REQUEST['txtcountry'];
    	$arayval['state']		=	$_REQUEST['txtstate'];
    	$arayval['pin']			=	$_REQUEST['txtpin'];
    	
    	  $error =array();
    
	if (!empty($arayval['fname']) && !eregi("^[a-z]*$", $arayval['fname']))
        $error[]= "The first name can contain only alphabetic && must not be empty ";
    if (!empty($arayval['lname']) && !eregi("^[a-z]*$", $arayval['lname']))
        $error[]= "The last name can contain only alphabetic && must not be empty "; 
    if (!empty($arayval['fathername']) && !eregi("^[a-z \s]*$", $arayval['fathername']))
        $error[]= "The father name can contain only alphabetic && must not be empty "; 
    if (!empty($arayval['state']) && !eregi("^[a-z \s]*$", $arayval['state']))
        $error[]= "The state name can contain only alphabetic && must not be empty ";
    if(!empty($arayval['address']) && !eregi("^[a-z0-9 \s]*$",$arayval['address']))      // address validation
        $error[]= "The address can contain only alphabetic,digits && must not be empty ";
    if(!empty($arayval['country']) && !eregi("^[a-z \s]*$",$arayval['country']))       //username validation
        $error[]= "The country can contain only alphabets,digits ,spaces && must not be empty";
    if(!empty($arayval['day']) && !eregi("^[0-9]*$",$arayval['day']))
        $error[]= "The date can contain only digits && must not be empty ";
    if(!empty($arayval['month']) && !eregi("^[0-9]*$",$arayval['month']))
        $error[]= "The month can contain only digits && must not be empty ";
    if(!empty($arayval['year']) && !eregi("^[0-9]*$",$arayval['year']))
        $error[]= "The year can contain only digits && must not be empty ";
    if(!empty($arayval['number']) && !eregi("^[0-9]*$",$arayval['number']))
        $error[]= "The contact number can contain only digits && must not be empty ";
    if(!empty($arayval['pin']) && !eregi("^[0-9]*$",$arayval['pin']))
        $error[]= "The pin number can contain only digits && must not be empty";
    
   		if((isset( $error))&& (!empty($error))){
			
						foreach($error as $key=>$val)
							{
								echo $val;			
							}	
				
							$this->showDetails();
			
		  }
		else{
			$ans	=	   	loadModel('updatedetails','updateInformation',$arayval);
		
			echo $ans;
        }
	}
} 


?>

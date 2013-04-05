<?php
ini_set("display_errors","1");
session_start();

class updatedetailsController
{
    public function __construct()
    {
            	if(empty($_SESSION['username']))
    	{
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
    	$arayval['fathername']	=	$_REQUEST['txtfathername'];
    	$arayval['day']			=	$_REQUEST['txtdd'];
    	$arayval['month']		=	$_REQUEST['txtmm'];
    	$arayval['year']		=	$_REQUEST['txtyyyy'];
    	$arayval['email']		=	$_REQUEST['txtemailid'];
    	$arayval['number']		=	$_REQUEST['txtcontactnumber'];
    	$arayval['address']		=	$_REQUEST['txtaddress'];
    	$arayval['country']		=	$_REQUEST['txtcountry'];
    	$arayval['state']		=	$_REQUEST['txtstate'];
    	$arayval['pin']			=	$_REQUEST['txtpin'];
   		
    	$ans	=	   	loadModel('updatedetails','updateInformation',$arayval);
	
    	echo $ans;
    }
}


?>
<?php
ini_set("display_errors","1");
session_start();
class personaldetailsController{
	public function __construct()
	{

		if((empty($_SESSION['username']))){
			
			echo 'YOUR SESSION IS OUT .PLEASE LOGIN AGAIN.'; 	//message if session out
		header("location:index.php");
		}
	}
	
    public function check_details()
    {
    	$b	=	array();

    	    
    	$b	=	loadModel('personaldetails','getPersonalDetails');
	
	loadView('personaldetails.php',$b);
    }
    
}



?>


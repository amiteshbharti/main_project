<?php
ini_set("display_errors","1");
session_start();
/**
* @classname            personaldetailsController
* This class contain all methods that controls  the personal details of the particular user...

* @package              Zend_Magic

* @author               Arpit Goyal
* @date                 26-03-2013
* @version              version - 2
* @modified-by          Amitesh Bharti
* @modification-date    26-03-2013
* ...
*/


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


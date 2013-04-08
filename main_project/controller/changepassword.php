<?php
session_start();
ini_set("display_errors","1");

/**
* @classname            changepasswordController
*
* This class contain all methods that describes  the functionality to change the password of user account....

* @package              Zend_Magic

* @author               Arpit Goyal
* @date                 26-03-2013
* @version              version - 2
* @modified-by          Amitesh Bharti
* @modification-date    26-03-2013
* ...
*/



class changepasswordController
{
    
    public function __construct()
    {
        if((empty($_SESSION['username']))){

	    header("location:index.php");
	}
    }
    public function check_details()
    {
	
        loadView('changepassword.php');
    }
    function show_details()
    {
	//print_r($_REQUEST);
	$aray	=	array();
	$aray['oldpass']	=	$_REQUEST['txtoldpass'];
	$aray['newpass']	=	$_REQUEST['txtnewpass'];
	$aray['retypepass']	=	$_REQUEST['txtretypepass'];
        //print_r($aray);
        $result	       =	loadModel('updatedetails','change_password',$aray);
        echo $result;
    }

    public function updatePassword()
    {
	echo "hi";
    }

}


?>

<?php
ini_set("display_errors","1");

session_start();

/**
* @classname            userhomeController
*
* This class contain all methods that controls all the functionality of user part....
* @package              Zend_Magic


* @author               Arpit Goyal
* @date                 12-03-2013
* @version              version - 2
* @modified-by          Amitesh Bharti
* @modification-date    22-03-2013
* ...
*/

class userhomeController
{    
    public $log;
    public function __contruct()
    {
    	if(empty($_SESSION['username'])){
            header("location :".SITE_PATH."index.php");
    	}
    	
    }

    public function showlist()
    {   
	if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')){

	    header("Location: index.php?controller=login&function=execute_process");
	    //	exit();
	}
        $b=loadModel('userhome','execute_name');
   
        $this->log=$b=loadModel('userhome','log_session');
   
    
        if($this->log=="done insertion"){
            header("location:".SITE_PATH."index.php?controller=userhome&function=loadUserHome");
        }
    }

    public function loadUserHome()

    {
	if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
	    header("Location: index.php?controller=login&function=execute_process");
	    //	exit();
	}
	
        loadview('header.php');
        loadView('user_home.php');
    
    }

    public function logout()
    {
	loadModel('userhome','logout');
	//unset($_SESSION['username']);
	//unset($_SESSION['password']);
	
	//echo "hi";
	
    }
}


?>

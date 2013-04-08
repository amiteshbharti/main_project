
<?php
ini_set("display_errors","1");

session_start();
include MODEL_PATH.'connection.php';

/**
* @classname            adminhomeController
*
* This class contain all methods that describes all the functionality of admin part....

* @package              Zend_Magic

* @author               Amitesh Bharti
* @date                 12-03-2013
* @version              version - 2
* @modified-by          Arpit Goyal
* @modification-date    22-03-2013
* ...
*/


class adminhomeController
{    
     public $log;
     public function __contruct()
     {
//       if(empty($_SESSION['username'])){
//     		$a	=	SITE_PATH;
//     		header("location: ".$a."index.php");
//     	 }
    	if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
    		header("Location: index.php?controller=login&function=execute_process");
    		exit();
    	}
     }

     public function showlist()
     {   
	
         if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')){
		header("Location: index.php?controller=login&function=execute_process");
		//	exit();
	 }
	
	
	
         $b=loadModel('adminhome','execute_name');
   
         $this->log=$b=loadModel('adminhome','log_session');
   
    
        if($this->log=="done insertion"){

            header("location:".SITE_PATH."index.php?controller=adminhome&function=loadAdminHome");
        }
    }

    public function loadAdminHome()
    {
        if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
	    header("Location: index.php?controller=login&function=execute_process");
	//	exit();
	}

	loadview('header.php');
        loadView('adminhome.php');
    
    }

    public function logout()
    {
        loadModel('adminhome','logout');
	//unset($_SESSION['username']);
	//unset($_SESSION['password']);
	
//	echo "hi";
	
    }
}


?>

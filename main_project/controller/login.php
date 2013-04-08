<?php
session_start();

ini_set("display_errors","1");


/**
* @classname            loginController
*
* This class contain all methods that controls  the functionality of the login page....

* @package              Zend_Magic

* @author               Arpit Goyal
* @date                 26-03-2013
* @version              version - 2
* @modified-by          Amitesh Bharti
* @modification-date    26-03-2013
* ...
*/



class loginController
{
    public function __construct()
    {
    	
      
    }

    public function execute_process()
    {
		if(isset($_SESSION['start']))
		{
			loadview('header.php');
			echo "<center><h1 style='color:white;'>".$_SESSION['start']."</h1></center>";
			unset($_SESSION['start']);
			loadview('login.php');
		}else{
										
			loadview('header.php');
			loadview('login.php');
	     }
                
    }
    

    public function about()
    {
    	loadView('about.php');
    }
    
    
    public function contact()
    {
    	loadView('contact_us.php');
    }
    
    public function check_details()
    {
    	//loadModel('login','setSessions');
    	//echo $_SESSION['username'];
    	//echo $_SESSION['password'];
        $a=  loadModel('login','check_session');
        $ab=loadModel('login','confirm_session');
        echo $_SESSION['username'];
        echo $_SESSION['password'];
        
        echo $ab;
        if($ab=="admin"){
        //	echo $_SESSION['username'];
        header("location: ".SITE_PATH."index.php?controller=adminhome&function=showlist");
        }else if($ab=="user"){
                                 //	echo $_SESSION['username'];
                                 header("location: ".SITE_PATH."index.php?controller=userhome&function=showlist");
        }
    }
    

	public function loadforgetPassword()
		{   
			loadview('header.php');
			loadView('forgetpassword.php');
			
		}
    public function passwordRecovery()
		{   
			
		$arayval				=	array();
    	
    	$arayval['uname']		=	$_REQUEST['uname'];
		$arayval['eid']			=	$_REQUEST['eid'];
		$result					=	loadModel('login','passwordRecovery',$arayval);
		echo $result;
			
			
			//echo "dfd";
		}
}    
?>
